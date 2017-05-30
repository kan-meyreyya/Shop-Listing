<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;

class ProductsController extends AppController
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
                    'price LIKE' => '%'.$keyword.'%',
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
        $this->set('product', $this->paginate($this->Products));
    }

    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData(), array(
                'validate' => 'create',
            ));
        }
        $this->set('product', $product);
    }

    public function delete($id = null)
    {
        
    }

    public function update($id = null)
    {
        
    }
}