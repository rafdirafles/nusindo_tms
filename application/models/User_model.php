<?php

class User_model extends CI_Model
{
    // Get Data ALL From Table
    function cek_data(){
      return $this->db->get('mst_user')->result_array();
    }

    // Cek username ke database
    public function cek_login($username){
        $hasil = $this->db->where('user_id', $username)->limit(1)->get('mst_user');
        if($hasil->num_rows() > 0){
          return $hasil->row_array();
        }
        else{
          return array();
        }
    }

    // Insert data registrasi ke dalam database
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function get_provinsi()
    {
      $query = $this->db->get('mst_prov');
      return $query;
    }

    function get_kota($prov_id_)
    {
      $query = $this->db->get_where('mst_city', array('prov_id' => $prov_id_));
      return $query;
    }

    public function get_menu(){

        $this->db->select('*');
        $this->db->from('mst_menu');
        $this->db->where('parent_id', '00');
        $categories = $this->db->get()->result();
  			$i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->get_sub_menu($p_cat->id_pcategory);
            $i++;
        }
        return $categories;
    }
  	public function get_sub_menu($id){

          $this->db->select('*');
          $this->db->from('mst_menu');
          $this->db->where('parent_id', $id);

          $categories = $this->db->get()->result();
          $i=0;
          foreach($categories as $p_cat){
              $categories[$i]->sub = $this->get_sub_menu($p_cat->id_pcategory);
              $i++;
          }
          return $categories;
      }

}
