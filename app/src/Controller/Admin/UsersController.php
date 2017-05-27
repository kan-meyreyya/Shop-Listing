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
            $user->role = ROLE_ADMIN;
            $result = $this->Users->exists(array('email' => $user->email));
            if (!$result) {
                if ($this->Users->save($user)) {
                    $this->Flash->success('The user has been saved.');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error('Unable to add the user.');
                }
            }
            $this->Flash->error('The user is exist!');
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
