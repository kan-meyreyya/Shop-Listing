<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\Utility\Security;
use Cake\Utility\Text;
use Cake\Routing\Router;

class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(array(
            'forgotPassword',
            'resetPassword',
        ));
        $this->loadComponent('Cookie', array('expires' => '1 day'));
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
        $aa = $this->Users->find('all');
        pr($aa);
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
                    $this->Flash->success(USER_SAVE_SUCCESS);
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Flash->error(USER_EXIST);
            }
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
                $this->Flash->success(USER_UPDATE);
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
                    'message' => USER_SAVE_SUCCESS,
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
                $this->Flash->error(USER_LOGIN_ERROR);
            }
        }
    }

    public function logout()
    {
        return $this->redirect(array('action' => 'login'));
    }

    public function forgotPassword()
    {
        $this->viewBuilder()->layout('author');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), array(
                'validate' => 'email',
            ));
            if (!$user->errors()) {
                $result = $this->Users->find()
                            ->where(array(
                                'email' => $this->request->data('email'),
                                'is_deleted' => 0,
                            ))->first();
                if ($result) {
                    $key = Security::hash(Text::uuid(), 'sha256', true);
                    $hash = sha1($user->email . rand(0, 100));
                    $url = Router::url(array('controller'=>'users', 'action'=>'resetPassword'), true ).'?_token_id=' . $result->id . '&params=' . $key  . $hash;
                    $this->Cookie->write('reset_password', $key . $hash, true, '1 day');

                    $message = 'Please click on link below for reset your password<br>' . $url;
                    $message = wordwrap($message, 1000);

                    $email = new Email();
                    $email->template('reset_password')
                        ->to($this->request->data('email'))
                        ->from('noreply@gmail.com')
                        ->replyTo('noreply@gmail.com')
                        ->emailFormat('both')
                        ->subject('Reset Password')
                        ->viewVars(array('message' => $message))
                        ->send();

                    $this->Flash->success('Please check in your email!');
                } else {
                    $this->Flash->error(USER_SEND_MAIL_ERROR);
                }
            }
        }
        $this->set('user', $user);
    }

    public function resetPassword()
    {
        if (!$this->request->query('_token_id') && !$this->request->query('params')) {
           throw new NotFoundException();
        }
        $this->viewBuilder()->layout('author');

        if ($this->Cookie->read('reset_password') === $this->request->query('params')) {
            $user = $this->Users->newEntity();
            $user->id = $this->request->query('_token_id');
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), array(
                    'validate' => 'reset',
                ));

                if ($this->Users->save($user)) {
                    $this->Flash->success('Your password have been updated!');
                    return $this->redirect(array('action' => 'login'));
                }
            }
            $this->set('user', $user);
        } else {
            $this->Flash->error('Your session is expire, Please enter email again!');
        }
    }
}
