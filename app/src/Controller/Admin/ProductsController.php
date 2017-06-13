<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Filesystem\File;
use Cake\Network\Exception\NotFoundException;

class ProductsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('back_end');
        $this->loadModel('Categories');
        $this->loadModel('Medias');
    }

    public function index()
    {
        $options = array();
        $products = array();

        if ($this->request->query('keyword')) {
            $keyword = $this->request->query('keyword');
            $options[] = array(
                'or' => array(
                    'name LIKE' => '%'.$keyword.'%',
                    'price LIKE' => $keyword,
                ),
                'and' => array(
                    'is_deleted' => 0,
                    'user_id' => $this->Auth->user('id'),
                )
            );
        } else {
            $options[] = array(
                'is_deleted' => 0,
                'user_id' => $this->Auth->user('id'),
            );
        }

        $this->paginate = array(
            'conditions' => $options,
            'limit' => 10,
            'order' => array(
                'name' => 'asc'
            )
        );
        $product_list = $this->paginate($this->Products);
        if ($product_list) {
            foreach ($product_list as $key => $value) {
                $category = $this->Categories->get($value->category_id);
                $products[] = $value;
                $products[$key]['category_name'] = $category->name;
            }
        }

        $total_active = $this->Products->find('all', array(
            'conditions' => array(
                'Products.is_deleted' => 0,
            )
        ))->count();

        $query_deactive = $this->Products->find('all', array(
            'conditions' => array(
                'Products.is_deleted' => 1,
            )
        ));
        $total_deactive = $query_deactive->count();
        $products_deactive = $query_deactive->toArray();

        $this->set(compact('products', 'total_active', 'total_deactive', 'products_deactive'));
    }

    public function add()
    {
        $product = $this->Products->newEntity();
        $categories = $this->Categories->find('treeList');

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData(), array(
                'validate' => 'create',
            ));
            $product->user_id = $this->Auth->user('id');
            $file_tmp = $this->request->data['thumbnail']['tmp_name'];
            $file_name = $this->request->data['thumbnail']['name'];
            if (!$product->errors()) {
                $product->thumbnail = $this->Products->renameFile($file_name);
            }

            if ($this->Products->save($product)) {
                $this->Products->uploadFile($file_tmp, 'products', $product->thumbnail);
                return $this->redirect(array('action' => 'index'));
            }
        }
        $this->set(compact('product', 'categories'));
    }

    public function delete()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('default');
        $this->autoRender = false;
        $product = $this->Products->get($this->request->data('id'));

        if ($this->request->data('target') === 'publish') {
            $product->is_deleted = 1;
            if ($this->Products->save($product)) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'update data',
                ));
            }
        } else {
            if ($this->Products->delete($product)) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'delete data',
                ));
            }
        }
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id);
        $categories = $this->Categories->find('treeList');
        $old_pic = $product->thumbnail;

        if ($this->request->is(array('post', 'put', 'patch'))) {
            $product = $this->Products->patchEntity($product, $this->request->getData(), array(
                'validate' => 'create',
            ));
            $file_tmp = $this->request->data['thumbnail']['tmp_name'];
            $file_name = $this->request->data['thumbnail']['name'];
            $product->thumbnail = $old_pic;

            if ($file_name !== '') {
                $dir = new File(WWW_ROOT . 'img/uploads/products/' . $old_pic, true, 0755);
                $dir->delete();
                $product->thumbnail = $this->Products->renameFile($file_name);
            }

            if ($this->Products->save($product)) {
                $this->Products->uploadFile($file_tmp, 'products', $product->thumbnail);
                return $this->redirect(array('action' => 'index'));
            }
        }
        $this->set(compact('product', 'categories'));
    }

    public function restore()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('default');
        $this->autoRender = false;

        $product = $this->Products->get($this->request->data('id'));
        $product->is_deleted = 0;
        if ($this->Products->save($product)) {
            echo json_encode(array(
                'status' => 'success',
                'message' => 'restore product',
            ));
        }
    }

    public function addSlide()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }
        $this->viewBuilder()->layout('default');
        $this->autoRender = false;
        pr($this->request->data);
    }
}