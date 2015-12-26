<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->data['page_title'] = 'User Profile';
    $current_user = $this->ion_auth->user()->row();

    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','Name','trim');
    $this->form_validation->set_rules('phone','Phone','trim');
    $this->form_validation->set_rules('age','Age','greater_than[0]|less_than[50]');

    if($this->form_validation->run()===FALSE)
    {
      $this->load->helper('form');
      $this->render('admin/profile_view');
    }
    else
    {
      $this->new_data = array(
        'name' => $this->input->post('name'),
        'age' => $this->input->post('age'),
        'phone' => $this->input->post('phone')
        );
      if(strlen($this->input->post('password'))>=6) $this->new_data['password'] = $this->input->post('password');

      $this->upload($this->upload_folder, $current_user->username);
      $this->ion_auth->update($current_user->id, $this->new_data);

      $this->session->set_flashdata('message', $this->ion_auth->messages());
      redirect('admin/profile','refresh');
    }
  }
}