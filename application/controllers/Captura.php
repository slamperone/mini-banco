<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captura extends CI_Controller {

 function __construct(){
   parent::__construct();
   date_default_timezone_set('America/Mexico_City');

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



 function user($queFue){
      if ($this->checaSesion()) {
        $this->load->model('sacadora');
        $this->data['roles'] = $this->sacadora->roles();
        $this->data['que'] = $queFue;
        $this->load->view('capturaUsuario', $this->data);
      }
 }

  function aspirante($queFue){
    $this->data['que'] = $queFue;
if ($this->checaSesion()) {

  $this->load->view('capturaAspirante', $this->data);
}
 }

  function curso(){
if ($this->checaSesion()) {
  $this->load->view('capturaCurso', $this->data);
}
 }

 function grupo(){
  if ($this->checaSesion()) {
  $this->load->view('capturaGrupo', $this->data);
}
 }

 function resultado($cual,$tipo){
if ($this->checaSesion()) {
   $this->load->model('sacadora');
   $this->data['datos'] = $this->sacadora->alumno($cual);
   $this->data['titulo']= 'Alumnos';
   $this->data['tipo']= $tipo;
   if ($cual == "all") {
    $this->load->view('verAlumnosRes', $this->data);
   }else{
    $this->load->view('calificaAlumno', $this->data);
}
}
 }

}