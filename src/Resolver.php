<?php

namespace SON;

class Resolver implements \ArrayAccess
{
    use Collection;

    public function handler(string $class, string $method = null)
    {
        $ref = new \ReflectionClass($class);
        $instance = $this->getInstance($ref);

        if (!$method) {
            return $instance;
        }

        $ref_method = new \ReflectionMethod($instance, $method);
        $parameters = $this->methodResolver($ref, $ref_method);

        return call_user_func_array([$instance, $method], $parameters);
        
    }

    private function getInstance($ref)
    {
        $constructor = $ref->getConstructor();
        if (!$constructor) {
            return $ref->newInstance();
        }
        
        $parameters = $this->methodResolver($ref, $constructor);
        return $ref->newInstanceArgs($parameters);
    }

    private function methodResolver($ref, $method)
    {
        $parameters = [];

        foreach ($method->getParameters() as $param) {

            if ($param->getType() !== null and $this->offsetExists((string)$param->getType())) {
                $parameters[] = $this->offsetGet((string)$param->getType());
                continue;
            }

            if ($param->getClass()) {
                $parameters[] = $this->handler($param->getClass()->getName());
                continue;
            }

            if ($param->isOptional()) {
                $parameters[] = $param->getDefaultValue();
                continue;
            }
        }

        return $parameters;
    }
}
