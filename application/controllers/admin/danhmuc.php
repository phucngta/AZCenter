<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class danhmuc extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
    {
      $this->session->set_flashdata('message','You are not allowed to access this page');
      redirect('admin');
    }
    $this->load->model('danhmuc_model');
  }

  public function index()
  {
    $this->data['page_title']='Quản lý danh mục';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/ Quản lý danh mục';
    $this->data['danhmuc']= $this->danhmuc_model->show();
    $this->render('admin/danhmuc_view/danhmuc_list_view');
  }
  
  public function add()
  {
    $themdanhmuc=$this->input->post('themdanhmuc');
    if(isset($themdanhmuc))
    {
      $this->danhmuc_model->add();
      redirect('admin/danhmuc');
    }
    else $this->load->view('admin/danhmuc_view/danhmuc_add_view');
  }

  public function update($madm = NULL)
  {
    $suadanhmuc= $this->input->post('suadanhmuc');
    if(isset($suadanhmuc))
    {
      $this->danhmuc_model->update();
      redirect('admin/danhmuc');
    }
    else {
      $this->data['danhmuc'] = $this->danhmuc_model->show($madm);
      $this->load->view('admin/danhmuc_view/danhmuc_update_view', $this->data);
    }
  }
  public function delete($madm)
  {
    $this->danhmuc_model->delete($madm);
    redirect('admin/danhmuc');
  }
}
?>