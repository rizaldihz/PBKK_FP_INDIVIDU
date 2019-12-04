<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Users extends My_Model
{
	public $id;
    public $nama;
    public $tanggal_lahir;
    public $alamat;
    public $jk;
    public $ktp;
    public $email;
    public $password;
    public $reset_pass;
    public $ver;
    public $gambar;
    public $priviliges;
    // public $created_at;


	public function initialize()
    {
        $this->setSource('users');
    }

    public function registrasi($data)
    {
    	$this->id = $data['id'];
	    $this->nama = $data['nama'];
	    $this->tanggal_lahir = $data['tanggal_lahir'];
	    $this->alamat = $data['alamat'];
	    $this->jk = $data['jk'];
	    $this->ktp = $data['ktp'];
	    $this->email = $data['email'];
	    $this->password = $data['password'];
	    $this->reset_pass = $data['reset'];
	    $this->ver = $data['ver'];
        $this->gambar = null;
        $this->priviliges = isset($data['priviliges']) ? 1 : 0;
        // $this->created_at = date('Y-m-d h:i:sa');
    }


}