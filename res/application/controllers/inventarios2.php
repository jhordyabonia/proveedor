<?php
class Inventarios2 extends CI_Controller {
     
   
    public function __construct () {
        parent::__construct();
         
        // inicializamos la librería      
        $this->load->model('new/Empresa_model','empresa');
        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->model('new/Municipio_model','minicipio');
        $this->load->model('crypter_model','crypter');
        $this->load->model('u_model','u');
        $this->load->library('excelNew');
        #$this->verifyc_login();
    }
     
    private function verifyc_login()
    {
      $usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
      if($usuario->permisos==1)
      { return TRUE;  }

      redirect(base_url(),'refresh');
    } 

    public function index()
    {

      $dat['titulo']="Registro masivo de Empresas";
    $dat['nit']=$this->session->userdata('empresa');
    $dat['usuario']=$this->session->userdata('usuario');

    $this->load->view('template/head', $dat);
    $this->load->view('tablero_usuario/header', $dat, FALSE);
    $this->load->view('template/javascript', FALSE);
        $data['namefile']="";
        $data['id_empresa']="";
        $this->load->view('inventarios2/cargar',$data);
    }

    private function ciudad($in)
    {
     $out=FALSE;
     foreach(explode(' ',$in) as $key=>$value)
      {
        $out=$this->minicipio->get(array('municipio'=>$in));
        if($out)break;
      }

     if(!$out)
      {
        $out->id_municipio=1113;
        $out->id_departamento=33;
      }
     return $out;
    }

    function cargar()
    {        
        //Configuramos los parametros para subir el archivo al servidor.        
        $config['upload_path'] = realpath(APPPATH.'../uploads/inventarios/');        
        $config['allowed_types'] = 'xlsx|xls|ods';
        $config['max_size'] = '0';          
        //Load the Upload CI library 
        //Cargamos la libreria CI para Subir
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file') )
        {   
                print_r($this->upload->display_errors());                       
        }
        else
        {            
            $data = array('upload_data' => $this->upload->data()); 
            $data['url_full']=$data['upload_data']['file_name'];
            $excel = $this->excelnew->read_file($data['upload_data']['file_name']);              
        }       
        
       //El archivo almacenado en el servidor sera eliminado, no lo necesitamos mas.
        //unlink($config['upload_path'].'/'.$data['upload_data']['file_name']);           
        
       //Asignamos el arreglo resultante de la funcion de la libreria y lo pasamos a la vista.
        $data['id_empresa'] = $this->input->post('id_empresa');
        $data['excel'] = $excel[0];

        /*
        echo 10;
        echo "<PRE>";
        print_r( $data['excel']);
        echo "</PRE>";
        return;
        */
        $data['namefile']=$data['url_full'];
        $this->load->view("template/head", $data);
        $this->load->view('inventarios2/cargar',$data);
        $this->load->view('inventarios2/ver_', $data); 
}
    
    public function registrar_($id_empresa=0)
    { 
        $this->load->view("template/head", array('title'=>''));
   
       $nombres=$this->input->post('nombre');
       $nits=$this->input->post('nit');
       $direccion=$this->input->post('direccion');
       $descripciones=$this->input->post('descripcion');
       $tipos=$this->input->post('tipo');
       $nombres_u=$this->input->post('nombres');
       $emails=$this->input->post('email');
       $telefonos=$this->input->post('telefono');
       $ciudades=$this->input->post('municipio');

       $registros=array();
       for($i=1;$i<count($nombres);$i++)
       { 
          if($nombres_u[$i]==NULL||$nombres_u[$i]==NULL)
            { continue; }
         $registros[$i]->empresa['nit']=$nits[$i]|1;
         $registros[$i]->empresa['tipo_registro']=3;
         $registros[$i]->empresa['logo']="default.png";
         $registros[$i]->empresa['nombre']=$nombres[$i];
         $registros[$i]->empresa['descripcion']=$descripciones[$i]==""?$nombres[$i]:$descripciones[$i];
         $registros[$i]->empresa['direccion']=$direccion[$i];
         $registros[$i]->empresa['categorias']=$this->buscar_caretgorias($registros[$i]->empresa['descripcion']);
         $registros[$i]->empresa['tipo']=$tipos[$i]|1;

         $registros[$i]->usuario['telefono']=$telefonos[$i];
         $tmp=$this->ciudad($ciudades[$i]);
         $registros[$i]->usuario['ciudad']=$tmp->id_municipio;
         $registros[$i]->usuario['departamento']=$tmp->id_departamento;
         $registros[$i]->usuario['nombres']=$nombres_u[$i];
         $registros[$i]->usuario['usuario']="proveedor".substr($this->crypter->encrypt(rand(2,25)), 7);
         $registros[$i]->usuario['email']=$emails[$i];

         $password=$this->crypter->encrypt(rand(10,50));
         $registros[$i]->password = $password;
         $registros[$i]->usuario['password'] = md5($password);
       }

       $test=$this->input->post('imagenes_1');
       $key=0;
       foreach ($registros as $key => $registro) 
       {
         $id_usuario=$this->usuarios->insert($registro->usuario); 
         $registro->empresa['usuario']=$id_usuario;
         $id_empresa=$this->empresa->insert($registro->empresa); 
         #$this->load_image($id,$key); 
         /*
         echo "<b>".$id_usuario." Empresa<br>";
         echo "<i>".$id_empresa." Empresa<br></b></i>";
         echo "<PRE>";
         print_r($registro);
         echo "</PRE>";
         */
        }
          
       #return;
      $dat['titulo']="Registro masivo de empresas";
      $dat['nit']=$this->session->userdata('empresa');
      $dat['usuario']=$this->session->userdata('usuario');

      #$this->load->view('template/head', $dat);
      #$this->load->view('tablero_usuario/header', $dat, FALSE);
      #$this->load->view('template/javascript', FALSE);
       echo "<center><br><br><br><br><h3>Se registraron ".$key." Empresas, con exito!!</h3>";
       echo "</h4><br><a href='".base_url()."inventarios2'>Volver</a>";
       echo "</h4><br><a href='".base_url()."micro_admin/'>Micro Adimin</a>";
    }
  private function buscar_caretgorias($inputs="")
  {       
        $out="";
        foreach (explode(' ',$inputs) as $key => $value) 
        {
          if(is_null($value)||strlen($value)<4)continue;
          $out.=$this->trt($value);
          #echo strtolower($value.'<br>'); 
        }       

        return $out."|39";
  }
  private function trt($value)
  {
        $out="";
        $db = $this->load->database('default', TRUE);
        $db->from('categoria');
        $db->select('id_categoria');
         $db->like('nombre_categoria', strtolower($value), 'both'); 
         foreach ($db->get()->result() as $key=>$value)
        {
          $out.=$value->id_categoria.'|';
        }
        return $out;
  }

  function load_image($id_registro,$i) 
  {
    $name_array = "img";
    $imagenes="default.jpg";
    if ($_FILES[$name_array]) 
    {
        $_FILES['userfile'] = array(
          'name' => $_FILES[$name_array]['name'][$i],
          'type' => $_FILES[$name_array]['type'][$i],
          'tmp_name' => $_FILES[$name_array]['tmp_name'][$i],
          'error' => $_FILES[$name_array]['error'][$i],
          'size' => $_FILES[$name_array]['size'][$i]
        );
        if ($this->u->imagen()) {
          $imagenes= $this->u->nombre_archivo;
        }
      }

    $this->producto->update(array('imagenes'=> $imagenes),$id_registro);
  }

  function eliminar()
  {
   $empresas= $this->empresa->get_all(array('tipo_registro'=>3));
   foreach ($empresas as $key => $value) 
   {
    $this->usuarios->delete($value->usuario);
   }
   $t=$this->empresa->delete(array('tipo_registro'=>3));
   echo "<br><br><br><br>Se eliminaron ".$t." registros";
   echo "<h4><br><a href='".base_url()."inventarios2'>Volver</a>";
  }
}
// end: excel
?>