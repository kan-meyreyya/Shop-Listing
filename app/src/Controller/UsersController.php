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
            $result = $this->Users->exists(array('email' => $user->email));
            if (!$result) {
                if ($this->Users->save($user)) {
                    $this->Flash->success(USER_SAVE_SUCCESS);
                    return $this->redirect('/admin/users/login');
                }
            } else {
                $this->Flash->error(USER_EXIST);
            }
        }
        $this->set('user', $user);
    }
}