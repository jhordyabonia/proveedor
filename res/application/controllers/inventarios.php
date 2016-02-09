<?php
/**
 *  
 * excel
 */
class Inventarios extends CI_Controller {
     
     
     
     
     
    /**
     * 
     * __construct
     */
    public function __construct () {
        parent::__construct();
         
        // inicializamos la librería      
        $this->load->model('new/Empresa_model','empresa');
        $this->load->model('new/Producto_model','producto');
        $this->load->model('new/Subcategoria_model','subcategoria');
        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->model('u_model','u');
        $this->load->library('excelNew');        
        $this->verifyc_login();
    }
    // end: construc
     
     /**
      *
      *index
     */


     
    private function verifyc_login()
    {
        $usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
        if($usuario->permisos==1)
        {   return TRUE;    }

        redirect(base_url(),'refresh');
    } 
    
    public function index()
    {

        #$dat['titulo']="Registro masivo de productos";
        #$dat['nit']=$this->session->userdata('empresa');
        #$dat['usuario']=$this->session->userdata('usuario');

        #$this->load->view('template/head', $dat);
        #$this->load->view('tablero_usuario/header', $dat, FALSE);
        #$this->load->view('template/javascript', FALSE);
        $data['namefile']="";
        $data['id_empresa']="";
        $this->load->view('inventarios/cargar',$data);
    }
     
     
    /**
    *
    *upload
    */

    function subcategoria($subcategoria)
    {
     $out=$this->subcategoria->get(array('nom_subcategoria'=>$subcategoria));
     if($out)
     { return $out->id_subcategoria;}
     return 4000;
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
        $data['excel'] = $excel[1];

        /*
        echo "<PRE>";
        print_r( $data['excel']);
        echo "</PRE>";
        return;
        */

        $dat['titulo']="Registro masivo de productos";
        $dat['nit']=$this->session->userdata('empresa');
        $dat['usuario']=$this->session->userdata('usuario');

        $this->load->view('template/head', $dat);
        $this->load->view('tablero_usuario/header', $dat, FALSE);
        $this->load->view('template/javascript', FALSE);
        $data['namefile']=$data['url_full'];
        $this->load->view("template/head", $data);
        $this->load->view('inventarios/cargar',$data);
        $this->load->view('inventarios/ver_', $data);  
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
       $medidas=$this->input->post('medida');
       $precios=$this->input->post('precio');
       $descripciones=$this->input->post('descripcion');
       $subcategorias=$this->input->post('subcategoria');
       $pedidos_minimos=$this->input->post('pedido_minimo');
       $formas_de_pago=$this->input->post('formas_de_pago');

       $productos=array();
       for($i=1;$i<count($nombres);$i++)
       { 
          if($nombres[$i]==NULL)
            { continue; }
         $productos[$i]['nombre']=$nombres[$i];
         $productos[$i]['descripcion']=$descripciones[$i]|$nombres[$i];
         $productos[$i]['medida']=$medidas[$i]|1;
         $productos[$i]['precio_unidad']=$precios[$i]|0;
         $productos[$i]['subcategoria']=$this->subcategoria($subcategorias[$i]);
         $productos[$i]['pedido_minimo']=$pedidos_minimos[$i]|1;
         $productos[$i]['formas_de_pago']=$formas_de_pago[$i]|"A convenir";
         $productos[$i]['empresa']=$id_empresa;
       }

       $test=$this->input->post('imagenes_1');
       foreach ($productos as $key => $producto) 
       {
         $id=$this->producto->insert($producto); 
         $this->load_image($id,$key); 
         echo "<PRE>";
         print_r($producto);
         echo "</PRE>";
        }
          
       #return;
        $dat['titulo']="Registro masivo de productos";
        $dat['nit']=$this->session->userdata('empresa');
        $dat['usuario']=$this->session->userdata('usuario');

        $this->load->view('template/head', $dat);
        $this->load->view('tablero_usuario/header', $dat, FALSE);
        $this->load->view('template/javascript', FALSE);
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
    /**
     * 
     * setExcel
     */

    public function setExcel () {
         

        $this->load->library('classes/phpexcel');
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                                     ->setLastModifiedBy("Arkos Noem Arenom")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");
         
         
        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nombre')
                    ->setCellValue('A2', 'Description')
                    ->setCellValue('A3', 'precio')
                    ->setCellValue('A4', 'Flores')
                    ->setCellValue('A5', 'otros');
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('B1', 'producto1')
                    ->setCellValue('B2', 'descripcion producto1')
                    ->setCellValue('B3', '10000')
                    ->setCellValue('B4', 'Flores')
                    ->setCellValue('B5', 'null');
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('C1', 'producto2')
                    ->setCellValue('C2', 'descripcion producto2')
                    ->setCellValue('C3', '20000')
                    ->setCellValue('C4', 'Flores')
                    ->setCellValue('C5', 'null');
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('D1', 'producto3')
                    ->setCellValue('D2', 'descripcion producto3')
                    ->setCellValue('D3', '30000')
                    ->setCellValue('D4', 'Flores')
                    ->setCellValue('D5', 'null');
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('E1', 'producto4')
                    ->setCellValue('E2', 'descripcion producto4')
                    ->setCellValue('E3', '410000')
                    ->setCellValue('E4', 'Flores')
                    ->setCellValue('E5', 'null');
         
        // La librería puede manejar la codificación de caracteres UTF-8
        $this->phpexcel->setActiveSheetIndex(0)
                    ->setCellValue('F1', 'producto5')
                    ->setCellValue('F2', 'descripcion producto5')
                    ->setCellValue('F3', '50000')
                    ->setCellValue('F4', 'Flores')
                    ->setCellValue('F5', 'null');
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Simple');
         
         
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Simple');
         
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
         
    }
    // end: setExcel
}
// end: excel
?>