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
        $condition = [];
        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $condition[] = [
                'OR' => [
                    'username LIKE' => '%'.$keyword.'%',
                    'role LIKE' => '%'.$keyword.'%',
                ]
            ];
        }

        $this->paginate = [
            'conditions' => $condition,
            'limit' => 10,
            'order' => [
                'User.username' => 'asc'
            ]
        ];
        $this->set('user', $this->paginate($this->Users));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
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
