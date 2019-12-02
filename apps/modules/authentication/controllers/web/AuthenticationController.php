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
    	$user = Users::find([
            'conditions' => 'ktp = :ktp: AND password = :password:',
            'bind' => [
                'ktp'   => $ktp,
                'password'  => $this->security->hash($pass) 
            ]
        ]);

        if($user === false){
            $this->flashSession->error("KTP atau Password yang anda inputkan salah.");
            return $this->response->redirect('login');
        }else{
            $data['ktp'] = $user->ktp;
            $data['nama'] = $user->nama;
            // $this->session->set('auth',[
            //     'username' => $user->username
            // ]);
            $this->session->set('auth',$data);
        }

        return $this->response->redirect('');

    }

}