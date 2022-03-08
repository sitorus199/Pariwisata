<?php
class Destinasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_destinasi');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_destinasi->get_all_destinasi();
		$this->load->view('admin/v_destinasi',$x);
	}

	function simpan_destinasi(){
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
							$fasilitas=strip_tags($this->input->post('xfasilitas'));

							$this->m_destinasi->simpan_destinasi($judul,$deskripsi,$alamat,$harga,$stock,$photo,$fasilitas);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/destinasi');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/destinasi');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('xjudul'));
					$deskripsi=$this->input->post('xdeskripsi');
					$alamat=strip_tags($this->input->post('xalamat'));
					$harga=strip_tags($this->input->post('xharga'));
					$stock=strip_tags($this->input->post('xstock'));
					$fasilitas=strip_tags($this->input->post('xfasilitas'));

					$this->m_destinasi->simpan_destinasi_tanpa_img($judul,$deskripsi,$alamat,$harga,$stock,$fasilitas);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/destinasi');
				}
				
	}

	function update_destinasi(){
				
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
							$fasilitas=strip_tags($this->input->post('xfasilitas'));

							$this->m_destinasi->update_destinasi($kode,$judul,$deskripsi,$alamat,$harga,$stock,$photo,$fasilitas);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/destinasi');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/destinasi');
	                }
	                
	            }else{
					$kode=$this->input->post('kode');
					$judul=strip_tags($this->input->post('xjudul'));
					$deskripsi=$this->input->post('xdeskripsi');
					$alamat=strip_tags($this->input->post('xalamat'));
					$harga=strip_tags($this->input->post('xharga'));
					$stock=strip_tags($this->input->post('xstock'));
					$fasilitas=strip_tags($this->input->post('xfasilitas'));

					$this->m_destinasi->update_destinasi_tanpa_img($kode,$judul,$deskripsi,$alamat,$harga,$stock,$fasilitas);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/destinasi');
	            } 

	}



	function hapus_destinasi(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_destinasi->hapus_destinasi($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/destinasi');
	} 


}