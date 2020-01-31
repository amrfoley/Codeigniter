<?php
class Users extends CI_Controller{

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

    if($this->session->userdata('level') == "3" || $this->session->userdata('level') == "4"){
        die("Access Denied");
    }

    $this->load->model('users_model');
  }

  function index(){
    $data['users_data'] = $this->users_model->view_users();
    $data['mode'] = 'view';
    $this->load->view('users_view', $data);
  }

  function edit($user_id) {
    if($this->session->userdata('level') != "2") {
        die("Access Denied");
    }

    $data['users_data'] = $this->users_model->show_user($user_id);
    $data['mode'] = 'edit';
    $this->load->view('users_view', $data);
  }

  function update() {
    if($this->session->userdata('level') != "2") {
        die("Access Denied");
    }
    $id    = $this->input->post('id',TRUE);
    $name    = $this->input->post('name',TRUE);
    $email    = $this->input->post('email',TRUE);
    $level    = $this->input->post('level',TRUE);
    $status = $this->users_model->update_users([
        'name' => $name,
        'email' => $email,
        'level' => $level
    ], $id);
    if($status) {
        echo "user updated successfully";
    } else {
        die("Something went wrong");
    }
  }

  function adding() {
    if($this->session->userdata('level') != "2") {
        die("Access Denied");
    }
    $name    = $this->input->post('name',TRUE);
    $email    = $this->input->post('email',TRUE);
    $password    = md5($this->input->post('password',TRUE));
    $password2    = md5($this->input->post('password2',TRUE));
    $level    = $this->input->post('level',TRUE);

    if ($password != $password2) {
      echo $this->session->set_flashdata('msg','Password does not match');
      redirect('/users/add');
    }

    $check_user = $this->users_model->show_user(NULL, $email);

    if($check_user->num_rows() > 0){
      echo $this->session->set_flashdata('msg','Email already exists.');
      redirect('/users/add'); 
    }
    
    if($name && $email && $level && $password == $password2 && $check_user->num_rows() == 0) {
      $status = $this->users_model->add_users([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'level' => $level
      ]);
      if($status) {
        echo "User added successfully";
      } else {
          die("Something went wrong");
      }
    }
  }

  function add() {
    if($this->session->userdata('level') != "2") {
        die("Access Denied");
    }

    $data['mode'] = 'add';
    $this->load->view('users_view', $data);
  }
}
