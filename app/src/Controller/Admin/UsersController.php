<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('back_end');
    }

    public function index()
    {
        
    }

    public function create()
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
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect('admin/users');
            } else {
                $this->Flash->error('Invalid username or password, try again');
            }
        }
    }

    public function logout()
    {
        return $this->redirect('admin/users/login');
    }

    public function forgotPassword()
    {
        
    }
}
