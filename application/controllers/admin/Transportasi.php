<?php
class Transportasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_transportasi'); 
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_transportasi->get_all_transportasi();
		$this->load->view('admin/v_transportasi',$x);
	}

	function simpan_transportasi(){
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
							$deskripsi=$this->input->post('xdeskripsi');
							$alamat=strip_tags($this->input->post('xalamat'));
							$harga=strip_tags($this->input->post('xharga'));
							$stock=strip_tags($this->input->post('xstock'));

							$this->m_transportasi->simpan_transportasi($judul,$alamat,$deskripsi,$harga,$stock,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/transportasi');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/transportasi');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('xjudul'));
					$deskripsi=$this->input->post('xdeskripsi');
					$alamat=strip_tags($this->input->post('xalamat'));
					$harga=strip_tags($this->input->post('xharga'));
					$stock=strip_tags($this->input->post('xstock'));

					$this->m_transportasi->simpan_transportasi_tanpa_img($judul,$alamat,$deskripsi,$harga,$stock);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/transportasi');
				}
				
	}

	function update_transportasi(){
				
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
							$deskripsi=$this->input->post('xdeskripsi');
							$alamat=strip_tags($this->input->post('xalamat'));
							$harga=strip_tags($this->input->post('xharga'));
							$stock=strip_tags($this->input->post('xstock'));

							$this->m_transportasi->update_transportasi($kode,$judul,$alamat,$deskripsi,$harga,$stock,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/transportasi');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/transportasi');
	                }
	                
	            }else{
					$kode=$this->input->post('kode');
					$judul=strip_tags($this->input->post('xjudul'));
					$deskripsi=$this->input->post('xdeskripsi');
					$alamat=strip_tags($this->input->post('xalamat'));
					$harga=strip_tags($this->input->post('xharga'));
					$stock=strip_tags($this->input->post('xstock'));

					$this->m_transportasi->update_transportasi_tanpa_img($kode,$judul,$alamat,$deskripsi,$harga,$stock);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/transportasi');
	            } 

	}



	function hapus_transportasi(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_transportasi->hapus_transportasi($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/transportasi');
	}


}