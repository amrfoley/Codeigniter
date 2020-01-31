<?php
class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    function index(){
        $this->load->view('login_view');
    }

    function auth(){
        $email    = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->login_model->validate($email,$password);
        if($validate->num_rows() > 0) {
            $data = $validate->result();
            $name = $data[0]->name;
            $email = $data[0]->email;
            $level = $data[0]->level;
            $sesdata = array(
                'username'  => $name,
                'email'     => $email,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            redirect('dashboard');
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
