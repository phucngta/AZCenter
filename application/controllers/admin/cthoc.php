<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Cthoc extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
    {
      $this->session->set_flashdata('message','You are not allowed to access this page');
      redirect('admin','refresh');
    }
    $this->load->model('cthoc_model');
  }
  public function index()
  {
    $this->data['page_title']='Quản Lý Chương Trình Học';
    $this->data['chuongtrinhhoc']= $this->cthoc_model->show();
    $this->render('admin/cthoc_view/cthoc_list_view');
  }
  public function add()
  {
    $this->data['page_title']='Thêm Chương Trình Học';
    $this->render('admin/cthoc_view/cthoc_add_view');
    $themcthoc=$this->input->post('themcthoc');
    if(isset($themcthoc))
    {
      $this->cthoc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/cthoc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa Chương Trình Học';
    $this->data['chuongtrinhhoc']= $this->cthoc_model->show();
    $this->render('admin/cthoc_view/cthoc_update_view');
    $id= $this->uri->segment(4);
    $suacthoc= $this->input->post('suacthoc');
    if(isset($suacthoc))
    {
      $this->cthoc_model->update($id);
      $this->session->set_flashdata('message',' Sửa Thành Công');
      redirect('admin/cthoc/index','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->cthoc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/cthoc/index','refresh');
    }
}
?>