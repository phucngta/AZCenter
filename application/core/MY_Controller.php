<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  protected $data = array();
  protected $upload_error = '';
  protected $upload_folder='avatar';
  protected $additional_data = array();
  protected $new_data = array();

  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->data['current_user'] = $this->ion_auth->user()->row();

    $this->data['page_title'] = 'AzCenter';
    $this->data['before_head'] = '';
    $this->data['before_body'] ='';
  }

  protected function render($the_view = NULL, $template = 'master')
  {
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
  }

  protected function upload($upload_folder='./uploads', $file_name)
  {
    //Upload Image
    $configure['allowed_types'] =   "gif|jpg|jpeg|png";  
    $configure['max_size']      =   "5000"; 
    $configure['max_width']     =   "1907"; 
    $configure['max_height']    =   "1280";
    $configure['upload_path']   =   './uploads'; 
    $this->load->library('upload',$configure); 
    if(!$this->upload->do_upload()) 
    { 
      $this->upload_error = $this->upload->display_errors();
      // $image = './uploads/no-user-images.gif';
      // $thumb = './uploads/avatar/no-user-image-thumb.gif';
    }
    else
    {
      $finfo = $this->upload->data();
      if ($file_name==NULL) {
        $file_name = $finfo['file_name'];
      }
      //Resize 1
      $avatar = './uploads/'.$upload_folder. "/".$file_name.'.jpg';
      $configure['image_library'] = "gd2";
      $configure['source_image'] = './uploads/'.$finfo['file_name'];
      $configure['maintain_ratio'] = TRUE;
      $configure['remove_spaces'] = TRUE;
      $configure['file_ext'] = '.jpg';
      $configure['width'] = "200";
      $configure['height'] = "200";
      $configure['new_image'] = $avatar;
      $this->load->library('image_lib',$configure);
      $this->image_lib->resize();
      $this->image_lib->clear();

      //Resize 2
      $thumb = './uploads/'.$upload_folder. "/".$file_name.'_thumb.jpg';
      $configure['width'] = "50";
      $configure['height'] = "50";
      $configure['new_image'] = $thumb;
      $this->image_lib->initialize($configure);
      $this->image_lib->resize();
      $this->image_lib->clear();

      $this->additional_data['avatar'] = $avatar;
      $this->additional_data['thumbnail'] = $thumb;
      $this->new_data['avatar'] = $avatar;
      $this->new_data['thumbnail'] = $thumb;
    }
    
  }
}

class Admin_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'Dashboard';
    
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('admin/user/login', 'refresh');
    }
    
    $this->data['current_user_drop_menu'] = '';
    $this->data['current_user_nav_menu'] = '';

    if($this->ion_auth->in_group('admin'))
    {
      $this->data['current_user_drop_menu'] = $this->load->view('templates/admin/_parts/drop_menu_admin_view.php', NULL, TRUE);
      $this->data['current_user_nav_menu'] = $this->load->view('templates/admin/_parts/nav_menu_admin_view.php', NULL, TRUE);
    }
    if($this->ion_auth->in_group('teacher'))
    {
      $this->data['current_user_nav_menu'] = $this->load->view('templates/admin/_parts/nav_menu_teacher_view.php', NULL, TRUE);
    }
  }

  protected function render($the_view = NULL, $template = 'admin/admin_master')
  {
    parent::render($the_view, $template);
  }

  protected function deleteUser($user_id = NULL, $controller = NULL)
  {
    if(is_null($user_id))
    {
      $this->session->set_flashdata('message','There\'s no user to delete');
    }
    else
    {
      $this->ion_auth->delete_user($user_id);
      $this->session->set_flashdata('message',$this->ion_auth->messages());
    }
    redirect('admin/'.$controller,'refresh');
  }
}


class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  protected function render($the_view = NULL, $template = 'public/public_master')
  {
    parent::render($the_view, $template);
  }
}