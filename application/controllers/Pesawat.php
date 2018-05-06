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
		$ddtujuan = $this->PesawatModel->get_kotatujuan();
		$data['tujuan'] = $ddtujuan->result();

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/home',$data);
		$this->load->view('Templates/Footer');
	} 

	public function caripesawat(){
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
		$this->load->library('pagination');
		//pagination
		$jml = $this->db->get('pesawat');

		//pengaturan pagination
		 $config['base_url'] = base_url().'Pesawat/caripesawat';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '3';
		 $config['first_page'] = 'Awal';
		 $config['last_page'] = 'Akhir';
		 $config['next_page'] = '&laquo;';
		 $config['prev_page'] = '&raquo;';

		//inisialisasi config
		 $this->pagination->initialize($config);

		//buat pagination
		 $data['halaman'] = $this->pagination->create_links();
		//tamplikan data
		 $data['query'] = $this->PesawatModel->getPesawat($config['per_page']);

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/Pencarian',$data);
		$this->load->view('Templates/Footer');
	}
}