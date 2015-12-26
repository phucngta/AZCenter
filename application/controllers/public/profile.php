<?php defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['page_title'] = 'Hồ sơ người dùng';
		$current_user = $this->ion_auth->user()->row();

		if($this->input->post('update'))
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
			redirect('public/profile');
		}
		else
		{
			if($usergroups = $this->ion_auth->get_users_groups($current_user->id)->result())
			{
				$this->data['usergroups'] = $usergroups;
			}
		}

		// $the_view ='templates/public/_parts/profile_sidebar_view.php';
		// $this->data['profile_sidebar'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
		$this->render("public/profile_view");
	}
}