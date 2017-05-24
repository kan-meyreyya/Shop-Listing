<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;

class UsersController extends AppController
{
    protected $table;

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(array(
            'register',
        ));
        $this->table = TableRegistry::get('Users');
        $this->viewBuilder()->layout('front_end');
    }

    public function register()
    {
        if ($this->request->is('post')) {
            $user = $this->table->newEntity($this->request->data);
            $user->role = ROLE_USER;
            $user->is_deleted = 0;
            if ($this->table->save($user)) {
                return $this->redirect('/admin/users/login');
            }
        }
    }
}