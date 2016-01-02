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
    $this->load->model('Cthoc_model');
  }
  public function index()
  {
    $this->data['page_title']='Quản lý chương trình đào tạo';
    $this->data['chuongtrinhhoc']= $this->Cthoc_model->show();
    $this->render('admin/cthoc_view/cthoc_list_view');
  }
  public function add()
  {
    $this->data['page_title']='Thêm chương trình đào tạo';
    $this->render('admin/cthoc_view/cthoc_add_view');
    $themcthoc=$this->input->post('themcthoc');
    if(isset($themcthoc))
    {
      $this->Cthoc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/cthoc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa chương trình đào tạo';
    $this->data['chuongtrinhhoc']= $this->Cthoc_model->show();
    $this->render('admin/cthoc_view/cthoc_update_view');
    $id= $this->uri->segment(4);
    $suacthoc= $this->input->post('suacthoc');
    if(isset($suacthoc))
    {
      $this->Cthoc_model->update($id);
      $this->session->set_flashdata('message',' Sửa Thành Công');
      redirect('admin/cthoc/index','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->Cthoc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/cthoc/index','refresh');
    }
}
?>