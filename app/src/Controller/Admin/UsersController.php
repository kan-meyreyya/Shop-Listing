<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    protected $table;

    public function initialize() {
        parent::initialize();
        $this->table = TableRegistry::get('Users');
        $this->viewBuilder()->layout('back_end');
    }

    public function index()
    {
        $condition = [];
        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $condition[] = array(
                'or' => array(
                    'User.username LIKE' => '%'.$keyword.'%',
                    'User.role LIKE' => '%'.$keyword.'%',
                )
            );
        }

        $this->paginate = array(
            'conditions' => $condition,
                'limit' => 10,
                'order' => array(
                    'User.username' => 'asc'
                )
        );
        $this->set('user', $this->paginate($this->Users));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), array(
                'validate' => 'create',
            ));
            $user->role = 'admin';
            $result = $this->table->exists(array('email' => $user->email));
            if (!$result) {
                if ($this->Users->save($user)) {
                    $this->Flash->success('The user has been saved.');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error('Unable to add the user.');
                }
            } else {
                $this->Flash->error('You are have been already create this user!');
            }
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
