<?php

namespace MyLayout;

use Phalcon\Mvc\Controller;

class MyController extends Controller
{
    public function beforeExecuteRoute()
    {
    	if(!$this->session->has('auth')){
    		return $this->response->redirect('login');
    	}
    }

}