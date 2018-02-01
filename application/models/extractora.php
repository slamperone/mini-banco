<?php
Class Extractora extends CI_Model{

 function cliente($cual){
  $this->db->select('*');
  $this->db->from('usuarios');
  $this->db->where('idUsuario',$cual);
  $this->db->join('roles','roles.idRol = usuarios.rol');
  $this -> db -> limit(1);

$query = $this->db->get();

   if($query -> num_rows() >= 1){
     return $query->result();
   }else{
     return false;
   }
 }

 function clientes(){
  $this->db->select('idCliente,nombres,apellidos,mail,registro');
  $this->db->from('clientes');
$query = $this->db->get();
   if($query -> num_rows() >= 1){
     return $query->result();
   }else{
     return false;
   }
 }

 function usuarios(){
  $this->db->select('*');
  $this->db->from('usuarios');
$query = $this->db->get();
   if($query -> num_rows() >= 1){
     return $query->result();
   }else{
     return false;
   }
 }


function dashboard (){

  $dash['cuantosClientes'] = $this->db->query("select idUsuario from usuarios where rol = 3")->num_rows();
  $dash['cuantosCuentas'] = $this->db->query("select idCuenta from cuentas group by idCuenta")->num_rows();;
  $dash['cuantosEjecutivos'] = $this->db->query("select idUsuario from usuarios where rol = 1")->num_rows();
  $dash['mayorDemanda'] = 66;
  $dash['cuantosCajeros'] = $this->db->query("select idUsuario from usuarios where rol = 2")->num_rows();
  return $dash;

}#cierra dashboard

function roles(){
  $this->db->select('idRol,rol');
  $this->db->from('roles');
$query = $this->db->get();
   if($query -> num_rows() >= 1){
     return $query->result();
   }else{
     return false;
   }
}

}#cierra sacadora
?>
