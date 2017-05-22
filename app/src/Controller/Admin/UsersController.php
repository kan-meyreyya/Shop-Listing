<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(array(
            'index',
            'create',
            'delete',
            'edit',
            'login',
            'logout',
            'forgotPassword',
        ));
        $this->Auth->authorize = 'Controller';
        $this->viewBuilder()->layout('back_end');
    }

    public function index()
    {
        
    }

    public function add()
    {
        
    }

    public function edit($id = null)
    {
        
    }

    public function delete()
    {
        
    }

    public function login()
    {
        $this->viewBuilder()->layout('author');
    }

    public function logout()
    {
        
    }

    public function forgotPassword()
    {
        
    }
}
