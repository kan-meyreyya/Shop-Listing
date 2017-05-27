<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(array(
            'register',
        ));
        $this->viewBuilder()->layout('front_end');
    }

    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), array(
                'validate' => 'create',
            ));
            $user->role = ROLE_USER;
            $user->is_deleted = 0;
<<<<<<< HEAD
            $result = $this->Users->exists($user->email);
            if (!$result) {
                if ($this->Users->save($user)) {
                    return $this->redirect('/admin/users/login');
                }
=======
            if ($this->table->save($user)) {
                return $this->redirect('/admin/users/login');
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
            }
            
        }
        $this->set('user', $user);
    }
}