<?php
class Kuliner extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kuliner');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_kuliner->get_all_kuliner();
		$this->load->view('admin/v_kuliner',$x);
	}

	function simpan_kuliner(){
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
							$harga=strip_tags($this->input->post('xharga'));

							$this->m_kuliner->simpan_kuliner($judul,$keterangan,$harga,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/kuliner');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/kuliner');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('xjudul'));
					$keterangan=$this->input->post('xketerangan');
					$harga=strip_tags($this->input->post('xharga'));

					$this->m_kuliner->simpan_kuliner_tanpa_img($judul,$keterangan,$harga);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/kuliner');
				}
				
	}

	function update_kuliner(){
				
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
							$harga=strip_tags($this->input->post('xharga'));

							$this->m_kuliner->update_kuliner($kode,$judul,$keterangan,$harga,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/kuliner');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/kuliner');
	                }
	                
	            }else{
					$kode=$this->input->post('kode');
					$judul=strip_tags($this->input->post('xjudul'));
					$keterangan=$this->input->post('xketerangan');
					$harga=strip_tags($this->input->post('xharga'));

					$this->m_kuliner->update_kuliner_tanpa_img($kode,$judul,$keterangan,$harga);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/kuliner');
	            } 

	}



	function hapus_kuliner(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_kuliner->hapus_kuliner($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/kuliner');
	}



}