<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('kotaModel');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}

	// List all your items
	public function index()
	{
		$data['kota'] = $this->kotaModel->get_kota('kota');
		$this->load->view('Templates/HeaderAdmin');
		$this->load->view('Kota/all', $data);
		$this->load->view('Templates/FooterAdmin');
	}

	function tambah(){
		$this->load->view('Templates/HeaderAdmin');
		$this->load->view('Kota/add');
		$this->load->view('Templates/FooterAdmin');
	}
	// Add a new item
	public function add()
	{
		
		$data = array(
			'NamaKota' => $this->input->post('nama'),
			'Bandara' => $this->input->post('bandara')
		);
		$this->kotaModel->set_data($data, 0);
		redirect('kota','refresh');
	}

	//Update one item
	public function update( $id = NULL )
	{
		$this->form_validation->set_rules('nama', 'Nama Kota', 'required');
		$this->form_validation->set_rules('bandara', 'Nama Bandara', 'required');
		// run validation
		if ($this->form_validation->run() == FALSE) {
			$data['kota'] = $this->kotaModel->get_single('kota', $id);
			$this->load->view('Templates/HeaderAdmin');
			$this->load->view('kota/editbaru', $data, FALSE);
			$this->load->view('Templates/FooterAdmin');		
		} else {
			$data = array(
			'NamaKota' => $this->input->post('nama'),
			'Bandara' => $this->input->post('bandara')
			);
			
			$this->kotaModel->set_data($data, $id);
			redirect('kota','refresh');
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->kotaModel->delete($id);
		redirect('kota','refresh');
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
