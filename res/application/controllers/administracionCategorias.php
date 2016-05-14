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
        $categoria=array('nombre'=>$this->fromUrl($nombre),'parent'=>$parent);
        echo @$this->categoria2->insert($categoria);
    }

    public function update2($categoria)
    {
        $data['nombre']=$this->input->post('nombre_'.$categoria);
        $data['descripcion']=$this->input->post('descripcion_'.$categoria);
        
        $result = $this->categoria2->update($data,$categoria);
        
        #if(!$result)
        #    echo 'Error, durante la opracón';
        #else 
            redirect($_SERVER['HTTP_REFERER'],'refresh');  
    }
    
    public function update($categoria,$parent=0)
    {
        if($parent==0)
        {
            $id=$this->categoria2->get($categoria);
            $parent=$id==FALSE?0:$this->categoria2->get($id->parent)->parent;            
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
    
    public function show2($key,$path="")
    {
        $categorias=explode('%3A',$path);
        if($key==0)$key=count($categorias)-1;
        if($key==-1)$key=0;
        $categoria=$categorias[$key]==NULL?0:$this->categoria2->get(array('nombre'=>$this->fromUrl($categorias[$key])))->id;
        $path=$categorias[0];
        foreach ($categorias as $key2 => $value) 
        {
           if($key2==0)continue;
           else if($key2>=$key)break;
           
           $path.=$value==''?'':'%3A'.$value;
        }
        $this->show($categoria,$path);
    }
    private function show($categoria=0,$path="")
    {
        $data['categoria']=$categoria; 
        $data['categoriaNombre']=$categoria==0?"":$this->categoria2->get($categoria)->nombre; 
        
        $data['path']=explode(':',$this->fromUrl($path));
        $data['url']=base_url()."administracionCategorias"; 
        $data['titulo']="administracion Categorias"; 
        // Este head tiene un problema grande, el boostrap fue modificado por terceros, asi que debo comentarlo: LCM
        // echo @$this->load->view('template/head', $data, TRUE);
         $data['js']= @$this->load->view('template/javascript', $data, TRUE);
        // Para agilizar se agrego esto en el mismo archivo, se debe mirar como se corrige esto, considero que no podemos seguir haciendolo asi
        // echo @$this->load->view('administracionCategorias/assets',FALSE,TRUE); 
       
        $data['categorias']=$this->categoria2->get_all(array('parent'=>$categoria));
        echo @$this->load->view('administracionCategorias/items',$data,TRUE);
    }
    public function index()
    {
       $this->show();
    }
    
    public function fromUrl($s)
    {  
        $s=str_replace('%20',' ',$s);
        $s=str_replace('%5B','[',$s);
        $s=str_replace('%5D',']',$s);
        $s=str_replace('%3A',':',$s);
        $s=str_replace('%2F','/',$s);
        $s=str_replace('%2b','-',$s);
        $s=str_replace('%21','#',$s);
        $s=str_replace('%22','\"',$s);
        $s=str_replace('%3D','=',$s);
        $s=str_replace('%3F','?',$s);
        $s=str_replace('%26','&',$s);
        $s=str_replace('%40','@',$s);        
        
        $s=str_replace('%C3%A1','á',$s);
        $s=str_replace('%C3%A9','é',$s);
        $s=str_replace('%C3%AD','í',$s);
        $s=str_replace('%C3%B3','ó',$s);
        $s=str_replace('%C3%BA','ú',$s);
        $s=str_replace('%AA',',',$s);
        #echo $s;
        return $s;
    }
}