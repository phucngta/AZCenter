<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teachers extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to access Students page');
			redirect('admin','refresh');
		}
	}

	public function index()
	{
		$this->data['page_title'] = 'Giảng viên';
		//Group id giảng viên
		$group_id = "3";
		$this->data['teachers'] = $this->ion_auth->users($group_id)->result();
		$this->render('admin/teachers/list_teachers_view');
	}

	public function edit($user_id = NULL)
	{
		$user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
		$this->data['page_title'] = 'Sửa thông tin giảng viên';
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
				redirect('admin/teachers', 'refresh');
			}
			$this->load->helper('form');
			$this->render('admin/teachers/edit_teacher_view');
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
			redirect('admin/teachers','refresh');
		}
	}

	public function delete($user_id = NULL, $controller = 'teachers')
	{
		parent::delete($user_id, $controller);
	}
}