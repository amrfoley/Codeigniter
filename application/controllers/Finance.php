<?php
class Finance extends CI_Controller{

  protected $page_id = 2;

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

    if($this->session->userdata('level') == "3"){
      die("Access Denied");
    }
    $this->load->model('page_model');
  }

  function index(){
    $data['page_name']= 'finance';
    $data['mode'] = 'view';
    $data['page_id'] = $this->page_id;
    $data['page_content'] = $this->page_model->get_page($this->page_id); 
    $this->load->view('page_view', $data);
  }

  function edit($id) {
    if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4") {
      $data['mode'] = 'edit';
      $data['page_name']= 'finance';
      $data['page_id'] = $this->page_id;
      $data['page_content'] = $this->page_model->get_page($this->page_id);   
      $this->load->view('page_view', $data);
    } else {
      echo "Access denied";
    }
  }

  function update() {
    if($this->session->userdata('level') != "1" && $this->session->userdata('level') != "4") {
      die("Access Denied");
    }
    $title    = $this->input->post('title',TRUE);
    $content  = $this->input->post('content',TRUE);
    $id       = $this->input->post('id',TRUE);
    $status = $this->page_model->update([
      'title' => $title,
      'content' => $content
    ], $id);
    if($status) {
      echo $this->session->set_flashdata('msg_succ','Page Updated');      
    } else {
      echo $this->session->set_flashdata('msg_failed','Page Updated');
    }    

    redirect('/finance');
  }

}
