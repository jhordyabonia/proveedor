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
        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->library('excelNew');
    }
    // end: construc
     
     /**
      *
      *index
     */


     
    public function index()
    {
        $data['namefile']="";
        $data['id_empresa']="";
        $this->load->view('inventarios/cargar',$data);
    }
     
     
    /**
    *
    *upload
    */
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
        $data['excel'] = $excel;

        $data['namefile']=$data['url_full'];
        $this->load->view('inventarios/cargar',$data);
        $this->load->view('inventarios/ver', $data);  
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
    public function registrar($id_empresa=0)
    { 

          if($id_empresa!=0)
          { $id_empresa = $this->input->post('id_empresa'); }

          realpath(APPPATH.'../uploads/inventarios/'); 
          $url_full = $this->input->post('url_full');


          //$empresa=$this->empresa_model->get_empresa_data($id_empresa);
          $out['empresa']=$this->empresa->get($id_empresa);
          $out['usuario'] = $this->usuarios->get($out['empresa']->usuario);
      
          $excel = $this->excelnew->read_file($url_full);
          $productos=array();  
          for ($i=1;$i<$excel->number_rows;$i++) 
          {
            $productos[$i]['nombre']=$excel->values[$i][1];
            $productos[$i]['descripcion']=$excel->values[$i][2];
            $productos[$i]['precio_unidad']=$excel->values[$i][3];
            $productos[$i]['subcategoria']=$excel->values[$i][4];
            $productos[$i]['inventario']=$excel->values[$i][5];
            $productos[$i]['pedido_minimo']=$excel->values[$i][5];
            $productos[$i]['medidas']=$excel->values[$i][5];
            $productos[$i]['tipo_pago']=$excel->values[$i][5];
          }
          echo "<PRE>";
          //echo $id_empresa;
          //print_r($productos);
          echo "</PRE>";

          $i=0;
          $test=$this->input->post('imagenes_1');
          for ($i=1;$i<$excel->number_rows;$i++) 
          {
            echo "<br>Imagen $i ".$test;
            /*
            $this->producto->insert($productos[$i]);        
            $this->producto_model->negociacion($this->producto_model->id, $productos[$i]['pedido_min'], $productos[$i]['capacidad'], $productos[$i]['precio'], $productos[$i]['medidas']);
            //$this->_images_form();
            $this->producto_model->palabras($this->producto_model->id, $productos[$i]['nombre']);        
            $this->producto_model->tipo_pago($this->producto_model->id, $productos[$i]['tipo_pago']);
            */
          }
          echo "<h3>Se registraron ".$i." productos, con exito!!</h3>";
          echo "<h4>Empresa: ".$out['empresa']->nombre;
          echo "<P>Nit: ".$id_empresa;
          echo "</h4><br><a href='".base_url()."inventarios'>Volver</a>";
    }


  function _images_form($id_registro,$id_tmp) 
  {
    $name_array = "imagenes_"+$id_tmp;
    $imagenes="";
    if ($_FILES[$name_array]) {
      $numero_archivos = count($_FILES[$name_array]['name']);
      for ($i = 0; $i < $numero_archivos; $i++) {
        $_FILES['userfile'] = array(
          'name' => $_FILES[$name_array]['name'][$i],
          'type' => $_FILES[$name_array]['type'][$i],
          'tmp_name' => $_FILES[$name_array]['tmp_name'][$i],
          'error' => $_FILES[$name_array]['error'][$i],
          'size' => $_FILES[$name_array]['size'][$i]
        );
        if ($this->u->imagen()) {
          $imagenes.= $this->u->nombre_archivo;
        }else
        {
          $imagenes.= 'default.jpg';
        }
      }
    }else
    {
      $imagenes.= 'default.jpg';
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