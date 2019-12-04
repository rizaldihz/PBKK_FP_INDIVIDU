<?php

namespace MyModel;

use Phalcon\Mvc\Model;
use MyModel\My_Model;

class Label extends Model
{
	public $id;
	public $nama;
    // public $created_at;


	public function initialize()
    {
        $this->setSource('label');

        $this->hasMany(
            'id',
            'MyModel\Kebutuhan',
            'label_id',
            [
                'alias' => 'kebutuhan'
            ]
        );
    }

    public function registrasi($data)
    {
	    $this->nama = $data['nama'];
    }	

}


