<?php
Class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('userModel');
    }

    public function dashboard(){
        if(!$this->session->userdata('logged_in')) 
            redirect('user/login');

        $IdPenumpang = $this->session->userdata('IdPenumpang');

        // Dapatkan detail dari User
        $data['user'] = $this->userModel->get_user_details( $IdPenumpang );
        $data['history'] = $this->userModel->get_book_details( $IdPenumpang );
        print_r($data['history']);
        $this->load->view('templates/header');
        $this->load->view('users/dashboard',$data);
        $this->load->view('templates/footer');
    }    

    public function register(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

         if($this->form_validation->run() === FALSE){
            $this->load->view('templates/headerlogin');
            $this->load->view('users/register');
            $this->load->view('templates/footerlogin');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->userModel->register($enc_password);

            // Tampilkan pesan
            $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

            redirect('user/login');
        }

	}

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/headerlogin');
            $this->load->view('users/login');
            $this->load->view('templates/footerlogin');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $IdPenumpang = $this->userModel->login($username, $password);

            if($IdPenumpang){
                $user_data = array(
                    'IdPenumpang' => $IdPenumpang,
                    'username' => $username,
                    'logged_in' =>true);
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in'.$username);
                //redirect('crud');
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('user/login');
            }       
        }
    }

    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('IdPenumpang');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('user/login');
    }

    public function edit($IdPenumpang=''){
        if(!$this->session->userdata('logged_in')) 
            redirect('user/login');

        $IdPenumpang = $this->session->userdata('IdPenumpang');

        // Dapatkan detail dari User
        $data['user'] = $this->userModel->get_user_details( $IdPenumpang );

        $ad = $this->userModel->getedit($IdPenumpang);
        $data = array(
            "IdPenumpang"   => $ad[0]['IdPenumpang'],
            "Nama"          => $ad[0]['Nama'],
            "KTP"           => $ad[0]['KTP'],
            "Email"         => $ad[0]['Email'],
            "NoHp"          => $ad[0]['NoHp'],
            "fk_level_id"   => $ad[0]['fk_level_id'],
            "username"      => $ad[0]['username'],
            "password"      => $ad[0]['password']
        );
        
        $this->load->view('Templates/Header');
        $this->load->view('users/editprofil',$data);
        $this->load->view('Templates/Footer');

        $this->form_validation->set_rules('username', 'usernam', 'required',
            array(
                'required'      => 'Isi %s lah, hadeeh.'
            ));
        $this->form_validation->set_rules('password', 'Password', 'required',
            array(
                'required'      => 'Isi %s lah, hadeeh.'
            ));
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Templates/Header');
            $this->load->view('users/editprofil',$data);
            $this->load->view('Templates/Footer');
        } else {
            $IdPenumpang    = $_POST['IdPenumpang'];
            $Nama           = $_POST['Nama'];
            $KTP           = $_POST['KTP'];
            $Email          = $_POST['Email'];
            $NoHp           = $_POST['NoHp'];
            $username       = $_POST['username'];
            $enc_password = md5($this->input->post('password'));
            

            $data_update    = array(
                'IdPenumpang'  => $IdPenumpang,
                'Nama'      => $Nama,
                'KTP'       => $KTP,
                'Email'     => $Email,
                'NoHp'      => $NoHp,
                'username'  => $username,
                'password'  => $enc_password);

        $where = array('IdPenumpang' => $IdPenumpang);
        $res = $this->userModel->UpdateData('penumpang',$data_update,$where);
            if($res>=1){
                $this->session->set_flashdata('pesan','Update Data Sukses');
                redirect('user/logout');
            }   
        }
    }    

}
?>