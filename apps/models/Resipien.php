<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Resipien extends My_Model
{
	public $id;
    public $nama;
    public $alamat;
    public $no_telp;
    public $jk;
    public $ktp;
    public $latar_belakang;
    // public $created_at;


	public function initialize()
    {
        $this->setSource('resipien');
    }

    public function registrasi($data)
    {
	    $this->nama = $data['nama'];
	    $this->alamat = $data['alamat'];
	    $this->jk = $data['jk'];
	    $this->ktp = $data['ktp'];
	    $this->no_telp = $data['no_telp'];
        $this->latar_belakang = $data['latar_belakang'];
    }	

}