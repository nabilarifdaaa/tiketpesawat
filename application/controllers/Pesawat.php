<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat extends CI_Controller {
	public function index(){
		$this->load->model('PesawatModel');
		$ddkota = $this->PesawatModel->get_kota();
		$data['kota'] = $ddkota->result();
		//dropdown kota asal
		$ddtujuan = $this->PesawatModel->get_kotatujuan();
		$data['tujuan'] = $ddtujuan->result();

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/home',$data);
		$this->load->view('Templates/Footer');
	} 

	public function caripesawat(){
		$this->load->model('PesawatModel');
		
		//tampil data pesawat
		$data['result'] = $this->PesawatModel->getPesawat();
		//pencarian
		if(isset($_POST['cari_asal']))
		{
			$data['pencarian_kota']=$_POST['cari_asal'];
		}
		else{
			$data['pencarian_kota']='';
		}

		if(isset($_POST['cari_tujuan']))
		{
			$data['pencarian_tujuan']=$_POST['cari_tujuan'];
		}
		else{
			$data['pencarian_tujuan']='';
		}

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/Pencarian',$data);
		$this->load->view('Templates/Footer');
	}
}