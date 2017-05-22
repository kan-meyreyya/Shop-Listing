<?php

namespace App\Controller;

use App\Controller\AppController;

class HomesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(array(
            'index',
        ));
        $this->Auth->authorize = 'Controller';
        $this->viewBuilder()->layout('front_end');
    }

    public function index()
    {
        
    }
}
