<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logeado extends CI_Controller {
/**
 * [Este método se ejcuta de forma predetermianda cuando se invoca esete controlador]
 * @return [nada] [invoca el modelo que hace la query con los datos que vienen por post del formulario de logeo
 * importa libreria que contiene las reglas de validación disponibles
 * establece los mensajes de error & las reglas a seguir
 * corre la varildacion y hace callback a check_database()]
 */
   function index(){
     $this->load->model('login','',TRUE);
     $this->load->library('form_validation');

     $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
     $this->form_validation->set_message('min_length', '{field} debe contener almenos {param} caracteres');
     $this->form_validation->set_message('integer', 'El {field} solo acepta números');
     $this->form_validation->set_message('valid_email', 'Esa no parece una dirección de email válida');

     $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|min_length[6]');
     $this->form_validation->set_rules('pin', 'PIN', 'required|min_length[6]|integer');

     if($this->form_validation->run() == TRUE){#si el front validó bien...
       $pin = $this->input->post('pin');

         if ($this->check_database($pin)==true) {#si el email & pin son correctos...
           redirect('dashboard', 'refresh');
         }else{
           $this->load->view('login');
         }

     }else{
       $this->load->view('login');
     }

   }
/**
 * [check_database description]
 * @param  [int] $pin [numero entero de 6 digitos generado por el sistema en el proceso de registro de usuarios]
 * @return [boolean]      [busca el usuario en la BDD desecncripta el pin y lo compara]
 */
 function check_database($pin){
   #establezco el valor de $mail
   $mail = $this->input->post('correo');
   #guardo en var el resltado de la query
   $result = $this->login->serchUsr($mail);

#si encuentra el mail del usuario devuelve un array con sus datos, entre ellos el pin encriptado para comparar
   if($result){ #si encontró el mail...
     #sirve para guardar el resultado de la valdación

     $pinFuente = $this->encrypt->decode($result[0]->pin);#desecncripto el pin que viene de la BDD

            if ($pinFuente == $pin){ #si el pin capturado es igual al que estaba en la BDD...
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
              exit;


            }else{
              $this->form_validation->set_message('check_database', 'PIN incorrecto, reintente');
              return FALSE;
              exit;

            }
   }else{
     $this->form_validation->set_message('check_database', 'Datos inválidos, reintente');
     return FALSE;
     exit;
   }
 }
}
?>
