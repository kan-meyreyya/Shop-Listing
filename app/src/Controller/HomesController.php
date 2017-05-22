<?php

namespace App\Controller;

use App\Controller\AppController;

class HomesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('User');
        $this->Auth->allow('index');
        $this->viewBuilder()->layout('front_end');
    }

    public function index()
    {
        
    }
}
