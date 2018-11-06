<?php

namespace App\Controllers;

use SON\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $user = $this->model->all();
        $this->render($user);
    }

    public function create()
    {
        return 'Página de cadastro de usuários';
    }
}
