<?php
class Souvenir extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_souvenir');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_souvenir->get_all_souvenir();
		$this->load->view('admin/v_souvenir',$x);
	}


	function simpan_souvenir(){
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

	                        $photo=$gbr['file_name'];
	                        $judul=strip_tags($this->input->post('xjudul'));
							$keterangan=$this->input->post('xketerangan');
							$buka=strip_tags($this->input->post('xbuka'));
							$tutup=strip_tags($this->input->post('xtutup'));

							$this->m_souvenir->simpan_souvenir($judul,$buka,$tutup,$keterangan,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/souvenir');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/souvenir');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('xjudul'));
					$keterangan=$this->input->post('xketerangan');
					$buka=strip_tags($this->input->post('xbuka'));
					$tutup=strip_tags($this->input->post('xtutup'));

					$this->m_souvenir->simpan_souvenir_tanpa_img($judul,$buka,$tutup,$keterangan);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/souvenir');
				}
				
	}

	function update_souvenir(){
				
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
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$judul=strip_tags($this->input->post('xjudul'));
							$keterangan=$this->input->post('xketerangan');
							$buka=strip_tags($this->input->post('xbuka'));
							$tutup=strip_tags($this->input->post('xtutup'));

							$this->m_souvenir->update_souvenir($kode,$judul,$buka,$tutup,$keterangan,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/souvenir');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/souvenir');
	                }
	                
	            }else{
					$kode=$this->input->post('kode');
					$judul=strip_tags($this->input->post('xjudul'));
					$keterangan=$this->input->post('xketerangan');
					$buka=strip_tags($this->input->post('xbuka'));
					$tutup=strip_tags($this->input->post('xtutup'));

					$this->m_souvenir->update_souvenir_tanpa_img($kode,$judul,$buka,$tutup,$keterangan);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/souvenir');
	            } 

	}



	function hapus_souvenir(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_souvenir->hapus_souvenir($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/souvenir');
	}



}