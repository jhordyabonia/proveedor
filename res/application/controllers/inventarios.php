<?php
class Inventarios extends CI_Controller 
{     
    public function __construct () 
    {
        parent::__construct();
         
        // inicializamos la librería      
        $this->load->model('new/Empresa_model','empresa');
        $this->load->model('new/Producto_model','producto');
        $this->load->model('new/Subcategoria_model','subcategoria');
        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->model('u_model','u');
        $this->load->library('excelNew');        
        #$this->verifyc_login();
    }
    private function verifyc_login()
    {
        $usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
        if($usuario->permisos==1)
        {   return TRUE;    }

        redirect(base_url(),'refresh');
    } 
    public function test(){echo "<h1>Jhordy</h1>";}
    public function imagenes($formulario='read')
    {
        if($formulario=='read')
        {
            echo "<form name='form' method='post' action='/inventarios/imagenes/load' accept-charset='utf-8' enctype='multipart/form-data'>
                    <input type='file' name='file'>
                    <input type='submit' value='Subir imagenes'>
                  </form>";
            return $formulario;
        }
        //Configuramos los parametros para subir el archivo al servidor.    

        $config['upload_path'] = realpath(APPPATH.'../uploads/inventarios/img');        
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '0';          
        //Load the Upload CI library 
        //Cargamos la libreria CI para Subir
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file') )
        {   
                print_r($this->upload->display_errors());   
                return;                    
        }
        else
        {            
            $data = array('upload_data' => $this->upload->data()); 
            $data['url_full']=$data['upload_data']['file_name'];             
        }          //Creamos un objeto de la clase ZipArchive()
        $enzipado = new ZipArchive();
        
        //Abrimos el archivo a descomprimir
        $enzipado->open($data['url_full']);
        
        //Extraemos el contenido del archivo dentro de la carpeta especificada
        $extraido = $enzipado->extractTo("uploads/");
        
        /* Si el archivo se extrajo correctamente listamos los nombres de los
        * archivos que contenia de lo contrario mostramos un mensaje de error
        */
        if($extraido == TRUE){
        for ($x = 0; $x < $enzipado->numFiles; $x++) {
        $archivo = $enzipado->statIndex($x);
        echo 'Extraido: '.$archivo['name'].'</br>';
        }
        echo $enzipado->numFiles ." archivos descomprimidos en total";
        }
        else {
        'Ocurrió un error y el archivo no se pudó descomprimir';
        }
    }
    public function redimencionar($json="")
    {
      $json=explode('value', $json);
      /*
      Proceso de redimencionado aqui....

      echo "json:<PRE>";
       print_r($json);
      echo "</PRE>";
      */
      $dat['titulo']="Registro masivo de productos";
      $dat['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
      $dat['empresa']=$this->empresa->get(array('usuario'=>$dat['usuario']->id));
      $dat['administrador']=$dat['usuario']->permisos;

      $this->load->view('template/head', $dat);
      $this->load->view('tablero_usuario/header', $dat, FALSE);
      $this->load->view('template/javascript', FALSE);

      $this->load->view('template/javascript', FALSE);
      echo "<br><br><br><br><br><br><br><center><h3>Carga de imagenes completa.!!</h3>";
      echo "</h4><br><a href='".base_url()."inventarios'>Volver</a>";
    }
    public function index($val=TRUE)//($val=FALSE)
    {
       if (!$val)return;
        $dat['titulo']="Registro masivo de productos";
        $dat['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
        $dat['empresa']=$this->empresa->get(array('usuario'=>$dat['usuario']->id));
        $dat['administrador']=$dat['usuario']->permisos;

        $this->load->view('template/head', $dat);
        $this->load->view('tablero_usuario/header', $dat, FALSE);
        $this->load->view('template/javascript', FALSE);
        $data['namefile']="";
        $data['id_empresa']="";
        $this->load->view('inventarios/cargar',$data);
    }
    
    public function subcategoria($subcategoria)
    {
     $out=$this->subcategoria->get(array('nom_subcategoria'=>$subcategoria));
     if($out)
     { return $out->id_subcategoria;}
     return 4000;
    }

    public function tf()
    {
    $this->index(TRUE);
    }
    public function leer($id_empresa,$file_name,$begging=0)
    {        
        $excel = $this->excelnew->read_file($file_name);
        $data['excel'] = $excel[1];        
        
        $dat['titulo']="Registro masivo de productos";
        $dat['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
        $dat['empresa']=$this->empresa->get(array('usuario'=>$dat['usuario']->id));
        $dat['administrador']=$dat['usuario']->permisos;

        $this->load->view('template/head', $dat);
        $this->load->view('tablero_usuario/header', $dat, FALSE);
        $this->load->view('template/javascript', FALSE);
        $data['url_full']=$file_name;
        $data['id_empresa']=$id_empresa;
        $data['begging']=$begging;
        $this->load->view('inventarios/cargar',$data);
        $this->load->view('inventarios/ver_', $data);      
    }
    public function cargar()
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
            return;                   
        }
        else
        {            
            $data = array('upload_data' => $this->upload->data());               
        }       
        
       //El archivo almacenado en el servidor sera eliminado, no lo necesitamos mas.
        //unlink($config['upload_path'].'/'.$data['upload_data']['file_name']);           
        
       //Asignamos el arreglo resultante de la funcion de la libreria y lo pasamos a la vista.
        $this->leer($this->input->post('id_empresa'),$data['upload_data']['file_name']);        
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
    public function registrar_($id_empresa=0,$file_name)
    {    
       $begging=$this->input->post('begging');
       $nombres=$this->input->post('nombre');
       $medidas=$this->input->post('medida');
       $precios=$this->input->post('precio');
       $descripciones=$this->input->post('descripcion');
       $referencias=$this->input->post('referencia');
       $subcategorias=$this->input->post('subcategoria');
       $pedidos_minimos=$this->input->post('pedido_minimo');
       $formas_de_pago=$this->input->post('formas_de_pago');

       $productos=array();
       $empty=0;
       for($i=1;$i<count($nombres);$i++)
       { 
          if($i>5&&$empty==0)break;
          if($nombres[$i]==NULL||$nombres[$i]=='')
            { continue; }
         $productos[$i]['nombre']=$nombres[$i];
         $productos[$i]['descripcion']=$descripciones[$i]==""?$nombres[$i]:$descripciones[$i];
         $productos[$i]['imagenes']=$referencias[$i]==NULL?"default.jpg":$referencias[$i].".jpg";
         $productos[$i]['medida']=$medidas[$i]==NULL?1:$medidas[$i];
         $productos[$i]['precio_unidad']=$precios[$i]==NULL?0:intval($precios[$i]);
         $productos[$i]['subcategoria']=$this->subcategoria($subcategorias[$i]);
         $productos[$i]['pedido_minimo']=intval(($pedidos_minimos[$i]==NULL?0:$pedidos_minimos[$i])/$productos[$i]['precio_unidad']);#$pedidos_minimos[$i]=NULL?1:$pedidos_minimos[$i];
         $productos[$i]['formas_de_pago']=$formas_de_pago[$i]==NULL?"A convenir":$formas_de_pago[$i];
         $productos[$i]['empresa']=$id_empresa;
         $empty++;
        }
  
        if($empty>1)        
        {
           foreach ($productos as $key => $producto) 
           {
              $id=$this->producto->insert($producto); 
              $this->load_image($id,$key);
           }
           $this->leer($id_empresa,$file_name,$begging+$empty);
        }else{$this->fin($id_empresa,$begging);}          
    }
    public function fin($id_empresa,$numero)
    {                 
        $dat['titulo']="Registro masivo de productos";
        $dat['facebook']=FALSE;
        $dat['empresa']=$this->empresa->get($id_empresa);
        $dat['usuario']=$this->usuarios->get($dat['empresa']->usuario);
        $dat['administrador']=$dat['usuario']->permisos;

        $this->load->view('template/head', $dat);
        $this->load->view('tablero_usuario/header', $dat);
        $this->load->view('template/javascript');

        echo "<br><br><br><br><center><h3>Se registraron ".$numero." productos, con exito!!</h3>";
        echo "<h4>Empresa: ".$dat['empresa']->nombre;
        echo "<P>Nit o Id : ".$id_empresa;
        echo "<h4>Subir imagenes</h4><br>";
        $this->imagenes();
        echo "</h4><br><a href='".base_url()."inventarios'>Volver</a>";     
    }

    public function load_image($id_registro,$i) 
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
        $tmp=$this->producto->get($id_registro);
        $this->producto->update(array('imagenes'=> $tmp->imagenes.','.$imagenes),$id_registro);
    }
}
// end: excel
?>