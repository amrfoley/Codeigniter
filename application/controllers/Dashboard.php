<?php
class Dashboard extends CI_Controller{

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

    $this->load->model('page_model');
  }

  function index(){
    $data['page_content'] = $this->page_model->get_page(1); 
    $this->load->view('dashboard_view', $data);
  }

}
