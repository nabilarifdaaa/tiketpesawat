<?php
Class Admin extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('adminModel');

    }

	public function read(){
		$data['result'] = $this->adminModel->GetAdmin();
		$this->load->view('templates/HeaderAdmin');
		$this->load->view('admin/all',$data);
        $this->load->view('templates/FooterAdmin');
	}    

	public function do_delete($id){
		$where 	= array('admin_id' => $id);
		$res 	= $this->adminModel->DeleteData('admin',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('admin/read');
			}
	}

	public function register(){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

         if($this->form_validation->run() === FALSE){
         	$this->load->view('templates/HeaderAdmin');
            $this->load->view('admin/register');
        	$this->load->view('templates/FooterAdmin');
            
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->adminModel->register($enc_password);

            // Tampilkan pesan
            $this->session->set_flashdata('user_registered', 'Tambah Admin Berhasil.');

            redirect('Admin/read');
        }

	}

	public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
           $password = md5($this->input->post('password'));
            //$password = $this->input->post('password');
            $admin_id = $this->adminModel->login($username, $password);

            if($admin_id){
                $user_data = array(
                    'admin_id' => $admin_id,
                    'username' => $username,
                    'logged_in' =>true);
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in'.$username);
                //redirect('crud');
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('admin/login');
            }       
        }
    }

     public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('admin/login');
    }

    public function dashboard(){
    	if(!$this->session->userdata('logged_in')) 
			redirect('admin/login');

		$admin_id = $this->session->userdata('admin_id');

		// Dapatkan detail dari User
		$data['user'] = $this->adminModel->get_admin_details( $admin_id );
		//print_r($data);


        $this->load->view('templates/HeaderAdmin',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates/FooterAdmin');
    }

    public function edit($admin_id=''){
    	if(!$this->session->userdata('logged_in')) 
			redirect('admin/login');

		$admin_id = $this->session->userdata('admin_id');

		// Dapatkan detail dari User
		$data['user'] = $this->adminModel->get_admin_details( $admin_id );

		$ad = $this->adminModel->getedit($admin_id);
		$data = array(
			"admin_id" 		=> $ad[0]['admin_id'],
			"nama" 			=> $ad[0]['nama'],
			"email"			=> $ad[0]['email'],
			"username"		=> $ad[0]['username'],
			"password"		=> $ad[0]['password']
		);
		
		$this->load->view('Templates/HeaderAdmin');
		$this->load->view('admin/edit',$data);
		$this->load->view('Templates/FooterAdmin');

		$this->form_validation->set_rules('nama', 'Nama', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('email', 'Email', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('username', 'usernam', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(
				'required' 		=> 'Isi %s lah, hadeeh.'
			));
	
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('Templates/HeaderAdmin');
			$this->load->view('admin/edit',$data);
			$this->load->view('Templates/FooterAdmin');
		} else {
			$admin_id		= $_POST['admin_id'];
			$nama 			= $_POST['nama'];
			$email			= $_POST['email'];
			$username		= $_POST['username'];

			$enc_password = md5($this->input->post('password'));
			

			$data_update 	= array(
				'admin_id' 	=> $admin_id,
				'nama'		=> $nama,
				'email'		=> $email,
				'username'	=> $username,
				'password'	=> $enc_password);

		$where = array('admin_id' => $admin_id);
		$res = $this->adminModel->UpdateData('admin',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('admin/logout');
			}	
		}
	}
}
?>