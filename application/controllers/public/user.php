<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	public function login()
	{
		if($this->input->post('login'))
		{	
			$this->session->set_flashdata('message',$this->ion_auth->errors());
			$remember = (bool) $this->input->post('remember');

			if (!$this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
			{
				$this->session->set_flashdata('message',$this->ion_auth->errors());
			}
			else 
			{ 
				$this->session->set_flashdata('message',"Đăng nhập thành công");
			}
			redirect('home');
		}
		else
		{
			$this->render('public/register_login_view');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('home');
	}

	public function register()
	{
		if($this->input->post('register'))
		{
			//Lay thong tin
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$group_id = array('2');

			$this->additional_data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'age' => $this->input->post('age')
				);

			//Upload Image
			$this->upload($this->upload_folder,$username);

			$this->ion_auth->register($username, $password, $email, $this->additional_data, $group_id);
			$this->session->set_flashdata('message',$this->upload_error.'<br>'.$this->ion_auth->messages());
			redirect('home','refresh'); 
		}
		else
		{
			$this->render("public/register_login_view");
		}
	}
}