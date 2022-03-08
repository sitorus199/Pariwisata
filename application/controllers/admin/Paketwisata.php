<?php
class Paketwisata extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_paketwisata');
		$this->load->library('upload');
	}

	function index(){
		$x['data']=$this->m_paketwisata->get_all_paketwisata();
		$this->load->view('admin/v_paketwisata',$x);
	}

	function simpan_paketwisata(){
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
	                        $transportasi=strip_tags($this->input->post('xtransportasi'));
	                        $akomodasi=strip_tags($this->input->post('xakomodasi'));
	                        $destinasi=strip_tags($this->input->post('xdestinasi'));
	                        $durasi=strip_tags($this->input->post('xdurasi'));
							$deskripsi=$this->input->post('xdeskripsi');
							$lokasi=strip_tags($this->input->post('xlokasi'));
							$harga=strip_tags($this->input->post('xharga'));
							$fasilitas=strip_tags($this->input->post('xfasilitas'));
							$date=strip_tags($this->input->post('xdate'));

							$this->m_paketwisata->simpan_paketwisata($judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$photo,$date);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/paketwisata');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/paketwisata');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('xjudul'));
	                $transportasi=strip_tags($this->input->post('xtransportasi'));
	                $akomodasi=strip_tags($this->input->post('xakomodasi'));
	                $destinasi=strip_tags($this->input->post('xdestinasi'));
	                $durasi=strip_tags($this->input->post('xdurasi'));
	                $deskripsi=$this->input->post('xdeskripsi');
	                $lokasi=strip_tags($this->input->post('xlokasi'));
	                $harga=strip_tags($this->input->post('xharga'));
	                $fasilitas=strip_tags($this->input->post('xfasilitas'));
	                $date=strip_tags($this->input->post('xdate'));

					$this->m_paketwisata->simpan_paketwisata_tanpa_img($judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$date);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/paketwisata');
				}
				
	}
	function update_paketwisata(){
				
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
	                        $transportasi=strip_tags($this->input->post('xtransportasi'));
	                        $akomodasi=strip_tags($this->input->post('xakomodasi'));
	                        $destinasi=strip_tags($this->input->post('xdestinasi'));
	                        $durasi=strip_tags($this->input->post('xdurasi'));
							$deskripsi=$this->input->post('xdeskripsi');
							$lokasi=strip_tags($this->input->post('xlokasi'));
							$harga=strip_tags($this->input->post('xharga'));
							$fasilitas=strip_tags($this->input->post('xfasilitas'));
							$date=strip_tags($this->input->post('xdate'));

							$this->m_paketwisata->update_paketwisata($kode,$judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$photo,$date);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/paketwisata');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/paketwisata');
	                }
	                
	            }else{
					$kode=$this->input->post('kode');
					$judul=strip_tags($this->input->post('xjudul'));
	                $transportasi=strip_tags($this->input->post('xtransportasi'));
	                $akomodasi=strip_tags($this->input->post('xakomodasi'));
	                $destinasi=strip_tags($this->input->post('xdestinasi'));
	                $durasi=strip_tags($this->input->post('xdurasi'));
	                $deskripsi=$this->input->post('xdeskripsi');
	                $lokasi=strip_tags($this->input->post('xlokasi'));
	                $harga=strip_tags($this->input->post('xharga'));
	                $fasilitas=strip_tags($this->input->post('xfasilitas'));
	                $date=strip_tags($this->input->post('xdate'));

					$this->m_paketwisata->update_paketwisata_tanpa_img($kode,$judul,$transportasi,$akomodasi,$destinasi,$durasi,$deskripsi,$lokasi,$harga,$fasilitas,$date);
					echo $this->session->set_flashdata('msg','info');
					redirect('admin/paketwisata');
	            } 

	}

	function hapus_paketwisata(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_paketwisata->hapus_paketwisata($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/paketwisata');
	}

}