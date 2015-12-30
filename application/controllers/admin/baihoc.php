<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Baihoc extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
    {
      $this->session->set_flashdata('message','You are not allowed to access this page');
      redirect('admin','refresh');
    }
    $this->load->model('Cthoc_model');
    $this->load->model('Baihoc_model');
  }
  public function index()
  {
    $this->data['page_title']='Quản Lý Bài Học';
    $this->data['baihoc']= $this->Baihoc_model->show();
    $this->render('admin/baihoc_view/baihoc_list_view');
  }
  public function add()
  {
    $this->data['page_title']='Thêm Bài Học';
    $this->render('admin/baihoc_view/baihoc_add_view');
    $thembaihoc=$this->input->post('thembaihoc');
    if(isset($thembaihoc))
    {
      $this->Baihoc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/baihoc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa Bài Học';
    $this->data['baihoc']= $this->Baihoc_model->show();
    $this->render('admin/baihoc_view/baihoc_update_view');
    $id= $this->uri->segment(4);
    $suabaihoc= $this->input->post('suabaihoc');
    if(isset($suabaihoc))
    {
      $this->Baihoc_model->update($id);
      $this->session->set_flashdata('message','Sửa Thành công');
      redirect('admin/baihoc','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->Baihoc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/baihoc/index','refresh');
    }
}
?>
