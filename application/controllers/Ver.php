<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ver extends CI_Controller {

 function __construct(){
   parent::__construct();
   $this->load->model('extractora');

 }

 /**
  * [Revisa que el usuario tenha una session valida y activa]
  * @return [boolean] [Es todo es correcto, devuelve true sino redirect al login]
  */
   public  function checaSesion(){
  if($this->session->userdata('logged_in')){#tiene permiso
     $this->session_data = $this->session->userdata('logged_in');
     $this->data['datosUsuario'] = $this->session_data;
     return TRUE;
   }else{#le pide logearse
          redirect('login', 'refresh');
   }
 }
/**
 * [lo rediride al dashboard]
 * @return [nada] [nada]
 */
 function index(){
  redirect('dashboard', 'refresh');
 }


   function cliente($quien){
    if ($this->checaSesion()) {
      if (is_numeric($quien)) {
        $this->data['datos'] = $this->extractora->cliente($quien);
        $this->data['titulo']= 'Detalle del cliente';
        $this->load->view('verClientes', $this->data);
      }else if ($quien == 'all'){
        $this->data['datos'] = $this->extractora->clientes();
        $this->data['titulo']= 'Nuestros clientes';
        $this->load->view('verClientes', $this->data);
      }else{
        show_404();
      }

    }
}


  function usuarios(){
    if ($this->checaSesion()) {

    $this->data['users'] = $this->extractora->usuarios();
    $this->data['titulo']= 'Colaboradores de Bancotote';
    $this->load->view('verUsuarios', $this->data);
    }
}


}#cierra la clase
