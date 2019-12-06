<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Kebutuhan extends My_Model
{
	public $id;
	public $nama;
	public $jumlah;
	public $label_id;
    public $nominal_uang;
	public $keterangan;
	public $file;
	public $resipien_id;
    // public $created_at;


	public function initialize()
    {
        $this->setSource('kebutuhan');

        $this->belongsTo(
            'label_id',
            'MyModel\Label',
            'id',
            [
                'alias' => 'label'
            ]
        );

        $this->belongsTo(
            'resipien_id',
            'MyModel\Resipien',
            'id',
            [
                'alias' => 'resipien'
            ]
        );

        $this->hasMany(
            'id',
            'MyModel\Donasi',
            'kebutuhan_id',
            [
                'alias' => 'donasi'
            ]
        );
    }

    public function registrasi($data)
    {
	    $this->nama = $data['nama'];
	    $this->jumlah = $data['jumlah'];
        $this->nominal_uang = $data['nominal_uang'];
		$this->label_id = $data['label_id'];
		$this->keterangan = $data['keterangan'];
		// $this->file = $data['file'];
		$this->resipien_id = $data['resipien_id'];
    }	

}


