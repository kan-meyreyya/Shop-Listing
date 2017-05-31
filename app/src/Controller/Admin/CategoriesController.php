<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;

class CategoriesController extends AppController
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
        $this->set('category', $this->paginate($this->Categories));
    }

    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->request->patchEntity($category, $this->request->getData(), array(
                'validate' => 'create',
            ));
        }
        $this->set('category', $category);
    }

    public function delete($id = null)
    {
        
    }

    public function edit($id = null)
    {
        
    }
}