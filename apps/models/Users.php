<?php

namespace MyModel;

use Phalcon\Mvc\Model;

class Users extends Model
{
	protected $id;
    protected $nama;
    protected $tanggal_lahir;
    protected $alamat;
    protected $jk;
    protected $ktp;
    protected $email;
    protected $password;
    protected $reset_pass;
    protected $ver;

	public function initialize()
    {
        $this->setSource('users');
    }

    public function setId($id)
    {
    	$this->id = $id;
    }
    public function setNama($id)
    {
    	$this->nama = $id;
    }
    public function setTanggal_lahir($id)
    {
    	$this->tanggal_lahir = $id;
    }
    public function setAlamat($id)
    {
    	$this->alamat = $id;
    }
    public function setJk($id)
    {
    	$this->jk = $id;
    }
    public function setKtp($id)
    {
    	$this->ktp = $id;
    }
    public function setEmail($id)
    {
    	$this->email = $id;
    }
    public function setPassword($id)
    {
    	$this->password = $id;
    }
    public function setReset_pass($id)
    {
    	$this->reset_pass = $id;
    }
    public function setVer($id)
    {
    	$this->ver = $id;
    }

    public function getId()
    {
    	return $this->id ;
    }
    public function getNama()
    {
    	return $this->nama ;
    }
    public function getTanggal_lahir()
    {
    	return $this->tanggal_lahir ;
    }
    public function getAlamat()
    {
    	return $this->alamat ;
    }
    public function getJk()
    {
    	return $this->jk ;
    }
    public function getKtp()
    {
    	return $this->ktp ;
    }
    public function getEmail()
    {
    	return $this->email ;
    }
    public function getPassword()
    {
    	return $this->password ;
    }
    public function getReset__pass()
    {
    	return $this->reset_pass ;
    }
    public function getVer()
    {
    	return $this->ver ;
    }

    public function registrasi($data)
    {
    	$this->setId($data['id']);
	    $this->setNama($data['nama']);
	    $this->setTanggal_lahir($data['tanggal_lahir']);
	    $this->setAlamat($data['alamat']);
	    $this->setJk($data['jk']);
	    $this->setKtp($data['ktp']);
	    $this->setEmail($data['email']);
	    $this->setPassword($data['password']);
	    $this->setReset_pass($data['reset']);
	    $this->setVer($data['ver']);
    }

}