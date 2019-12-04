<?php

namespace MyModule\Admin\Controllers\Web;

use Phalcon\Mvc\Controller;
use MyModel\Users;
use MyModel\Kebutuhan;
use MyModel\Label;
use MyModel\Resipien;
use Phalcon\Http\Request;
use MyLayout\MyController;
use \DataTables\DataTable;

class KebutuhanController extends MyController
{
	public function beforeExecuteRoute(){
		if(!$this->is_admin() && $this->dispatcher->getactionName()!='index')
			return $this->response->redirect('');
	}

    public function indexAction()
    {
        if ($this->request->isAjax()) {
          $get_kebutuhan = $this->modelsManager->executeQuery(
                'SELECT k.id,k.nama as knama,k.jumlah,l.nama as lnama,r.nama as rnama FROM \MyModel\Kebutuhan as k JOIN \MyModel\Label as l on k.label_id = l.id JOIN \MyModel\Resipien as r on k.resipien_id = r.id'
            );



          $dataTables = new DataTable();
          $dataTables->fromResultSet($get_kebutuhan)->sendResponse();
        }
        $this->view->pick('views/kebutuhan/index');
    }

    public function tambahAction()
    {
        if($this->request->isPost()){
            $new_kebutuhan = new Kebutuhan();
            $new_kebutuhan->registrasi($_POST);
            if($this->request->hasFiles() == true){
                $uploads = $this->request->getUploadedFiles();
                // var_dump($this->request->getUploadedFiles());die();
                $isuploaded = false;
                $allpath = "";
                foreach($uploads as $up)
                {
                    $path = 'storage/'.time().'-'.strtolower($up->getname());
                    $fpath = BASE_PATH . "/public/" . $path;
                    if($up->moveTo($fpath)){
                        $isUploaded = true;
                        $allpath.=$path."||";
                    }else{
                        $isUploaded = false;
                    }

                }
                if(!$isUploaded)
                {
                    die('You must choose at least one file to send. Please try again.');
                }
            }
            $new_kebutuhan->file = $allpath;
            $new_kebutuhan->save();
            $this->flashSession->success("<i class='fa fa-check-circle'></i> Kebutuhan berhasil ditambahkan.");
        }
        $get_label = Label::find();
        $get_resipien = Resipien::find();
        $this->view->labels = $get_label;
        $this->view->resipien = $get_resipien;
        $this->view->pick('views/kebutuhan/tambah');
    }

    public function editAction()
    {
        if($this->request->isAjax()){
            $get_kebutuhan = Kebutuhan::findFirst([
                "conditions" => "id = :id:",
                "bind" => [
                    "id" => $this->request->getPost('id')
                ],
            ]);
            $get_kebutuhan->registrasi($_POST);
            $get_kebutuhan->save();

            $this->response->setJsonContent(
                [
                    "success" => "OK",
                ]
            )->send();
        }
        $get_id = $this->dispatcher->getParam('param');
        $get_kebutuhan = Kebutuhan::findFirst([
            "conditions" => "id = :id:",
            "bind" => [
                "id" => $get_id
            ],
        ]);
        $this->view->resipien = Resipien::find();
        $this->view->labels = Label::find();
        if(!$get_kebutuhan) $this->response->redirect('kebutuhan');
        $this->view->kebutuhan = $get_kebutuhan;
        $this->view->pick('views/kebutuhan/edit');
    }

    public function hapusAction()
    {
        if($this->request->isAjax()){
            $get_kebutuhan = Kebutuhan::findFirst([
                "conditions" => "id = :id:",
                "bind" => [
                    "id" => $this->request->getPost('id')
                ],
            ]);
            if($get_kebutuhan->delete()){
                $this->response->setJsonContent(
                    [
                        "success" => "OK",
                    ]
                )->send();
            }
        }
    }

}