<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captura extends CI_Controller {

 function __construct(){
   parent::__construct();

 }
   public  function checaSesion(){
  if($this->session->userdata('logged_in')){
     $this->session_data = $this->session->userdata('logged_in');
     $this->data['datosUsuario'] = $this->session_data;
     return TRUE;
   }else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function index(){
  redirect('dashboard', 'refresh');
 }

 function cliente($queFue){
      if ($this->checaSesion()) {
        $this->load->model('extractora');
        $this->data['roles'] = $this->extractora->roles();
        $this->data['que'] = $queFue;
        $this->load->view('capturaCliente', $this->data);
      }
 }

 function usuario($queFue){
      if ($this->checaSesion()) {
        $this->load->model('extractora');
        $this->data['roles'] = $this->extractora->roles();
        $this->data['que'] = $queFue;
        $this->load->view('capturaUser', $this->data);
      }
 }

 function deposito($queFue){
      if ($this->checaSesion()) {
        #aqiu debería ir el llamado a la vista que captura los depositos
        $this->data['titulo']= 'Captura deposito';
        $this->data['datos'] = array();
        $this->load->view('dashVacio', $this->data);
      }
 }

}
