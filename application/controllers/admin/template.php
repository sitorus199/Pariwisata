<?php 

$this->email->message('Tekan link berikut untuk reset Password Anda : <a href="' . base_url() . 'admin/login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');



$this->email->message('Tekan link berikut untuk memverifikasi akun kamu : <a href="' . base_url() . 'admin/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');

$this->email->message(''.$atas.'<a href="' . base_url() . 'admin/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" target="_blank"><img alt="Reset your Password" height="54" src="https://marketing-image-production.s3.amazonaws.com/uploads/c1e9ad698cfb27be42ce2421c7d56cb405ef63eaa78c1db77cd79e02742dd1f35a277fc3e0dcad676976e72f02942b7c1709d933a77eacb048c92be49b0ec6f3.png" style="border-width: 0px; margin-top: 30px; margin-bottom: 50px; width: 260px; height: 54px;" width="260"></a> '.$bawah.'');

 ?>