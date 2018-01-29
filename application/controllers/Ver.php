<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ver extends CI_Controller {

 function __construct(){
   parent::__construct();
   date_default_timezone_set('America/Mexico_City');
   $this->load->model('sacadora');

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

   function saldo($quien){
if ($this->checaSesion()) {
    if ($quien == 'all' || $quien == NULL) {

    $this->data['users']=$this->sacadora->usuarios(3);
    $this->data['titulo']= 'Clientes registrados';
    $this->load->view('verAlumnos', $this->data);

    }else{
      $this->data['datos'] = $this->sacadora->saldo($quien);
  $this->data['titulo']= 'Detalle de Saldo';
  $this->load->view('dashVacio', $this->data);
    }
}
 }

    function movimientos($quien){
if ($this->checaSesion()) {
  $this->data['datos'] = $this->sacadora->movimientos($quien);
  $this->data['titulo']= 'Detalle de Movimientos';
  $this->load->view('dashVacio', $this->data);
}
 }

    function cuentas($quien){
if ($this->checaSesion()) {
  $this->data['datos'] = $this->sacadora->cuentas($quien);
  $this->data['titulo']= 'Detalle de cuentas';
  $this->load->view('dashVacio', $this->data);
}
 }


}#cierra la clase