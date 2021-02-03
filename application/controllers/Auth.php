<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  // Parent construct
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  // Halaman Index
  public function index()
  {
    $data ['title'] ="TMS NUSINDO - LOGIN";
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/login');
    $this->load->view('templates/auth_footer');
  }

  // View Register
  public function register()
  {
    $data ['title'] ="TMS NUSINDO - REGISTRASI";
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/register');
    $this->load->view('templates/auth_footer');
  }

  // Panggil form sesuai dengan Role id
  public function form($role)
	{
		if ($role=='tns20000')
		{
      $data ['title'] ="TMS NUSINDO - REGISTRASI";
      $data2 ['akun'] ="Teknisi";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/register_form', $data2);
      $this->load->view('templates/auth_footer');
		}
		elseif ($role=='tns30000')
		{
      $data ['title'] ="TMS NUSINDO - REGISTRASI";
      $data2 ['akun'] ="Marketing";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/register_form', $data2);
      $this->load->view('templates/auth_footer');
		}
		elseif ($role=='tns40000')
		{
			$data['mst_prov'] = $this->Auth->get_provinsi()->result();
			$this->load->view('regcustomer',$data);
		}
	}

  // Aksi Registrasi Ketika Run
  public function aksi_register()
  {

    // cek role_id nya
    $roleidnya 	= $this->input->post('role_id');

    // jika role id nya teknisi
    if ($roleidnya=="tns20000")
    {
      // cek form validasinya sesuaikan dengan rules
      $this->form_validation->set_rules('user_id', 'Username','required|trim|is_unique[mst_user.user_id]');
      $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[mst_user.email]');
      // dan jika inputannya salah maka
      if($this->form_validation->run() == false)
      {
        redirect('auth/form/tns20000');
      }
      // jika inputannya benar maka
      else
      {
        echo "berhasil";
      }
    }
    // elseif ($roleidnya=="tns30000")
    // {
    //   $data ['title'] ="TMS NUSINDO - REGISTRASI";
    //   $data2 ['akun'] ="Marketing";
    //   $this->load->view('templates/auth_header', $data);
    //   $this->load->view('auth/register_form', $data2);
    //   $this->load->view('templates/auth_footer');
    // }
    //
		//
    // $this->form_validation->set_rules('password', 'Password','trim|required|min_length[1]|max_length[255]');


  }

}
