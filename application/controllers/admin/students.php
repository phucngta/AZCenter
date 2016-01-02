<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class students extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group('teacher'))
		{
			$this->session->set_flashdata('message','You are not allowed to access Students page');
			redirect('admin','refresh');
		}
	}

	public function index()
	{
		$this->data['page_title'] = 'Học viên';
		//Group id học viên
		$group_id = "2";
		$this->data['students'] = $this->ion_auth->users($group_id)->result();
		$this->render('admin/students/list_students_view');
	}

	public function edit($user_id = NULL)
	{
		$user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
		$this->data['page_title'] = 'Sửa thông tin học viên';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name','trim');
		$this->form_validation->set_rules('phone','Phone','trim');
		$this->form_validation->set_rules('age','Age','greater_than[0]|less_than[50]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('user_id','User ID','trim|integer|required');

		if($this->form_validation->run() === FALSE)
		{
			if($user = $this->ion_auth->user((int) $user_id)->row())
			{
				$this->data['user'] = $user;
			}
			else
			{
				$this->session->set_flashdata('message', 'The user doesn\'t exist.');
				redirect('admin/students', 'refresh');
			}
			$this->load->helper('form');
			$this->render('admin/students/edit_student_view');
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$this->new_data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'age' => $this->input->post('age')
				);

			//Upload Image
			$this->upload($this->upload_folder, $this->new_data['username']);
			$this->ion_auth->update($user_id, $this->new_data);

			$this->session->set_flashdata('message',$this->ion_auth->messages());
			redirect('admin/students','refresh');
		}
	}

	public function delete($user_id = NULL, $controller = 'students')
	{
		parent::deleteUser($user_id, $controller);
	}
}