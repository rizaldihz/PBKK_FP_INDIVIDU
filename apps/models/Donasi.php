<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Donasi extends My_Model
{
	public $id;
	public $bukti_donasi;
	public $keterangan;
	public $users_id;
    public $kebutuhan_id;
	public $jumlah;
	public $judul;
	public $tipe;
    // public $created_at;


	public function initialize()
    {
        $this->setSource('kebutuhan');

        $this->belongsTo(
            'users_id',
            'MyModel\Users',
            'id',
            [
                'alias' => 'users'
            ]
        );

        $this->belongsTo(
            'kebutuhan_id',
            'MyModel\Kebutuhan',
            'id',
            [
                'alias' => 'kebutuhan'
            ]
        );
    }

    public function registrasi($data)
    {
    	$this->$id=$data['id'];
		$this->$keterangan=$data['keterangan'];
		$this->$users_id=$data['users_id'];
	    $this->$kebutuhan_id=$data['kebutuhan_id'];
		$this->$jumlah=$data['jumlah'];
		$this->$judul=$data['judul'];
		$this->$tipe=$data['tipe'];
    }	

}


