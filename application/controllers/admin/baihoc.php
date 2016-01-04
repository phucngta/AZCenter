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
      redirect('admin');
    }
    $this->load->model('cthoc_model');
    $this->load->model('baihoc_model');
  }
  public function index($macth = NULL)
  {
    $this->data['page_title']='Quản lý bài học';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/ Quản lý bài học';
    $this->data['baihoc']= $this->baihoc_model->show($macth);
    if ($macth != NULL) {
      $this->load->view('admin/baihoc_view/baihoc_list_view', $this->data);
    }
    else  $this->render('admin/baihoc_view/baihoc_list_view');
  }
  public function add()
  {

    $thembaihoc=$this->input->post('thembaihoc');
    if(isset($thembaihoc))
    {
      $this->baihoc_model->add();
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/baihoc');
    }
    else $this->load->view('admin/baihoc_view/baihoc_add_view');
  }

  public function update($id =NULL)
  {
    $suabaihoc= $this->input->post('suabaihoc');
    if(isset($suabaihoc))
    {
      $this->baihoc_model->update();
      $this->session->set_flashdata('message','Sửa Thành công');
      redirect('admin/baihoc');
    }
    {
      $this->data['baihoc'] = $this->baihoc_model->show(NULL, $id);
      $this->load->view('admin/baihoc_view/baihoc_update_view', $this->data);
    }

  }
  public function delete()
  {
    $id=$this->uri->segment(4);
    $this->baihoc_model->delete($id);
    $this->session->set_flashdata('message','Xóa Thành Công');
    redirect('admin/baihoc');
  }
}
?>
