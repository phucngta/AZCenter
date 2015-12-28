<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ctkhoahoc extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
    {
      $this->session->set_flashdata('message','You are not allowed to access this page');
      redirect('admin','refresh');
    }
    $this->load->model('khoahoc_model');
    $this->load->model('ion_auth_model');
    $this->load->model('ctkhoahoc_model');
  }
  public function index()
  {
    $this->data['page_title']='Quản Lý Chi Tiết Khóa Học';
    $this->data['ctkhoahoc']= $this->ctkhoahoc_model->show();
    $this->render('admin/ctkhoahoc_view/ctkhoahoc_list_view');
  }
  public function add()
  {
    $this->data['page_title']='Thêm Chi Tiết Khóa Học';
    $this->render('admin/ctkhoahoc_view/ctkhoahoc_add_view');
    $themctkhoahoc=$this->input->post('themctkhoahoc');
    if(isset($themctkhoahoc))
    {
      $this->ctkhoahoc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/ctkhoahoc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa Chi Tiết Khóa Học';
    $this->data['ctkhoahoc']= $this->ctkhoahoc_model->show();
    $this->render('admin/ctkhoahoc_view/ctkhoahoc_update_view');
    $id= $this->uri->segment(4);
    $suactkhoahoc= $this->input->post('suactkhoahoc');
    if(isset($suactkhoahoc))
    {
      $this->ctkhoahoc_model->update($id);
      $this->session->set_flashdata('message','Sửa Thành công');
      redirect('admin/ctkhoahoc','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->ctkhoahoc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/ctkhoahoc/index','refresh');
    }
}
?>