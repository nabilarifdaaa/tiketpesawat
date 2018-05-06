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
		// $data['pesawat'] = $this->PesawatModel->getDetail($KodePesawat);
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
			redirect('Pesawat/');
		}else{
			echo "<h2>Insert Data Gagal</h2>";	
		}
	}
}