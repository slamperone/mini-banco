<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logeado extends CI_Controller {



 function index(){
   $this->load->model('login','',TRUE);
   $this->load->library('form_validation');
   $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
   $this->form_validation->set_message('min_length', '{field} debe contener almenos {param} caracteres');
   $this->form_validation->set_rules('correo', 'Correo', 'trim|required|min_length[4]|prep_for_form');
   $this->form_validation->set_rules('pin', 'PIN', 'trim|required|min_length[4]|prep_for_form|callback_check_database');

   if($this->form_validation->run() == FALSE){
     $this->load->view('login');
   }else{
    //Go to private area
     redirect('dashboard', 'refresh');
   }

 }

 function check_database($pin){
   $mail = $this->input->post('correo');

   $result = $this->login->serchUsr($mail, $pin);

   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array(
         'id' => $row->idUsuario,
         'nombre' => $row->nombres,
         'apellido' => $row->apellidos,
         'mail' => $row->correo,
         'genero' => $row->genero
         );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }else{
     $this->form_validation->set_message('check_database', 'Datos inválidos, reintente');
     return false;
   }
 }
}
?>
