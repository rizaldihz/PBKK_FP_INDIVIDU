<?php

namespace MyModule\Auth\Controllers\Web;

use Phalcon\Mvc\Controller;
use MyModel\Users;
use Phalcon\Http\Request;

class AuthenticationController extends Controller
{
	public function beforeExecuteRoute(){
		if($this->session->has('auth'))
			return $this->response->redirect('');
	}

    public function indexAction()
    {
        $this->view->pick('views/authentication/login');
    }

    public function registerindexAction()
    {
        $this->view->pick('views/authentication/register');
    }

    public function registerAction()
    {
        if($this->request->isPost())
        {
            $random = new \Phalcon\Security\Random();
            $data = $_POST;
            $data['id'] = $random->base64(18);
            $data['reset'] = 'null';
            $data['ver'] = 'asd';
            $data['password'] = $this->security->hash($data['password']);
            $new_user = new Users();
            $new_user->registrasi($data);
            $new_user->save();
            return $this->response->redirect('login')->send();
        }
    }

    public function loginAction()
    {
        $ktp    = $this->request->getPost('ktp');
        $pass   = $this->request->getPost('password');
    	$get_user   = Users::findFirst(
            [
                "conditions" => "ktp = :ktp:",
                "bind" => [
                    "ktp"   => $ktp
                ],
            ]
        );
        if($get_user === false){
            $this->flashSession->error("KTP atau Password yang anda inputkan salah.");
            return $this->response->redirect('login');
        }else{
            if(!$this->security->checkHash($pass,$get_user->password)){
                $this->flashSession->error("KTP atau Password yang anda inputkan salah.");
                return $this->response->redirect('login');
            }
            // $this->session->set('auth',[
            //     'username' => $user->username
            // ]);
            $this->session->set('auth',$get_user);
        }

        return $this->response->redirect('');

    }

    public function logoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect('');
    }

}