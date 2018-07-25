<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('PenumpangModel');
		$this->load->model('PesawatModel');
		$this->load->model('BookingModel');
	}

	public function pilih($KodePesawat=""){

		$pesawat = $this->PesawatModel->getDetail($KodePesawat);
		$data = array(
			"KodePesawat" 	=> $pesawat[0]['KodePesawat'],
			"Harga" 		=> $pesawat[0]['Harga']
		);
		//dropdown nama
		$name = $this->PenumpangModel->getNama();
		$data['penum'] = $name->result();
		// $data['pesawat'] = $this->PesawatModel->getDetail($KodePesawat);
		$this->load->view('Templates/Header');
		$this->load->view('Booking/AddBooking',$data);
		$this->load->view('Templates/Footer');
	}

	public function do_insert(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required',
			array(
				'required' 		=> 'Pilih %s lah satu aja.'
			));

		$this->form_validation->set_rules('tgl', 'Tgl', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		if ($this->form_validation->run() === FALSE)
	    {
	       	$this->load->view('Templates/Header');
			$this->load->view('Booking/AddBooking',$data);
			$this->load->view('Templates/Footer');
	    } else {
	    	$KodePesawat 	= $_POST['kode'];
	        $nama 			= $_POST['nama'];
			$tgl 			= date("Y-m-d");
			$jumtik			= $_POST['jumtik'];
			$total 			= $_POST['total'];
			
			$data_insert	= array(
									'FK_KodePesawat' 	=> $KodePesawat,
									'FK_IdPenumpang'	=> $nama,
									'TanggalBook'	=> $tgl,
									'JumlahTiket'	=> $jumtik,
									'TotalHarga'	=> $total
								);
			$res = $this->BookingModel->InsertData('booking', $data_insert);
			
			if($res>=1){
				$this->session->set_flashdata('pesan','Tambah Data Sukses');
				redirect('Booking/read');
			}else{
				echo "<h2>Insert Data Gagal</h2>";	
			}
		}
	}

	public function read(){
		$data['result'] = $this->BookingModel->GetBooking();
		$this->load->view('Templates/HeaderAdmin');
		$this->load->view('Booking/All',$data);
		$this->load->view('Templates/FooterAdmin');
	}

	public function preview($id=''){
		$data['result'] = $this->BookingModel->GetPreview($id);
		$this->load->view('Templates/Header');
		$this->load->view('Booking/preview',$data);
		$this->load->view('Templates/Footer');
	}

	public function edit($idbook=''){
		$book = $this->BookingModel->getedit($idbook);
		$data = array(
			"IdBooking" 		=> $book[0]['IdBooking'],
			"FK_IdPenumpang" 	=> $book[0]['FK_IdPenumpang'],
			"FK_KodePesawat"	=> $book[0]['FK_KodePesawat'],
			"TanggalBook"		=> $book[0]['TanggalBook'],
			"JumlahTiket" 		=> $book[0]['JumlahTiket'],
			"TotalHarga"		=> $book[0]['TotalHarga']
		);
		$this->form_validation->set_rules('tgl', 'Tgl', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->load->view('Templates/Header');
		$this->load->view('Booking/EditBooking',$data);
		$this->load->view('Templates/Footer');
	
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('Templates/Header');
			$this->load->view('Booking/EditBooking',$data);
			$this->load->view('Templates/Footer');
		} else {
			$idbook			= $_POST['idbook'];
			$kode 			= $_POST['kode'];
			$idpenumpang	= $_POST['idpenumpang'];
			$jumtik			= $_POST['jumtik'];
			$total			= $_POST['total'];
			$tgl			= $_POST['tgl'];

			$data_update 	= array(
				'IdBooking' 	=> $idbook,
				'FK_KodePesawat'=> $kode,
				'FK_IdPenumpang'=> $idpenumpang,
				'JumlahTiket'	=> $jumtik,
				'TotalHarga'	=> $total,
				'TanggalBook'	=> $tgl);

		$where = array('IdBooking' => $idbook);
		$res = $this->BookingModel->UpdateData('booking',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('Booking/read');
			}	
		}
	}

	public function do_update(){
		$idbook			= $_POST['idbook'];
		$kode 			= $_POST['kode'];
		$idpenumpang	= $_POST['idpenumpang'];
		$jumtik			= $_POST['jumtik'];
		$total			= $_POST['total'];
		$tgl			= $_POST['tgl'];

		$data_update 	= array(
			'IdBooking' 	=> $idbook,
			'FK_KodePesawat'=> $kode,
			'FK_IdPenumpang'=> $idpenumpang,
			'JumlahTiket'	=> $jumtik,
			'TotalHarga'	=> $total,
			'TanggalBook'	=> $tgl);

		$where = array('IdBooking' => $idbook);
		$res = $this->BookingModel->UpdateData('booking',$data_update,$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Update Data Sukses');
			redirect('Booking/read');
		}
	}

	public function do_delete($id){
		$where 	= array('IdBooking' => $id);
		$res 	= $this->BookingModel->DeleteData('booking',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('Booking/read');
			}
	}

}