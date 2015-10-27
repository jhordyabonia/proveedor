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
    }
     
    public function index()
    {
        $data['namefile']="";
        $data['id_empresa']="";
        $this->load->view('inventarios2/cargar',$data);
    }

    function ciudad($in)
    {
     $out=$this->minicipio->get(array('municipio'=>$in));
     if($out)
     { return $out->id_municipio;}
     return 1113;
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
    public function verificar_empresa($id_empresa=0)
    {      
        if($id_empresa==0)
        { $id_empresa = $this->input->post('id_empresa'); }

        $datos['empresa']=$this->empresa->get(array('nit'=>$id_empresa));
        if(!$datos['empresa'])
          {$datos['empresa']=$this->empresa->get($id_empresa);}
       
        $this->load->view('inventarios/verificar_empresa', $datos);
    }
    public function registrar_($id_empresa=0)
    { 
        $this->load->view("template/head", array('title'=>''));
   
       $nombres=$this->input->post('nombre');
       $nits=$this->input->post('nit');
       $precios=$this->input->post('dirrecion');
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
         $registros[$i]->empresa['logo']="default.png";
         $registros[$i]->empresa['nombre']=$nombres[$i];
         $registros[$i]->empresa['descripcion']=$descripciones[$i]|$nombres[$i];
         $registros[$i]->empresa['tipo']=$tipos[$i]|1;

         $registros[$i]->usuario['telefono']=$telefonos[$i];
         $registros[$i]->usuario['ciudad']=$this->ciudad($ciudades[$i]);
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
       echo "<center><h3>Se registraron ".$key." productos, con exito!!</h3>";
       $out['empresa']=$this->empresa->get($id_empresa);
       echo "<h4>Empresa: ".$out['empresa']->nombre;
       echo "<P>Nit: ".$id_empresa;
       echo "</h4><br><a href='".base_url()."inventarios'>Volver</a>";
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
}
// end: excel
?>