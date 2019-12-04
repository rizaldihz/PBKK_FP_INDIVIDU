<?php

namespace MyModule\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use MyLayout\MyController;

class DashboardController extends MyController
{
    public function indexAction()
    {
    	$this->view->user = $this->session->get('auth');
        $this->view->pick('views/dashboard/index');
    }

    public function error404Action()
    {
    	$this->view->pick('views/dashboard/error404');
    }
}