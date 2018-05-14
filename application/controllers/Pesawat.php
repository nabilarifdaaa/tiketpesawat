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
		@$idAsal = $_POST['cari_asal'];
		@$idTujuan = $_POST['cari_tujuan'];
		if(isset($idAsal) && isset($idTujuan)){
			$this->session->set_userdata('asal', $idAsal);
			$this->session->set_userdata('tujuan', $idTujuan);	
		}
		
		//pencarian
		$data['result3'] = $this->PesawatModel->getPesawat3();
		if(isset($_POST['cari_asal']))
		{
			$data['pencarian_kota']=$this->session->userdata('asal');;
		}
		else{
			$data['pencarian_kota']='';
		}

		if(isset($_POST['cari_tujuan']))
		{
			$data['pencarian_tujuan'] = $this->session->userdata('tujuan');;
		}
		else{
			$data['pencarian_tujuan']='';
		}
		$data['result1'] = $this->PesawatModel->getPesawat($this->session->userdata('asal'));
		$data['result2'] = $this->PesawatModel->getPesawat2($this->session->userdata('tujuan'));
		
		// echo "<pre>";
		// print_r($data);die();

		$limit_per_page = 3;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->PesawatModel->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["result3"] = $this->PesawatModel->getPesawat3($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'Pesawat/caripesawat';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
				
			// Buat link pagination	
			$data["links"] = $this->pagination->create_links();
		}

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/Pencarian',$data);
		$this->load->view('Templates/Footer');
	}
}