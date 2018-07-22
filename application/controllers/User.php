<?php
Class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('userModel');
    }

    public function register(){
        $this->form_validation->set_rules('username', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

         if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('user/register');
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->userModel->register($enc_password);

            // Tampilkan pesan
            $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

            redirect('pesawat/');
        }

	}

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $user_id = $this->userModel->login($username, $password);

            if($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' =>true);
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in'.$username);
                //redirect('crud');
                redirect('user/yes');
            } else {
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('user/register');
            }       
        }
    }

    public function yes(){
        $this->load->view('user/masuk');
    }

    public function admin(){
        $this->load->view('templates/HeaderAdmin');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/FooterAdmin');
    }

    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('user/login');
    }

}
?>