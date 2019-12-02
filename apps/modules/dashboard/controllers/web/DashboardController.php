<?php

namespace MyModule\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('views/dashboard/index');
    }

}