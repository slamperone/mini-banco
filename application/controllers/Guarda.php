<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guarda extends CI_Controller {

function __construct(){
   parent::__construct();
   date_default_timezone_set('America/Mexico_City');
   $this->load->model('guardadora');
   $this->load->model('archivadora');
 }

  function index(){
  redirect('dashboard', 'refresh');
 }

/**
 * [Prepara info para gaurdar y recibe respuesta del modelo ]
 * @return [string] [codigo de resultado error o ok]
 */
 function user(){
      #defino el catalogo de variables

		 	$data['nombres'] = $this->input->post('nombres');
		 	$data['apellidos'] = $this->input->post('apellidos');
      $data['correo'] = $this->input->post('mail');
      $data['nickname'] = $this->input->post('nick');
      $data['pin'] = $this->encrypt->encode(000000);#lo dejo asi para llamar algoritmo de activacion de usuarios
		 	$data['genero'] = $this->input->post('sexo');

		 	$data['telefono'] = $this->input->post('tel');
      $data['rol'] = $this->input->post('rol');
		 	$data['registro'] = date('Y-m-d H:i:00');
#ejecuto modelo y recibo respuesta
		 	switch ($this->archivadora->usuario($data)) {
 			case '1':
 				# usuario ocupado
 			redirect('captura/user/1?n='.$data['nick'].'&no='.$data['nombre'].'&c='.$data['correo'], 'location');
 				break;

 			case '2':
 				# correo ocupado
 			redirect('captura/user/2?n='.$data['nick'].'&no='.$data['nombre'].'&c='.$data['correo'], 'refresh');
 				break;

 			case '3':
 			# pasó
 			redirect('ver/usuarios', 'refresh');
 				break;

 			case '4':
 			# error desconocido
 			redirect('captura/user/3', 'refresh');
 				break;

 		}

 	}#cierra usuario


/**
 * [preparo vars para escribir en tabla clientes & recibo respuesta]
 * @return [string] [codigo numerico que indica resultado]
 */
  function cliente(){
    #concateno el numero de Tarjeta y guardo en var
    $tarjeta = $this->input->post('tar1').$this->input->post('tar2').$this->input->post('tar3').$this->input->post('tar4');
    #encripto numero de tarjeta concatenado
    $tarjetaEncode = $this->encrypt->encode($tarjeta);

       #defino el catalogo de variables
 		 	$data['nombres'] = $this->input->post('nombres');
 		 	$data['apellidos'] = $this->input->post('apellidos');
 		 	$data['genero'] = $this->input->post('sexo');
 		 	$data['correo'] = $this->input->post('mail');
       $data['tarjeta'] = $tarjetaEncode;
 		 	$data['telefono'] = $this->input->post('tel');
       $data['rol'] = $this->input->post('rol');
 		 	$data['registro'] = date('Y-m-d H:i:00');

 		 	switch ($this->archivadora->cliente($data)) {
  			case '1':
  				# usuario ocupado
  			redirect('captura/user/1?n='.$data['nick'].'&no='.$data['nombre'].'&c='.$data['correo'], 'location');
  				break;

  			case '2':
  				# correo ocupado
  			redirect('captura/user/2?n='.$data['nick'].'&no='.$data['nombre'].'&c='.$data['correo'], 'refresh');
  				break;

  			case '3':
  			# pasó
  			redirect('ver/usuarios', 'refresh');
  				break;

  			case '4':
  			# error desconocido
  			redirect('captura/user/3', 'refresh');
  				break;

  		}

  	}#cierra usuario


 }#cierra la clase

?>
