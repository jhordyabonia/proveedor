<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logueo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
	}

function login_facebook()
{
 $this->load->view('test/login_facebook',NULL);
}

function index (){
/*Cuando se llama este controlador se muestra la vista de login, despues de llenar el formulario de login se llama a la funcion
new_user y se redirecciona nuevamente a esta funcion, en caso de que el usuario haya iniciado sesion como comprdor, vendedor 
o ambos, esta funcion lo redireccionara al tablero de usuario, en caso que se haya iniciado con la cuenta de administrador
se redirecciona al panel de administracion*/
switch ($this->session->userdata('rol_usuario')) {
            case '':
                $data['token'] = $this->token();
                $data['titulo'] = '<span class="titulo">Proveedor.com.co</span>';
                $this->load->view('vistas/sesion_usuario',$data);
                break;
            case 'Administrador': 
                redirect(base_url().'admin');
                break;
            case 'Comprador': 
                redirect(base_url().'tablero_usuario');
                break;    
            case 'Vendedor':      
                redirect(base_url().'tablero_usuario');
                break;
   			case 'Ambos':
                redirect(base_url().'tablero_usuario');
                break;
            default:        
                $data['titulo'] = 'Bienvenido a proveedor_';
                $this->load->view('vistas/sesion_usuario',$data);
                break;      
        }		
	}

	//funcion para crear la sesion de usuario si la validacion del login es correcta, si la validacion es falsa se muestran
    // los mensajes de validacion en la vista
	 function new_user()    
     { 
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) 
        {        	
            $this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|trim|min_length[4]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay, si la validacion es false se invoca al metodo index, en caso contrario
            // se crea un array con las variables de sesion          
            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }else
            {
                $username = $this->input->post('usuario');
                $password = md5($this->input->post('password'));
                $this->login($username, $password);               
            }
        }else
        { 
            redirect(base_url().'logueo');
        }
    }

        public function login($usuario, $clave)
        {
                $check_user = $this->usuarios->get(array('usuario'=>$usuario,'password'=>$clave));
                
                if(!$check_user)
                {
                    $check_user = $this->usuarios->get(array('email'=>$usuario,'password'=>$clave));
                }               

                if($check_user)
                { 
                    $data = array(
                    'is_logued_in'  =>    TRUE,
                    'id_usuario'    =>    $check_user->id,
                    'usuario'      =>    $check_user->usuario,
                    'email'         =>    $check_user->email
                    );        
                    $this->session->set_userdata($data);
                   // $this->index();

                    $path_redirect = $this->session->userdata('path_current');

                    if($path_redirect) {   redirect($path_redirect); }
                    else { redirect(base_url()."tablero_usuario");}
                }else{  redirect(base_url().'logueo');  }
        }

	//funcion para generar un token aleatorio y encriptado en md5 para la seguridad del login
	public function token()   
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token); //tambien se guarda el token en una variable de sesion para comprobar q la sesion existe
        return $token;
    }


	public function logout()    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


}

?>