<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Network\Exception\NotFoundException;

class CategoriesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('back_end');
        $this->Categories->recover();
    }

    public function index()
    {
        $options = array();
        $category_list = array();

        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $options[] = array(
                'or' => array(
                    'name LIKE' => '%'.$keyword.'%',
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
                'name' => 'asc'
            )
        );
        $category_list[''] = '---Parent---';
        $categories = $this->Categories->find('treeList');
        foreach ($categories as $key => $value) {
            $category_list[$key] = $value;
        }
        $category = $this->paginate($this->Categories);

        $this->set(compact('category_list', 'category'));
    }

    public function add()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('defualt');
        $this->autoRender = false;
        $category = $this->Categories->newEntity();
        $dateTime = date('Y-m-d H:i:s');

        $category->name = $this->request->data('name');
        $category->parent_id = $this->request->data('parent_id');
        $category->created = $dateTime;
        $category->modified = $dateTime;
        $category->user_id = $this->Auth->user('id');

        $result = $this->Categories->exists(array(
            'name' => $category->name
        ));
        if ($result) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'this name is already use.'
            ));
        } else {
            if (empty($category->name)) {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => 'please enter name of category.'
                ));
            } else {
                if ($this->Categories->save($category)) {
                    echo json_encode(array(
                        'status' => 'success',
                        'message' => 'data have been save success.'
                    ));
                }
            }
        }
    }

    public function delete()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('defualt');
        $this->autoRender = false;
        $category = $this->Categories->get($this->request->data('id'));
        $this->Categories->delete($category);
    }

    public function edit()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('defualt');
        $this->autoRender = false;
        pr($this->request->data);

        
    }
}