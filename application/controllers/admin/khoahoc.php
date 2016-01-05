<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Khoahoc extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
    {
      $this->session->set_flashdata('message','You are not allowed to access this page');
      redirect('admin');
    }
    $this->load->model('Cthoc_model');
    $this->load->model('Danhmuc_model');
    $this->load->model('Khoahoc_model');
    $this->upload_folder = 'course';

  }
  public function index($teacher_id = NULL)
  {
    $this->data['page_title']='Quản lý khóa học';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/ Quản lý khóa học';
    $this->data['khoahoc']= $this->Khoahoc_model->show($teacher_id);
    if ($teacher_id != NULL) {
      $this->data['invisible_button'] = True;
      $this->load->view('admin/khoahoc_view/khoahoc_list_view', $this->data);
    }
    else $this->render('admin/khoahoc_view/khoahoc_list_view');
  }

  public function listByStudents($student_id = NULL)
  {
    $this->data['khoahoc']= $this->Khoahoc_model->listByStudents($student_id);
    $this->data['invisible_button'] = True;
    $this->load->view('admin/khoahoc_view/khoahoc_list_view', $this->data);
  }

  public function getStudents($makh = NULL)
  {
    $this->data['students']= $this->Khoahoc_model->getStudents($makh);
    $this->data['invisible_button'] = True;
    $this->load->view('admin/students/list_students_view', $this->data);
  }

  public function add()
  {
    $this->data['page_title']='Thêm khóa học';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/<a href ="'.base_url("admin/khoahoc").'"> Quản lý khóa học</a> / Thêm khóa học';
    $this->render('admin/khoahoc_view/khoahoc_add_view');
    $themkhoahoc=$this->input->post('themkhoahoc');

    if(isset($themkhoahoc))
    {
      //Upload Image
      $makh =  $this->Khoahoc_model->taoma();
      $this->upload($this->upload_folder, $makh);

      $this->Khoahoc_model->add($makh, $this->additional_data);
      $this->session->set_flashdata('message','Thêm Thành Công');
      redirect('admin/khoahoc/index');
    }
  }

   public function update()
  {
    $this->data['page_title']='Sửa khóa học';
    $this->data['nav'] = '<a href ="'.site_url("admin").'">Dashboard </a>/<a href ="'.base_url("admin/khoahoc").'"> Quản lý khóa học</a> / Sửa khóa học';
    $this->data['khoahoc']= $this->Khoahoc_model->show();
    $this->render('admin/khoahoc_view/khoahoc_update_view');
    $id= $this->uri->segment(4);
    $suakhoahoc= $this->input->post('suakhoahoc');
    if(isset($suakhoahoc))
    {
      //Upload Image
      $this->upload($this->upload_folder, $id);

      $this->Khoahoc_model->update($id, $this->new_data);
      $this->session->set_flashdata('message','Sửa Thành công');
      redirect('admin/khoahoc');
    }
  }
    public function delete()
    {
      $id=$this->uri->segment(4);
      
      // $this->session->set_flashdata('message',$this->Khoahoc_model->delete($id));
      redirect('admin/khoahoc/index');
    }
}
?>