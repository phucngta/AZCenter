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
      redirect('admin','refresh');
    }
    $this->load->model('danhmuc_model');
  }

  public function index()
  {
    $this->data['page_title']='Quản Lý Danh Mục';
    $this->data['danhmuc']= $this->danhmuc_model->show();
    $this->render('admin/danhmuc_view/danhmuc_list_view');
  }
  
  public function add()
  {
    $this->data['page_title']='Thêm Danh Mục';
    $this->render('admin/danhmuc_view/danhmuc_add_view');
    $themdanhmuc=$this->input->post('themdanhmuc');
    if(isset($themdanhmuc))
    {
      $this->danhmuc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/danhmuc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa Danh Mục';
    $this->data['danhmuc']= $this->danhmuc_model->show();
    $this->render('admin/danhmuc_view/danhmuc_update_view');
    $id= $this->uri->segment(4);
    $suadanhmuc= $this->input->post('suadanhmuc');
    if(isset($suadanhmuc))
    {
      $this->danhmuc_model->update($id);
      $this->session->set_flashdata('message',' Sửa Thành Công');
      redirect('admin/danhmuc/index','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->danhmuc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/danhmuc/index','refresh');
    }
}
?>