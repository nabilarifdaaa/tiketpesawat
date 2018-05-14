<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('PenumpangModel');

	}

	public function read(){
		$this->load->model('PenumpangModel');
		$data['result']=$this->PenumpangModel->GetAll();
		$this->load->view('Templates/Header');
		$this->load->view('Penumpang/read',$data);
		$this->load->view('Templates/Footer');
	} 

	public function add(){
		
		$this->load->view('Templates/Header');
		$this->load->view('Penumpang/FormAdd');
		$this->load->view('Templates/Footer');
	}

	public function do_insert(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required',
			array(
				'required' 		=> 'Pilih %s lah satu aja.'
			));

		$this->form_validation->set_rules('ktp', 'KTP', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('email', 'Email', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('nohp', 'Nohp', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		if ($this->form_validation->run() === FALSE)
	    {
	       	$this->load->view('Templates/Header');
			$this->load->view('Penumpang/FormAdd');
			$this->load->view('Templates/Footer');
	    } else {

	        $nama 			= $_POST['nama'];
	        $ktp 			= $_POST['ktp'];
			$email			= $_POST['email'];
			$nohp			= $_POST['nohp'];
			
			$data_insert	= array(
									
									'Nama'	=> $nama,
									'KTP'	=> $ktp,
									'Email'	=> $email,
									'NoHp'	=> $nohp,
							
								);
			
			$this->load->model('PenumpangModel');
			$res = $this->PenumpangModel->InsertData('penumpang', $data_insert);
			
			if($res>=1){
				$this->session->set_flashdata('pesan','Tambah Data Sukses');
				redirect('Penumpang/read');
			}else{
				echo "<h2>Insert Data Gagal</h2>";	
			}
		}
	}

	public function do_delete($id){
	  $this->load->model('PenumpangModel');
	  $where  = array('idPenumpang' => $id);
	  $res  = $this->PenumpangModel->DeleteData('penumpang',$where);
	  if($res>=1){
	   $this->session->set_flashdata('pesan','Delete Data Sukses');
	   redirect('Penumpang/read');
	   }
	 }

	 public function edit($idpenum=''){
		$p = $this->PenumpangModel->getedit($idpenum);
		$data = array(
			"IdPenumpang" 		=> $p[0]['IdPenumpang'],
			"Nama" 				=> $p[0]['Nama'],
			"KTP"				=> $p[0]['KTP'],
			"Email"				=> $p[0]['Email'],
			"NoHp" 				=> $p[0]['NoHp']
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('ktp', 'KTP', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('email', 'Email', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('nohp', 'Nohp', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->load->view('Templates/Header');
		$this->load->view('Penumpang/EditPenumpang',$data);
		$this->load->view('Templates/Footer');
	
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('Templates/Header');
			$this->load->view('Penumpang/EditPenumpang',$data);
			$this->load->view('Templates/Footer');
		} else {
			$idpenum		= $_POST['idpenum'];
			$nama 			= $_POST['nama'];
			$ktp			= $_POST['ktp'];
			$email			= $_POST['email'];
			$nohp			= $_POST['nohp'];

			$data_update 	= array(
				'Nama'			=> $nama,
				'KTP'			=> $ktp,
				'Email'			=> $email,
				'NoHp'			=> $nohp);

		$where = array('idPenumpang' => $idpenum);
		$res = $this->PenumpangModel->UpdateData('penumpang',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('Penumpang/read');
			}	
		}
	}
}