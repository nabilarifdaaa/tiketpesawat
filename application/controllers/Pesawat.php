<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat extends CI_Controller {
	public function index(){
		
		$this->load->view('Templates/Header');
		$this->load->view('Pesawat/home');
		$this->load->view('Templates/Footer');
	} 
}