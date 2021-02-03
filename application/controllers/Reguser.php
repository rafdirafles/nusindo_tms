<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reguser extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','Auth');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function form($role)
	{
		if ($role=='tns20000')
		{
			$this->load->view('reg_page');
		}
		elseif ($role=='tns30000')
		{
			$this->load->view('reg_page');
		}
		elseif ($role=='tns40000')
		{
			$data['mst_prov'] = $this->Auth->get_provinsi()->result();
			$this->load->view('regcustomer',$data);
		}
	}

	//Get Prov and city
	function get_city(){
	  $prov_idnya = $this->input->post('id',TRUE);
	  $data = $this->Auth->get_kota($prov_idnya)->result();
	  echo json_encode($data);
  }

	public function register()
	{
		$this->load->library('form_validation');
    $this->load->library('session');

		$this->form_validation->set_rules('user_id', 'user_id','trim|required|min_length[1]|max_length[255]|is_unique[mst_user.user_id]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->error_array();
        $this->session->set_flashdata('errors', $errors);
        $this->session->set_flashdata('input', $this->input->post());
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>username sudah terdaftar , cari username lain</div>');
				//redirect register sesuai tombol (role)
				redirect('Reguser');
    }
		else {
			$username = $this->input->post('user_id');
			$password = $this->input->post('password');
			$pass		  = password_hash($password, PASSWORD_DEFAULT);
			$email 		= $this->input->post('email');
			$flg_aprv = $this->input->post('flg_aprv');
			$role_id 	= $this->input->post('role_id');
			$flg_used = $this->input->post('flg_used');
			$data = [
            'user_id' => $username,
            'password'=> $pass,
						'email'		=> $email,
						'flg_aprv'=> $flg_aprv,
						'role_id' => $role_id,
						'flg_used'=> $flg_used
        ];
				$insert = $this->Auth->register("mst_user", $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fa fa-times-circle mr-2"></i>Berhasil Mendaftar silahkan Login</div>');
				redirect('login');
			}
	}

	public function regiscust()
	{
		$this->load->library('form_validation');
    $this->load->library('session');
		$this->form_validation->set_rules('user_id', 'user_id','trim|required|min_length[1]|max_length[255]|is_unique[mst_user.user_id]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			$this->session->set_flashdata('input', $this->input->post());
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>username sudah terdaftar , cari username lain</div>');
			//redirect register sesuai tombol (role)
			redirect('Reguser');
		}
				else {
					$username = $this->input->post('user_id');
					$password = $this->input->post('password');
					$pass		  = password_hash($password, PASSWORD_DEFAULT);
					$email 		= $this->input->post('email');
					$flg_aprv = $this->input->post('flg_aprv');
					$role_id 	= $this->input->post('role_id');
					$flg_used = $this->input->post('flg_used');

					//customer
					$cust_id						= $this->input->post('cust_id');
					$category_id				= $this->input->post('category_id');
					$branch_id				= $this->input->post('branch_id');
					$address						= $this->input->post('address');
					$prov_id 						= $this->input->post('prov_id');
					$city_id						= $this->input->post('city_id');
				}
				$data = [
		            'user_id' => $username,
		            'password'=> $pass,
								'email'		=> $email,
								'flg_aprv'=> $flg_aprv,
								'role_id' => $role_id,
								'flg_used'=> $flg_used
				];
				$custdata = [
							'cust_id'				=> $cust_id,
							'category_id'	  => $category_id,
							'branch_id'			=> $branch_id,
	            'address'				=> $address,
							'prov_id'				=> $prov_id,
							'city_id'				=> $city_id
	      ];
				// var_dump($data);var_dump($custdata);die;
				$insert = $this->Auth->register("mst_user", $data);
				$insert2 = $this->Auth->register("mst_customer", $custdata);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fa fa-times-circle mr-2"></i>Berhasil Mendaftar silahkan Login</div>');
				redirect('login');
	}



}
