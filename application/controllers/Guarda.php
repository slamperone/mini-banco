<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guarda extends CI_Controller {

function __construct(){
   parent::__construct();
   date_default_timezone_set('America/Mexico_City');
   $this->load->model('guardadora');
 }

  function index(){
  redirect('dashboard', 'refresh');
 }

 function user(){

		 	$data['nombres'] = $this->input->post('nombres');
		 	$data['apellidos'] = $this->input->post('apellidos');
		 	$data['genero'] = $this->input->post('sexo');
		 	$data['correo'] = $this->input->post('mail');
		 	$data['rol'] = $this->input->post('rol');
		 	$data['telefono'] = $this->input->post('tel');
		 	$data['celular'] = $this->input->post('cel');
		 	$data['registro'] = date('Y-m-d H:i:00');

		 	switch ($this->guardadora->usuario($data)) {
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

 	function alumno (){
 			$data['al_nombre']= $this->input->post('nm');
		 	$data['al_apellidoPat'] = $this->input->post('ap');
		 	$data['al_apellidoMat'] = $this->input->post('am');
		 	$data['al_sexo'] = $this->input->post('sx');
		 	$data['al_celular'] = $this->input->post('cl');
		 	$data['al_telefono'] = $this->input->post('tl');
		 	$data['al_correo'] = $this->input->post('em');
		 	$data['al_direccion'] = $this->input->post('dr');
		 	$data['al_comentario'] = $this->input->post('ms');
		 	$data['al_escuela'] = $this->input->post('es');
		 	$data['al_curso'] = $this->input->post('cr');
		 	if ($this->input->post('al') == "") {
			$data['al_inscrito'] = '0';
		 	}else{
		 	$data['al_inscrito'] = $this->input->post('al');
		 	}
		 	$data['al_carrera'] = $this->input->post('ca');
		 	$data['al_medio'] = $this->input->post('md');
		 	$data['al_registro'] = date('Y-m-d H:i:00');
		 	if ($this->guardadora->alumno($data)){
		 		if ($data['al_inscrito']=='0') {
		 			redirect('ver/aspirantes', 'location');
		 		}else{
		 			redirect('ver/alumnos', 'location');
		 		}
		 	}else{
		 		redirect('captura/aspirante/error', 'location');
		 	}
 	}#cierra alumno

 	function calificacion(){
 		$materias = array();
 		if ($this->input->post('tipo')=='global'){
 			foreach ($this->input->post() as $campo => $valor) {
 			if (is_numeric($campo)) {
 				$materias[$campo] = $valor;
	 			}
	 		}
 		}else if($this->input->post('tipo')=='parcial'){
		foreach ($this->input->post() as $campo => $valor) {
 			if (is_numeric($campo) && $valor != "") {
 				$materias[$campo] = $valor;
	 			}
	 		}
 		}
 		$data['idAlumno'] = $this->input->post('alumno');
 		$data['idCurso'] = $this->input->post('curso');
 		$data['resultado'] = json_encode($materias);
 		$data['registro'] = date('Y-m-d H:i:00');
 		$data['comentario'] = $this->input->post('comentario');
 		$data['tipo'] = $this->input->post('tipo');

 		if ($this->guardadora->resultado($data)){
		 			//redirect('ver/detalle/'.$data['idAlumno'], 'location');
 			redirect('captura/resultado/all/exito?cual='.$data['idAlumno'], 'location');
		 		}else{
		 			redirect('captura/resultado/'.$data['idAlumno'].'/'.$data['tipo'].'?error=1', 'location');
		 		}
 	}#cierra  calificacion

 }#cierra la clase

?>