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
	public function list_course($madm)
	{
		$this->load->model('khoahoc_model');
		$data['khoa_hoc'] =$this->khoahoc_model->show_theo_danh_muc($madm);
		$this->data['khoa_hoc'] = $this->load->view('public/course');
		$this->render('public/home');

	}
}