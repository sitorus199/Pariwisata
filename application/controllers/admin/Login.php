<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('admin/v_login');
    }
    function auth(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password too sort!'
        ]);

        $username=strip_tags(str_replace("'", "", $this->input->post('email')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $user = $this->db->get_where('tbl_pengguna', ['pengguna_email' => $username])->row_array();
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['pengguna_level']=='1'){
            if($user['pengguna_status'] == 1){
                $this->session->set_userdata('akses','1');
                $idadmin=$xcadmin['pengguna_id'];
                $user_nama=$xcadmin['pengguna_nama'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
                redirect('admin/dashboard');

            }else{
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Email Belum diaktivasi</div>');
                redirect('admin/login');
            }
            
         }else{
            if($user['pengguna_status'] == 1){
                $this->session->set_userdata('akses','2');
                $idadmin=$xcadmin['pengguna_id'];
                $user_nama=$xcadmin['pengguna_nama'];
                $user_moto=$xcadmin['pengguna_moto'];
                $user_email=$xcadmin['pengguna_email'];
                $user_hp=$xcadmin['pengguna_nohp'];
                $this->session->set_userdata('hp',$user_hp);
                $this->session->set_userdata('email',$user_email);
                $this->session->set_userdata('moto',$user_moto);
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
                redirect('admin/dashboard');
             }else{
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Email Belum diaktivasi</div>');
                redirect('admin/login');
            }
         }

       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('admin/login');
       }

    } 

    public function registration(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_pengguna.pengguna_username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_pengguna.pengguna_email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too sort!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if($this->form_validation->run() == false){
           $this->load->view('admin/v_register');  
        }
        else{
            $email = $this->input->post('email', 'true');
            $data = [
                'pengguna_nama' => htmlspecialchars($this->input->post('username', 'true')),
                'pengguna_moto' => NULL,
                'pengguna_jenkel' => 'L',
                'pengguna_username' => htmlspecialchars($this->input->post('username', 'true')),
                'pengguna_password' => md5($this->input->post('password1')),
                'pengguna_tentang' => NULL,
                'pengguna_email' => htmlspecialchars($email),
                'pengguna_nohp' => NULL,
                'pengguna_facebook' => 'faceboo.com',
                'pengguna_twitter' => 'twitter.com',
                'pengguna_linkdin' => 'linkedin.com',
                'pengguna_google_plus' => 'google.com',
                'pengguna_status' => '0',
                'pengguna_level' => '2',
                'pengguna_register' => time(),
                'pengguna_photo' => 'default.jpg'
            ];


            //token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date-create' => time()
            ];

            $this->db->insert('tbl_pengguna', $data);
            $this->db->insert('user_token', $user_token);
 
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> User berhasil didaftarkan. silahkan Aktivasi</div>');
            redirect('admin/login');
        }
        
    }

    private function _sendEmail($token, $type){

        $atas = '
        <!DOCTYPE html>
                <html >
                <head>
                <meta charset="UTF-8">
                <title> Forgot password?</title>
                </head>

                <body>
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <!--[if !mso]><!-->
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!--<![endif]-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title></title>
                <!--[if !mso]><!-->
  
                </head>

                    <body bgcolor="#e1e5e8" style="margin-top:0 ;margin-bottom:0 ;margin-right:0 ;margin-left:0 ;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;background-color:#e1e5e8;">
                        <center style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#e1e5e8;">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;">
                            <table align="center" cellpadding="0" style="border-spacing:0;font-family:Arial,sans-serif;color:#333333;Margin:0 auto;width:100%;max-width:600px;">
                        <tbody>
                        <tr>
                            <td align="center" class="vervelogoplaceholder" height="143" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;height:143px;vertical-align:middle;" valign="middle"><span class="sg-image"><a href="#" target="_blank"><img alt="Verve Wine" height="34" src="https://images2.imgbox.com/82/d9/wdFA5HUr_o.png" style="border-width: 0px; width: 160px; height: 34px;" width="160"></a></span></td>
                        </tr>
                        <tr>
                            <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#ffffff;">
                                <table style="border-spacing:0;" width="100%">
                                    <tbody>
                  <tr>
                    <td align="center" class="inner" style="padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;" valign="middle"><span class="sg-image"><img alt="Forgot Password" class="banner" height="93" src="https://marketing-image-production.s3.amazonaws.com/uploads/35c763626fdef42b2197c1ef7f6a199115df7ff779f7c2d839bd5c6a8c2a6375e92a28a01737e4d72f42defcac337682878bf6b71a5403d2ff9dd39d431201db.png" style="border-width: 0px; margin-top: 30px; width: 255px; height: 93px;" width="255"></span></td>
                  </tr>
                  <tr>
                    <td class="inner contents center" style="padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;text-align:left;">
                      <center>
                        <p class="h1 center" style="Margin:0;text-align:center;font-family:Arial;font-weight:100;font-size:30px;Margin-bottom:26px;">Forgot your password?</p>
                        <!--[if (gte mso 9)|(IE)]><![endif]-->

                        <p class="description center" style="font-family:Arial;Margin:0;text-align:center;max-width:320px;color:#a1a8ad;line-height:24px;font-size:15px;Margin-bottom:10px;margin-left: auto; margin-right: auto;"><span style="color: rgb(161, 168, 173); font-family: Muli, &quot;Arial Narrow&quot;, Arial; font-size: 15px; text-align: center; background-color: rgb(255, 255, 255);">Thats okay, it happens! Click on the button below to reset your password.</span></p>
                        <span class="sg-image">';

        $bawah = '
            </span></center>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:30px;padding-left:30px;text-align:center;Margin-right:auto;Margin-left:auto;">
              <center>
                <p style="font-family:Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;font-size:15px;color:#a1a8ad;line-height:23px;">Problems or questions? Call us at
                  <nobr><a class="tel" href="#" style="color:#a1a8ad;text-decoration:none;" target="_blank"><span style="white-space: nowrap">anak.tao.com</span></a></nobr>
                </p>

                <p style="font-family:Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;font-size:15px;color:#a1a8ad;line-height:23px;">or email <a href="mailto:hello@vervewine.com" style="color:#a1a8ad;text-decoration:underline;" target="_blank">panaktoba@gmail.com</a></p>

                <p style="font-family:Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;padding-top:10px;padding-bottom:0px;font-size:15px;color:#a1a8ad;line-height:23px;">© Anak Tao <span style="white-space: nowrap">Samosir ​</span>, <span style="white-space: nowrap"> Sumatera Utara, </span> <span style="white-space: nowrap">22383</span></p>
              </center>
            </td>
          </tr>
          <!-- whitespace -->
          <tr>
            <td height="40">
              <p style="line-height: 40px; padding: 0 0 0 0; margin: 0 0 0 0;">&nbsp;</p>

              <p>&nbsp;</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </center>
</body>
</body>
</html>';





        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'panaktoba@gmail.com',
            'smtp_pass' => 'Parsamosir18@',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];


        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('panaktoba@gmail.com', 'Anak Tao');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $this->email->subject('Account Verification');
            $this->email->message(''.$atas.'<a href="' . base_url() . 'admin/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" target="_blank"><img alt="Reset your Password" height="54" src="https://marketing-image-production.s3.amazonaws.com/uploads/c1e9ad698cfb27be42ce2421c7d56cb405ef63eaa78c1db77cd79e02742dd1f35a277fc3e0dcad676976e72f02942b7c1709d933a77eacb048c92be49b0ec6f3.png" style="border-width: 0px; margin-top: 30px; margin-bottom: 50px; width: 260px; height: 54px;" width="260"></a> '.$bawah.'');
        }else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message(''.$atas.'<a href="' . base_url() . 'admin/login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" target="_blank"><img alt="Reset your Password" height="54" src="https://marketing-image-production.s3.amazonaws.com/uploads/c1e9ad698cfb27be42ce2421c7d56cb405ef63eaa78c1db77cd79e02742dd1f35a277fc3e0dcad676976e72f02942b7c1709d933a77eacb048c92be49b0ec6f3.png" style="border-width: 0px; margin-top: 30px; margin-bottom: 50px; width: 260px; height: 54px;" width="260"></a> '.$bawah.'');
        }
        

        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die; 
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pengguna', ['pengguna_email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();


            if ($user_token) {
                $waktu = time() - $user_token['date-create'];
                $waktu2 = time();
                $waktu3 = $user_token['date-create'];
                if ($waktu < 86400) {
                    $this->db->set('pengguna_status', 1);
                    $this->db->where('pengguna_email', $email);
                    $this->db->update('tbl_pengguna');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>'. $email .' Telah diaktivasi'.$waktu.'</div>');
                    redirect('admin/login');

                }else{
                    $this->db->delete('tbl_pengguna', ['pengguna_email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal diaktivasi Token Expired!! '.$waktu.' dan '.$waktu2.' dan '.$waktu3.'</div>');
                    redirect('admin/login');
                }
                
            }else{
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal diaktivasi Token Invalid!!</div>');
                redirect('admin/login'); 
            }

        }else{
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal diaktivasi Salah Email</div>');
            redirect('admin/login'); 
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }


    public function forgotPassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/v_forgot_password');
        }else{
            $email = $this->input->post('email');

            $user = $this->db->get_where('tbl_pengguna', ['pengguna_email' => $email, 'pengguna_status' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date-create' => time()
                ];
                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Cek Email Anda untuk mereset Password.</div>');
                redirect('admin/login/forgotpassword');
                
            }else{
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Email belum di Registrasi atau belum diaktivasi!!</div>');
                redirect('admin/login/forgotpassword');
            }


        }
        
    }

    public function resetPassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pengguna', ['pengguna_email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) { 
                $waktu = time() - $user_token['date-create'];

                if ($waktu < 86400) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();

                }else{
                    
                    $this->db->delete('user_token', ['email' => $email]);

                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal diaktivasi Token Expired!! </div>');
                    redirect('admin/login');
                }

            }else{
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal Mereset Password, Salah Token</div>');
                redirect('admin/login');
            }

        }else{
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal Mereset Password, Salah Email</div>');
            redirect('admin/login');
        }

    }

    public function changePassword(){
        $this->load->library('form_validation');

        if (!$this->session->userdata('reset_email')) {
            redirect('admin/login'); 
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too sort!'
        ]);
        $this->form_validation->set_rules('password2', 'RepeatPassword', 'required|trim|min_length[6]|matches[password1]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too sort!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/v_change_password');
        }else{

            $password = md5($this->input->post('password1'));
            $email  = $this->session->userdata('reset_email');

            $this->db->set('pengguna_password', $password);
            $this->db->where('pengguna_email', $email);
            $this->db->update('tbl_pengguna');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');
            echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Password telah diubah Silahkan Login! </div>');
            redirect('admin/login');


        }
    }

}
