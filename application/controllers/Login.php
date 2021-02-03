<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('email');
    $this->load->library('form_validation');
    $this->load->model('User_model');
    // $this->load->library('phpmailer');

  }

  function index(){
    $this->load->view('login'); // Load view login.php
  }

  function aksi_login(){
      $username = htmlspecialchars($this->input->post('username'));
      $password = htmlspecialchars($this->input->post('password'));

      // Cek ke database
      $cek = $this->User_model->cek_login($username);
      //cek role nya dari db
      $rolenya = $this->User_model->cek_data();

      //Cek apakah username ada
      if($cek == TRUE){
        // Jika ada cek role id nya berapa
        if($cek['role_id']=='tns10000'){
          // Jika role_id nya sesuai , cek passwordnya , kalau benar eksekusi
          if(password_verify($password,$cek['password'])){
            $data_session = [
                'user_id' => $username,
                'status'  => "login",
                'role'    => "admin"
            ];
              $this->session->set_userdata($data_session);
              redirect("Main/template");
          }
          // kalau salah ulangi , beri alert , login lagi
          else{
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Username / Password salah!</div>');
              redirect('login');
          }
        }
        elseif ($cek['role_id']=='tns20000') {
            if(password_verify($password,$cek['password'])){
              $data_session = [
                  'user_id' => $username,
                  'status'  => "login",
                  'role'    => "teknisi"
              ];
                $this->session->set_userdata($data_session);
                redirect("Main/template");
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Username / Password salah!</div>');
                redirect('login');
            }
          }
          elseif ($cek['role_id']=='tns30000') {
            if(password_verify($password,$cek['password'])){
              $data_session = [
                  'user_id' => $username,
                  'status'  => "login",
                  'role'    => "marketing"
              ];
                $this->session->set_userdata($data_session);
                redirect("Main/template");
            }
            else{
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Username / Password salah!</div>');
              redirect('login');
            }
          }
          elseif ($cek['role_id']=='tns40000') {
            if(password_verify($password,$cek['password'])){
              $data_session = [
                  'user_id' => $username,
                  'status'  => "login",
                  'role'    => "user"
              ];
                $this->session->set_userdata($data_session);
                redirect("Main/template");
            }
            else{
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Username / Password salah!</div>');
              redirect('login');
            }
          }
      }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>ANDA TIDAK TERDAFTAR !</div>');
        redirect('login');
      }
    }
    public function logout(){
      $this->session->sess_destroy(); // Hapus semua session
      redirect('login'); // Redirect ke halaman login
    }
    public function forgot_password(){
      $this->load->view('auth/forgotpassword');
    }

    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $user = $this->db->get_where('mst_user', ['email' => $email])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $subject = 'Reset Password.';
                $isiemail = "
                <div width='100%' style='background: #eceff4; padding: 50px 20px;padding-top:50px; color: #514d6a;'>
                  <div style='max-width: 700px; margin: 0px auto; font-size: 14px; background: white'>
                    <div style='padding: 10px 40px 20px 40px; background: #fff;'>
                      <table style='width: 100%;' cellspacing='0' cellpadding='0' border='0'>
                        <tbody>
                          <tr>
                            <td><p style='text-align: center; padding-top: 10px;'>Kami menerima permintaan untuk melakukan reset password Akun Web TMS kamu ".$email.".&nbsp;
                            <span style='background-color: transparent;'>Bila benar kamu telah membuat permintaan tersebut, klik link di bawah ini ya. Bila tidak, kamu dapat mengabaikan email ini.</span></p>
                              <table width='40%' align='center'>
                                <tbody>
                                  <tr>
                                    <td style='background:red;padding:13px 0;border-radius:50px;' align='center'>
                                      <a href='".base_url()."login/resetPassword?email=".$this->input->post('email')."&token=".urlencode($token)."' style='text-decoration:none;color:#fff;font-size:16px;font-weight:bold;display:block;text-align:center' target='_blank' data-saferedirecturl='".base_url()."login/resetPassword?email=".$this->input->post('email')."&token=".urlencode($token)."'>RESET PASSWORD</a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <p style='text-align: center; padding-top: 10px;'><span style='background-color: transparent;'><br>Tombol hanya dapat digunakan sekali dan akan kadaluwarsa dalam waktu 1 x 24 jam.<br></span></p><p style='text-align: center; padding-top: 10px;'>
                              <span style='background-color: transparent;'>Salam,<br></span><span style='background-color: transparent;'>Admin TMS Nusindo</span><span style='background-color: transparent;'><br></span></p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <table style='background:#086E47;padding:0px;width:100%;' class='table table-bordered'>
                      <tbody align='center'>
                        <tr>
                          <td><h5 style='margin-top:10px'><font color='#F7F7F7'>PT. Rajawali Nusindo Copyright © TMS</font></h5></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>";

                $this->db->insert('mst_token', $user_token);
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tmsnusindo@gmail.com';
                $mail->Password = 'administrasi2021';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;
                $mail->setFrom('tmsnusindo@gmail.com', 'PT. Rajawali Nusindo / Admin TMS');
                $mail->addReplyTo('tmsnusindo@gmail.com', 'PT. Rajawali Nusindo / Admin TMS');
                $mail->addAddress(htmlspecialchars($this->input->post('email', true)));
                $mail->addCC('tmsnusindo@gmail.com');
                $mail->addBCC('tmsnusindo@gmail.com');
                $mail->Subject = $subject;
                $mail->isHTML(true);
                $mailContent = $isiemail;
                $mail->Body = $mailContent;

                if(!$mail->send()){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert"><i class="fa fa-times-circle mr-2"></i><i class="fa fa-times-circle mr-2"></i>Terjadi kesalahan. Apakah email yang anda masukkan sudah benar? </br> Atau cek koneksi internet Anda!</div>');
                    redirect('login/forgot_password');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert"><i class="fa fa-check-circle mr-2"></i></i>Cek permintaan reset password pada email Anda.<br>Silahkan melakukan reset password melalui <br> link yang kami kirimkan pada email Anda.</div>');
                    redirect('login');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert"><i class="fa fa-times-circle mr-2"></i><i class="fa fa-times-circle mr-2"></i>Email tidak terdaftar atau belum diaktivasi!</div>');
                redirect('login/forgot_password');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('mst_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('mst_token', ['token' => $token])->row_array();

            if ($user_token) {
                if(time() - $user_token['date_created'] < (60 * 60 * 24)){
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                }else{
                    $this->db->delete('mst_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Reset password gagal! Token sudah kadaluarsa.</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Reset password gagal! Token salah.</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle mr-2"></i>Reset password gagal! Email salah.</div>');
            redirect('login');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }
          $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
          'matches' => 'Password tidak cocok !',
          'min_length' => 'Password terlalu pendek !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('resetpassword');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('mst_user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('mst_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle mr-2"></i>Reset Password Berhasil! Silahkan login.</div>');
            redirect('login');
        }
    }

}
