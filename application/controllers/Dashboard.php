<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

 function __construct(){
   parent::__construct();
   //date_default_timezone_set('America/Mexico_City');
 }

 function index(){

   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['datosUsuario'] = $session_data;
      $this->load->model('sacadora');
      $data['dash'] = $this->sacadora->dashboard();
     $this->load->view('dashboard', $data);
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout(){
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }

}

?>