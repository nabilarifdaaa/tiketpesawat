<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller {

	public function pilih($KodePesawat=""){
		$this->load->model('PesawatModel');
		$pesawat = $this->PesawatModel->getDetail($KodePesawat);
		$data = array(
			"KodePesawat" 	=> $pesawat[0]['KodePesawat'],
			"Harga" 		=> $pesawat[0]['Harga']
		);
		$data['pesawat'] = $this->PesawatModel->getDetail($KodePesawat);
		$this->load->view('Templates/Header');
		$this->load->view('Penumpang/FormAdd',$data);
		$this->load->view('Templates/Footer');
	}

	public function do_insert(){
        $KodePesawat 	= $_POST['kode'];
        $nama 			= $_POST['nama'];
        $ktp 			= $_POST['ktp'];
		$email			= $_POST['email'];
		$nohp			= $_POST['nohp'];
		$tgl 			= date("Y-m-d");
		$jumtik			= $_POST['jumtik'];
		$duduk 			= $_POST['duduk'];
		$total 			= $_POST['total'];
		
		$data_insert	= array(
								'KodePesawat' 	=> $KodePesawat,
								'Nama'	=> $nama,
								'KTP'	=> $ktp,
								'Email'	=> $email,
								'NoHp'	=> $nohp,
								'Tanggal'	=> $tgl,
								'JumlahTiket'	=> $jumtik,
								'TempatDuduk'	=> $duduk,
								'TotalHarga'	=> $total
							);
		
		$this->load->model('PenumpangModel');
		$res = $this->PenumpangModel->InsertData('penumpang', $data_insert);
		
		if($res>=1){
			$this->session->set_flashdata('pesan','Tambah Data Sukses');
			redirect('penumpang/data_penumpang','refresh');
		}else{
			echo "<h2>Insert Data Gagal</h2>";	
		}
	}
	public function data_penumpang(){
		$this->load->model('PenumpangModel');
		$data['penumpang'] = $this->PenumpangModel->getPenumpangRecent();
		$this->load->view('Templates/header');
		$this->load->view('Penumpang/formView', $data);
		$this->load->view('Templates/footer');
	}

	public function edit(){

		$KodeBook = $this->uri->segment(3);
		$data['show_article'] = $this->Artikel->get_article_by_id($id);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('penumpang/header');
			$this->load->view('penumpang/edit',$data);
			$this->load->view('penumpang/footer');
		} else {
				$data['input'] = array(
					'KodeBook' => $this->input->post('KodeBook'),
					'KodePesawat' => $this->input->post('KodePesawat'),
					'Nama' => $this->input->post('Nama'),
					'KTP' => $this->input->post('KTP'),
					'Email' => $this->input->post('Email'),
					'Nohp' => $this->input->post('Nohp'),
					'JumlahTiket' => $this->input->post('JumlahTiket'),
					'TempatDuduk' => $this->input->post('TempatDuduk'),
					'Totalharga' => $this->input->post('Totalharga')
				);
				$this->Artikel->set_article($id,$data['input']);
				redirect('Penumpang');
			}
		}	
	}
	public function delete(){
		$KodeBook = $this->uri->segment(3);
		$this->Artikel->delete_article($id);
		redirect('Penumpang','refresh');
	}
}