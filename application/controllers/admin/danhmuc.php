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
    $this->load->model('Danhmuc_model');
  }

  public function index()
  {
    $this->data['page_title']='Quản lý danh mục';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/ Quản lý danh mục';
    $this->data['danhmuc']= $this->Danhmuc_model->show();
    $this->render('admin/danhmuc_view/danhmuc_list_view');
  }
  
  public function add()
  {
    $this->data['page_title']='Thêm danh mục';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/<a href ="'.base_url("admin/danhmuc").'"> Quản lý danh mục</a> / Thêm danh mục';
    $this->render('admin/danhmuc_view/danhmuc_add_view');
    $themdanhmuc=$this->input->post('themdanhmuc');
    if(isset($themdanhmuc))
    {
      $this->Danhmuc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/danhmuc/index');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa danh mục';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/<a href ="'.base_url("admin/danhmuc").'"> Quản lý danh mục</a> / Sửa danh mục';
    $this->data['danhmuc']= $this->Danhmuc_model->show();
    $this->render('admin/danhmuc_view/danhmuc_update_view');
    $id= $this->uri->segment(4);
    $suadanhmuc= $this->input->post('suadanhmuc');
    if(isset($suadanhmuc))
    {
      $this->Danhmuc_model->update($id);
      $this->session->set_flashdata('message',' Sửa Thành Công');
      redirect('admin/danhmuc/index');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->Danhmuc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/danhmuc/index');
    }
}
?>