<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdministracionCategorias extends CI_Controller 
{    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('new/Categoria2_model','categoria2');
    }
    public function make($nombre,$parent=0)
    {
        $categoria=array('nombre'=>$nombre,'parent'=>$parent);
        $this->categoria2->insert($categoria);
    }
    public function update($categoria,$parent=0)
    {
        if(!$parent)
        {
            $id=$this->categoria2->get($categoria)->parent;
            $parent=$id!=0?$this->categoria2->get($id)->parent:0;            
        }
        $result = $this->categoria2->update(array('parent'=>$parent),$categoria);
        
        echo !$result?'Error, durante la opracón':0;  
    }
    public function delete($categoria)
    {   
        $result=$this->categoria2->delete($categoria);        
        !$result?FALSE:$this->categoria2->delete(array('parent'=>$categoria));
        echo !$result?'Error, durante la opracón':0;        
    }
    public function show($categoria=0)
    {
        $data['url']=base_url()."administracionCategorias"; 
        $data['titulo']="administracion Categorias"; 
        echo @$this->load->view('template/head', $data, TRUE);
        echo @$this->load->view('administracionCategorias/assets',FALSE,TRUE); 
       
        $data['categorias']=$this->categoria2->get_all(array('parent'=>$categoria));
        echo @$this->load->view('administracionCategorias/items',$data,TRUE);
    }
    public function index()
    {
       $this->show();
    }
}