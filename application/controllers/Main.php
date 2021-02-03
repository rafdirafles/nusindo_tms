<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
  {
        parent::__construct();
				$this->load->model("User_model");

				if($this->session->userdata('status') != "login"){
					redirect(base_url("login"));
				}
	}

	public function template()
	{
		$this->load->view('template');
  }

	public function logout()
	{
        $this->session->sess_destroy(); // Hapus semua session
        redirect('login'); // Redirect ke halaman login
  }
	public function fetch_menu($data){

			$menu1 = "";
			foreach($data as $menu){
			$menu1 .= "<li><a href=".site_url('parent-menu/'.$menu->slug).">".$menu->category_name."</a>";

			if(!empty($menu->sub)){

				$menu1 .= "<ul>";

				$menu1 .= $this->fetch_sub_menu($menu->sub);

				$menu1 .= "</ul>";
			}
			$menu1 .= '</li>';
		}
		return $menu1;

	}
	public function fetch_sub_menu($sub_menu){
		$sub = "";
		foreach($sub_menu as $menu){

			$sub .= "<li><a href=".site_url('child-menu/'.$menu->id).">".$menu->name_menu."</a>";

			if(!empty($menu->sub)){

				$sub .= "<ul>";

				$sub .= $this->fetch_sub_menu($menu->sub);

				$sub .= "</ul>";
			}
			$sub .= '</li>';
		}
		return $sub;
	}
}
