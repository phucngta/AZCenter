<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class khoahoc extends Admin_Controller
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
    $this->load->model('danhmuc_model');
    $this->load->model('khoahoc_model');
    $this->upload_folder = 'course';

  }
  public function index()
  {
    $this->data['page_title']='Quản Lý Khóa Học';
    $this->data['khoahoc']= $this->khoahoc_model->show();
    $this->render('admin/khoahoc_view/khoahoc_list_view');
  }
  public function add()
  {
    $this->data['page_title']='Thêm Khóa Học';
    $this->render('admin/khoahoc_view/khoahoc_add_view');
    $themkhoahoc=$this->input->post('themkhoahoc');

    if(isset($themkhoahoc))
    {
      //Upload Image
      $makh =  $this->khoahoc_model->taoma();
      $this->upload($this->upload_folder, $makh);

      $this->khoahoc_model->add($makh, $this->additional_data['image']);
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/khoahoc/index','refresh');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa Khóa Học';
    $this->data['khoahoc']= $this->khoahoc_model->show();
    $this->render('admin/khoahoc_view/khoahoc_update_view');
    $id= $this->uri->segment(4);
    $suakhoahoc= $this->input->post('suakhoahoc');
    if(isset($suakhoahoc))
    {
      //Upload Image
      $this->upload($this->upload_folder, $id);

      $this->khoahoc_model->update($id, $this->new_data['image']);
      $this->session->set_flashdata('message','Sửa Thành công');
      redirect('admin/khoahoc','refresh');
    }

  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      $this->khoahoc_model->delete($id);
      $this->session->set_flashdata('message','Xóa Thành Công');
      redirect('admin/khoahoc/index','refresh');
    }
}
?>