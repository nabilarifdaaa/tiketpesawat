<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller {
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

	public function do_delete($id){
	  $this->load->model('PenumpangModel');
	  $where  = array('idPenumpang' => $id);
	  $res  = $this->PenumpangModel->DeleteData('penumpang',$where);
	  if($res>=1){
	   $this->session->set_flashdata('pesan','Delete Data Sukses');
	   redirect('Penumpang/read');
	   }
	 }

	 
}