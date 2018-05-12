<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('PesawatModel');
	}

	public function index(){
		$ddkota = $this->PesawatModel->get_kota();
		$data['kota'] = $ddkota->result();
		//dropdown kota asal
		$ddtujuan = $this->PesawatModel->get_kota();
		$data['tujuan'] = $ddtujuan->result();

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/home',$data);
		$this->load->view('Templates/Footer');
	} 

	public function caripesawat(){
		//tampil data pesawat
		// $data['result2'] = $this->PesawatModel->getPesawat2();
		$idAsal = $_POST['cari_asal'];
		$idTujuan = $_POST['cari_tujuan'];
		//pencarian
		$data['result3'] = $this->PesawatModel->getPesawat3();
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
		$data['result1'] = $this->PesawatModel->getPesawat($idAsal);
		$data['result2'] = $this->PesawatModel->getPesawat2($idTujuan);
		
		// echo "<pre>";
		// print_r($data);die();

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/DataTabel',$data);
		$this->load->view('Templates/Footer');
	}
}