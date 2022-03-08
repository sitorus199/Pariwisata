<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_pengguna');
        $this->load->model('m_orders');
        $this->load->model('m_profile');
		$this->load->library('upload');
	}
	function index(){
		$kode=$this->session->userdata('idadmin');
		
		$x['data']=$this->m_profile->get_all_orders_paket();

		// var_dump($x);
		// die();
		$x['datadestinasi']=$this->m_profile->get_all_orders_destinasi();
		$x['dataakomodasi']=$this->m_profile->get_all_orders_akomodasi();
		$x['datatransportasi']=$this->m_profile->get_all_orders_transportasi();
		

		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['user'] = $this->db->get_where('tbl_pengguna',['pengguna_id' => $this->session->userdata('idadmin')])->row_array();
		// echo 'Pengguna ' . $x['user']['pengguna_email'] . '!!';
		$this->load->view('customers/v_profile',$x);
			//redirect('administrator');
	
	}

	function update_pengguna(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $nama=$this->input->post('xnama');
	                		$jenkel=$this->input->post('xjenkel');
	                		$moto=$this->input->post('xmoto');
	                		$tentang=$this->input->post('xtentang');
	                		$username=$this->input->post('xusername');
	                		$password=$this->input->post('xpassword');
                    		$konfirm_password=$this->input->post('xpassword2');
                    		$email=$this->input->post('xemail');
                    		$nohp=$this->input->post('xnohp');
							$level=$this->input->post('xlevel');
							$this->m_profile->update_pengguna($kode,$nama,$moto,$jenkel,$tentang,$email,$nohp,$gambar);
	                    	echo $this->session->set_flashdata('msg','info');
	               			redirect('customers/profile');
                            
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('customers/profile');
	                }
	                
	            }else{
	            	$kode=$this->input->post('kode');
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $moto=$this->input->post('xmoto');
	                $tentang=$this->input->post('xtentang');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xnohp');
					$level=$this->input->post('xlevel');
					$this->m_profile->update_pengguna_tanpa_gambar($kode,$nama,$moto,$jenkel,$tentang,$email,$nohp);
	                echo $this->session->set_flashdata('msg','warning');
	               	redirect('customers/profile');
	            	
	            } 

	}
	function hapus_orders(){
        $kode=$this->input->post('kode');
        $this->m_orders->hapus_orders($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('customers/profile');
    }

    
    function konfirmasi_orders(){
		$kode=$this->input->post('xidpaket');
		$data=$this->m_orders->cek_invoice($kode);
		$q=$data->num_rows();
		if($q>0){
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/images/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '15048'; 
			$config['max_width']  = '9588'; 
			$config['max_height']  = '7000'; 
			$config['file_name'] = $nmfile; 

			$this->upload->initialize($config);
			if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
						$gbr = $this->upload->data();
						$kode2=$this->input->post('kode');
						$gambar=$gbr['file_name'];
						$noinvoice=strip_tags(str_replace("'", "",$this->input->post('xidpaket')));
						$nama=strip_tags(str_replace("'", "",$this->input->post('xnama')));
                        $bank=$this->input->post('bank');
                        $tgl_bayar=$this->input->post('xtanggal');
                        $jumlah=strip_tags(str_replace("'", "",$this->input->post('xjumlah')));
                        
						
				if($gambar==true){
					$this->m_orders->konfirmasi_selesai($kode2);
					$this->m_orders->simpan_bukti($kode2,$nama,$tgl_bayar,$jumlah,$gambar);
				}else{
					redirect('customers/profile');
				}
					echo $this->session->set_flashdata('msg','Terima Kasih Telah Melakukan Konfirmasi Pembayaran!');
				 redirect('customers/profile');
			}  } 

		}else{
			echo $this->session->set_flashdata('msg','No Invoice tidak cocok, coba cek lagi!');
			redirect('customers/profile');
		}
	}
	
}