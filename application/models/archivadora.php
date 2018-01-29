<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Archivadora extends CI_Model{



	function usuario($data){

		//print_r($data);

		//$usr = $this->db->get_where('usuarios', array('nick' => $data['nick']));

		if ($this->db->get_where('usuarios', array('nick' => $data['nick']))->num_rows()>=1){
			return  '1';
			exit;
		}else if($this->db->get_where('usuarios', array('correo' => $data['correo']))->num_rows()>=1) {
			return '2';
			exit;
		}else{

			if ($this->db->insert('usuarios', $data)){
				return '3';
				exit;
			}else{
					return '4';
					exit;
			}
		}



		}#cierra usuario

		function alumno ($data){
			if ($this->db->insert('alumnos', $data)){
				return TRUE;
				exit;
			}else{
					return FALSE;
					exit;
			}
		}#cierra alumno

		function resultado ($data){
			if ($this->db->insert('resultado', $data)){
				return TRUE;
				exit;
			}else{
					return FALSE;
					exit;
			}
		}#cierra resultado

	}#cierra clase

?>