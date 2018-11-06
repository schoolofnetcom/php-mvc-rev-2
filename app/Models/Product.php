<?php

namespace App\Models;

use SON\Model;

class Product extends Model 
{
    protected $table = 'mproducts';
    
    public function getMostViewed()
    {
        // $this->getPdo();
    }
}
