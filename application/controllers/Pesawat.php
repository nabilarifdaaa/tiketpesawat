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

	public function read(){
		$data['result'] = $this->PesawatModel->getall();
		

		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/read',$data);
		$this->load->view('Templates/Footer');
	}

	public function deletePesawat($id) {
		$this->PesawatModel->deletePesawat($id);

		redirect('pesawat/read');
	}

	public function editPesawat($id) {
		$data['result'] = $this->PesawatModel->getPesawat4($id);
		
		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/update',$data);
		$this->load->view('Templates/Footer');
	}

	public function addPesawat() {
		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/add');
		$this->load->view('Templates/Footer');
	}

	public function doAdd() {
		$inputKodePesawat = $_POST['inputKodePesawat'];
		$inputMaskapai = $_POST['inputMaskapai'];
		$inputBoarding = $_POST['inputBoarding'];
		$inputLanding = $_POST['inputLanding'];
		$inputKotaAsal = $_POST['inputKotaAsal'];
		$inputKotaTujuan = $_POST['inputKotaTujuan'];
		$inputKelas = $_POST['inputKelas'];
		$inputHarga = $_POST['inputHarga'];

		if($_FILES['inputFoto']['name'] != '') {

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["inputFoto"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["inputFoto"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["inputFoto"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["inputFoto"]["tmp_name"], $target_file)) {
			    	$foto = $_FILES["inputFoto"]["name"];

			    	$data = array(
			    		'KodePesawat' => $inputKodePesawat,
			    		'Maskapai' => $inputMaskapai,
			    		'Boarding' => $inputBoarding,
			    		'Landing' => $inputLanding,
			    		'FK_IdAsal' => $inputKotaAsal,
			    		'FK_IdTujuan' => $inputKotaTujuan,
			    		'Kelas' => $inputKelas,
			    		'Harga' => $inputHarga,
			    		'LogoPesawat' => $foto
			    	);

			    	$this->PesawatModel->addPesawat($data);

			        echo "The file ". basename( $_FILES["inputFoto"]["name"]). " has been uploaded.";

			        redirect('pesawat/read');
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		} else {
			$data = array(
	    		'KodePesawat' => $inputKodePesawat,
	    		'Maskapai' => $inputMaskapai,
	    		'Boarding' => $inputBoarding,
	    		'Landing' => $inputLanding,
	    		'FK_IdAsal' => $inputKotaAsal,
	    		'FK_IdTujuan' => $inputKotaTujuan,
	    		'Kelas' => $inputKelas,
	    		'Harga' => $inputHarga
	    	);

	    	$this->PesawatModel->addPesawat($data);

	        redirect('pesawat/read');
		}
	}

	public function doEdit() {
		$inputKodePesawat = $_POST['inputKodePesawat'];
		$inputMaskapai = $_POST['inputMaskapai'];
		$inputBoarding = $_POST['inputBoarding'];
		$inputLanding = $_POST['inputLanding'];
		$inputKotaAsal = $_POST['inputKotaAsal'];
		$inputKotaTujuan = $_POST['inputKotaTujuan'];
		$inputKelas = $_POST['inputKelas'];
		$inputHarga = $_POST['inputHarga'];

		if($_FILES['inputFoto']['name'] != '') {

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["inputFoto"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["inputFoto"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["inputFoto"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["inputFoto"]["tmp_name"], $target_file)) {
			    	$foto = $_FILES["inputFoto"]["name"];

			    	$data = array(
			    		'KodePesawat' => $inputKodePesawat,
			    		'Maskapai' => $inputMaskapai,
			    		'Boarding' => $inputBoarding,
			    		'Landing' => $inputLanding,
			    		'FK_IdAsal' => $inputKotaAsal,
			    		'FK_IdTujuan' => $inputKotaTujuan,
			    		'Kelas' => $inputKelas,
			    		'Harga' => $inputHarga,
			    		'LogoPesawat' => $foto
			    	);

			    	$this->PesawatModel->updatePesawat($data, $inputKodePesawat);

			        echo "The file ". basename( $_FILES["inputFoto"]["name"]). " has been uploaded.";

			        redirect('pesawat/read');
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		} else {
			$data = array(
	    		'KodePesawat' => $inputKodePesawat,
	    		'Maskapai' => $inputMaskapai,
	    		'Boarding' => $inputBoarding,
	    		'Landing' => $inputLanding,
	    		'FK_IdAsal' => $inputKotaAsal,
	    		'FK_IdTujuan' => $inputKotaTujuan,
	    		'Kelas' => $inputKelas,
	    		'Harga' => $inputHarga
	    	);

	    	$this->PesawatModel->updatePesawat($data, $inputKodePesawat);

	        redirect('pesawat/read');
		}
	}
}