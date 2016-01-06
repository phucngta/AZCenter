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
	public function dkkh($idhv,$idkh)
	{
		if(isset($idhv) || isset($idkh)){
			$data = array(
				'makh'=>$idkh,
				'student_id' =>$idhv,
				);
			$this->db->insert('ctkhoahoc',$data);
			$this->session->set_flashdata('message','Đăng ký khóa học thành công');
		}
		redirect('home');
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

			//Kiem tra thong tin
			if (!$this->kiem_tra_user($username) || !$this->kiem_tra_email($email))
			{
				ob_end_clean();
				$this->session->set_flashdata('message',"Thông tin không hợp lệ");
				$this->render("public/register_login_view");
				return false;
			}

			$this->additional_data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'age' => $this->input->post('age')
				);


			//Upload Image
			$this->upload($this->upload_folder,$username);

			$this->ion_auth->register($username, $password, $email, $this->additional_data, $group_id);
			$this->session->set_flashdata('message',$this->upload_error.$this->ion_auth->messages());
			redirect('home','refresh'); 
		}
		else
		{
			$this->render("public/register_login_view");
		}
	}

	public function kiem_tra_user($name = NULL)
	{
		if($name != NULL)
		{
			$str = 'SELECT * FROM users Where username ='.$this->db->escape($name);
			$query = $this->db->query($str);
			$count = $query->num_rows(); 
			ob_start();
			if ($count === 0)
			{
				echo "Tên hợp lệ";
				return true;
			}
			else{
				echo "Tên này đã có người sử dụng. Vui lòng chọn tên khác";
				// return false;
			}
		}
		else echo "Chưa nhập tên";
		return false;
	}

	public function kiem_tra_email($email = NULL)
	{
		if($email != NULL)
		{
			$str = 'SELECT * FROM users Where email ='.$this->db->escape($email);
			$query = $this->db->query($str);
			$count = $query->num_rows(); 
			if ($count === 0)
			{
				echo "Có thể sử dụng";
				return true;
			}
			else{
				echo "Email này đã có người sử dụng. Vui lòng sử dụng email khác";
				// return false;
			}
		}
		else echo "Chưa nhập email";
		return false;
	}
}