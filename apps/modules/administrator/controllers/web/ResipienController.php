<?php

namespace MyModule\Admin\Controllers\Web;

use Phalcon\Mvc\Controller;
use MyModel\Users;
use MyModel\Resipien;
use Phalcon\Http\Request;
use MyLayout\MyController;
use \DataTables\DataTable;

class ResipienController extends MyController
{
	public function beforeExecuteRoute(){
		if(!$this->is_admin() && $this->dispatcher->getactionName()!='index')
			return $this->response->redirect('');
	}

    public function indexAction()
    {
        if ($this->request->isAjax()) {
          $get_resipien = Resipien::find();

          $dataTables = new DataTable();
          $dataTables->fromResultSet($get_resipien)->sendResponse();
        }
        $this->view->pick('views/resipien/index');
    }

    public function tambahAction()
    {
        if($this->request->isPost()){
            $new_resipien = new Resipien();
            $new_resipien->registrasi($_POST);
            $new_resipien->save();
        }
        $this->view->pick('views/resipien/tambah');
    }

    public function editAction()
    {
        if($this->request->isAjax()){
            $get_resipien = Resipien::findFirst([
                "conditions" => "id = :id:",
                "bind" => [
                    "id" => $this->request->getPost('id')
                ],
            ]);
            $get_resipien->nama = $this->request->getPost('nama');
            $get_resipien->alamat = $this->request->getPost('alamat');
            $get_resipien->no_telp = $this->request->getPost('no_telp');
            $get_resipien->jk = $this->request->getPost('jk');
            $get_resipien->ktp = $this->request->getPost('ktp');
            $get_resipien->latar_belakang = $this->request->getPost('latar_belakang');
            $get_resipien->save();

            $this->response->setJsonContent(
                [
                    "success" => "OK",
                ]
            )->send();
        }
        $get_id = $this->dispatcher->getParam('param');
        $get_resipien = Resipien::findFirst([
            "conditions" => "id = :id:",
            "bind" => [
                "id" => $get_id
            ],
        ]);
        if(!$get_resipien) $this->response->redirect('resipien');
        $this->view->resipien = $get_resipien;
        $this->view->pick('views/resipien/edit');
    }

    public function hapusAction()
    {
        if($this->request->isAjax()){
            $get_resipien = Resipien::findFirst([
                "conditions" => "id = :id:",
                "bind" => [
                    "id" => $this->request->getPost('id')
                ],
            ]);
            if($get_resipien->delete()){
                $this->response->setJsonContent(
                    [
                        "success" => "OK",
                    ]
                )->send();
            }
        }
    }

}