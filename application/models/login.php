<?php
Class Login extends CI_Model
{
 function serchUsr($mail)
 {
   $this -> db -> select('*');
   $this -> db -> from('usuarios');
   $this -> db -> where('correo', $mail);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
       if($query -> num_rows() == 1)
       {
         return $query->result();
       }else{
         return false;
       }
 }
}
?>
