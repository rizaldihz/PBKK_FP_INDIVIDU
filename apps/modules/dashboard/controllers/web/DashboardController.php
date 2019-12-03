<?php

namespace MyModule\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use MyLayout\MyController;

class DashboardController extends MyController
{
    public function indexAction()
    {
    	$this->view->user = $this->session->get('auth');
    	var_dump($this->view->user);die();
        $this->view->pick('views/dashboard/index');
    }

}