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
        $data = array();

        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $options[] = array(
                'or' => array(
                    'name LIKE' => '%'.$keyword.'%',
                ),
                'and' => array(
                    'parent_id IS' => null,
                )
            );
        } else {
            $options[] = array(
                'parent_id IS' => null,
            );
        }

        $this->paginate = array(
            'conditions' => $options,
            'limit' => 10,
            'order' => array(
                'name' => 'asc'
            )
        );
        $category = $this->paginate($this->Categories);
        if ($category) {
            foreach ($category as $key => $value) {
                $data[] = $value;
                $node = $this->Categories->get($value->id);
                $data[$key]['count_node'] = $this->Categories->childCount($node);
            }
        }

        $this->set('category', $data);
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
        $category->created = $dateTime;
        $category->modified = $dateTime;
        $category->user_id = $this->Auth->user('id');

        $result = $this->Categories->exists(array(
            'name' => $category->name,
            'parent_id IS' => null,
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
        $options = array();

        $category = $this->Categories->get($this->request->data('id'));
        $category->name = $this->request->data('name');

        if (isset($category->id)) {
            $options[] = array(
                'Categories.parent_id IS' => null,
                'Categories.id <>' => $category->id,
                'Categories.name' => $category->name,
            );
        }
        $options[] = array(
            'Categories.parent_id IS' => null,
            'Categories.name' => $category->name,
        );
        $result = $this->Categories->exists($options);

        if ($result) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'this name have been use',
            ));
        } else {
            if ($this->Categories->save($category)) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'data have been save.',
                ));
            }
        }
    }

    public function getSubCategory()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('ajax');

        $category = $this->Categories->find('all')
            ->where(array(
                'Categories.parent_id' => $this->request->query('id')
            ));

        $this->set('category', $category->toArray());
    }

    public function addSubCategory()
    {
        if ($this->request->is('ajax')) {
            $save_data = array();
            $update_data = array();
            $parent_id = $this->request->data('parent_id');

            foreach ($this->request->data['data'] as $value) {
                if ($value['id'] === '') {
                    $save_data[] = array(
                        'name' => $value['name'],
                        'parent_id' => $parent_id,
                        'user_id' => $this->Auth->user('id'),
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s'),
                    );
                } else {
                    $update_data[] = array(
                        'id' => $value['id'],
                        'name' => $value['name'],
                        'parent_id' => $parent_id,
                    );
                }
            }
            if ($save_data) {
                $data1 = $this->Categories->newEntities($save_data);
                foreach ($data1 as $data) {
                    $this->Categories->save($data);
                }
            }
            if ($update_data) {
                foreach ($update_data as $data) {
                    $data2 = $this->Categories->get($data['id']);
                    $data2->parent_id = $data['parent_id'];
                    $data2->name = $data['name'];
                    $data2->modified = date('Y-m-d H:i:s');
                    $this->Categories->save($data2);
                }
            }
        } else {
            $id = $this->request->query('parent_id');
            $node = $this->Categories->find('all')
                            ->where(array(
                                'Categories.parent_id' => $id
                            ))->toArray();
            $this->set('node', $node);
        }
    }

    public function deleteNode()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('default');
        $this->autoRender = false;

        $category = $this->Categories->get($this->request->data('id'));
        if ($this->Categories->delete($category)) {
            echo json_encode(array(
                'status' => 'success',
                'message' => 'successful'
            ));
        }
    }
}