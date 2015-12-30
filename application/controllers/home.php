<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{
	function __construct()
  {
    parent::__construct();
  }
 
  public function index()
  {
  	$this->load->model('danhmuc_model');
  	$this->data['danhmuc'] = $this->danhmuc_model->show();
  	$this->load->model('khoahoc_model');
  	$this->data['khoahoc'] = $this->khoahoc_model->show();
    $this->render('public/home');
  }

}