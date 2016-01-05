<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*  
*/
class Course extends Public_Controller
{

	function __construct()
	{
		parent::__construct();
	}
	public function course($makh)
	{
		$this->load->model('khoahoc_model');
		$this->data['khoa_hoc'] =$this->khoahoc_model->showid($makh);
		$this->render('public/course');
	}
}