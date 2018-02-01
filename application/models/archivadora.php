<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Archivadora extends CI_Model{


/**
 * [escribe en la tana usuarios, para los usuarios del sisetma (cajeros,ejecutivos,auditores)]
 * @param  [array] $data [arreglo con todos los datos que vienen del formulario de registro]
 * @return [string]       [valor que especifica el resultado de la validación en la BDD]
 */
	function usuario($data){
#si el nickname ya existe...
		if ($this->db->get_where('usuarios', array('nick' => $data['nick']))->num_rows()>=1){
			return  '1';
			exit;
#si el mail ya fue registrado antes
		}else if($this->db->get_where('usuarios', array('correo' => $data['correo']))->num_rows()>=1) {
			return '2';
			exit;
		}else{
#escribe en la tabla usuarios
			if ($this->db->insert('usuarios', $data)){
				return '3';
				exit;
			}else{
					return '4';
					exit;
			}
		}
		}#cierra usuario

		function cliente($data){
#no se puede registrar el mismo cliente do veces, si quiere mas de u na cuenta se usa la tabla cuentas
			if($this->db->get_where('usuarios', array('correo' => $data['correo']))->num_rows()>=1) {
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



	}#cierra clase

?>
