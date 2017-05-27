<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
<<<<<<< HEAD
=======
    protected $table;
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54

    public function initialize() {
        parent::initialize();
        $this->table = TableRegistry::get('Users');
        $this->viewBuilder()->layout('back_end');
    }

    public function index()
    {
<<<<<<< HEAD
        $options = array();
        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $options[] = array(
                'or' => array(
                    'username LIKE' => '%'.$keyword.'%',
                    'role LIKE' => '%'.$keyword.'%',
                ),
                'and' => array(
                    'is_deleted' => 0,
                )
            );
        } else {
            $options[] = array(
                'is_deleted' => 0,
            );
        }

        $this->paginate = array(
            'conditions' => $options,
                'limit' => 10,
                'order' => array(
                    'username' => 'asc'
=======
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
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
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
<<<<<<< HEAD
            $user->role = ROLE_ADMIN;
            $result = $this->Users->exists(array('email' => $user->email));
=======
            $user->role = 'admin';
            $result = $this->table->exists(array('email' => $user->email));
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
            if (!$result) {
                if ($this->Users->save($user)) {
                    $this->Flash->success('The user has been saved.');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error('Unable to add the user.');
                }
<<<<<<< HEAD
            }
            $this->Flash->error('The user is exist!');
=======
            } else {
                $this->Flash->error('You are have been already create this user!');
            }
>>>>>>> 5fed43cc633f3e7f8f483769591f73b8f030cf54
        }
        $this->set('user', $user);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(array('post', 'patch', 'put'))) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), array(
                'validate' => 'create',
            ));
            if ($this->Users->save($user)) {
                $this->Flash->success('User have been update!');
                return $this->redirect(array('action' => 'index'));
            }
        }
        $this->set('user', $user);
    }

    public function delete()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('default');
        $this->autoRender = false;
        $user = $this->Users->newEntity();
        $id = $this->request->data('id');

        if($id == $this->Auth->user('id')){
            echo json_encode(array(
                'status' => 'error',
                'message' => 'This user is loggin. You can not delete.',
            ));
        }else{
            $user->id = $id;
            $user->is_deleted = 1;

            if ($this->Users->save($user)) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'User have been update!',
                ));
            }
        }
    }

    public function login()
    {
        $this->viewBuilder()->layout('author');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Invalid username or password, try again');
            }
        }
    }

    public function logout()
    {
        return $this->redirect(array('action' => 'login'));
    }

    public function forgotPassword()
    {
        
    }
}
