<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}



class Tienda extends CI_Controller {

	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
        $this->b2b="";
        $this->b2b_id=0;
        
       	$this->load->model('new/Usuarios_model','usuarioB2B');
        #$usuario =$this->usuarioB2B->get($this->session->userdata('id_usuario'));
        #if(!($usuario->permisos==1))redirect(base_url(),'refresh');
        
		$this->bit=FALSE;
       	$this->load->model('new/Producto_tienda_model','producto_tienda');
       	$this->load->model('new/Empresa_model','empresaB2B');
        $this->javascript="
            <script>
                function selected(da)
                {
                        div=document.getElementById('div_b2c');
                        div.innerHTML=' Cargando...';
                        var popup=new XMLHttpRequest();
                        popup.open('GET', '".base_url()."tienda/empresaB2C/'+da, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);

                        function show()
                        {
                            div.innerHTML='Tienda selecionada <br>'+popup.response;
                            console.log(popup.response);
                        }
                }
                function asistente(id)
                { 
                    document.getElementById('div'+id).style.display='none';
                    document.getElementById('div'+(id+1)).style.display=''; 
                 }
                function printr(val)
                { 
                    
                    var list = document.getElementsByTagName('input');
                    for(var i=0; i<list.length;i++)
                        if(list[i].type=='checkbox')
                                list[i].checked=val;
                }
                
                function link(obj,reffer)
                   {
                        document.getElementById('display'+reffer).innerHTML=' Cargando...';
                        var popup=new XMLHttpRequest();
                        popup.open('GET', '".base_url()."tienda/empresaB2B/'+obj.value, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);

                        function show()
                        {
                            document.getElementById('display'+reffer).innerHTML=popup.response;
                            console.log(popup.response);
                        }
                    }
                    
                function categoria(value)
                   {
                        var sub = document.getElementById('sub');
                        sub.innerHTML='Cargando...';
                        var popup=new XMLHttpRequest();
                        popup.open('GET', '".base_url()."tienda/categorias/'+value, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);

                        function show()
                        {
                            sub.innerHTML=popup.response;
                            console.log(popup.response);
                        }
                    }
            </script>";
        $this->css_x="<style>
                HTML 
                {
                background-image: url(".base_url()."uploads/background_tienda.png);
                background-repeat: repeat-x;
                background-color: #000;
                -webkit-text-size-adjust: none;
                }
                </stylee>";
        $this->css="
            <style>
                .categoria
                {
                    float:right;
                    padding-right:5%;
                }
                .HTMl 
                {
                background-image: url(".base_url()."uploads/background_tienda.png);
                background-repeat: repeat-x;
                background-color: #000;
                -webkit-text-size-adjust: none;
                }
                input
                {
                    color:black!important;
                }
                .continuar
                {
                    float: right;
                    font-size: 18px;
                    margin-right: 3%;
                    margin-bottom: 1%;
                }
                .next
                {
                    float: left;
                    margin-left: -16%;
                    font-size: 53px;
                    z-index: 2;
                    position: absolute;
                }
                .h 
                {
                    padding-top:10%;
                }
                .asistente
                {
                    position: absolute;
                    min-height: 290px!important;
                    top: 15%;
                    left: 22%;
                    width: 60%;
                    box-shadow: rgba(0,0,0,0.6) -36px 118px 10px 340px;
                    border: 2px solid;
                    border-radius: 25px;
                    background-color: #fff;
                }
                .a{
                  margin-top:5px;  
                  margin-bottom:5px;  
                }
                .bit{
                  color:white;
                  background-color:lightgray;
                }
                .t{
                    
                }
            </style>";
    }
        
    public function copy($value='')
    {
        chmod (APPPATH.'../../robots1.txt',0777);
        echo "a";        
       # copy(APPPATH.'../../wp-content/uploads/2016/03/GUANTES.png',APPPATH.'../uploads/tienda.jpg');
        copy(APPPATH.'../../robots1.txt',APPPATH.'../uploads/robots1.txt');
        echo "b";
    }
    function index()
    {                
         $this->asistente();
    }
    public function productos_empresa($b2c="FALSE",$b2b="FALSE",$page=0,$per_page=30)#producto
    {
        if($b2c=="FALSE")
            $productos=$this->producto_tienda->get_all(array('post_type'=>'product'),'ID,post_title,post_author'); 
        else
            $productos=$this->producto_tienda->get_all(array('post_type'=>'product','post_author'=>$b2c),'ID,post_title,post_author'); 
        $tmp = array();        
        
        $this->producto_tienda->connect();
        $this->b2b=$this->empresaB2B_($b2b);
        
        if(!$b2c)$productos=$this->agrupar($productos);
        
        foreach ($productos as $key => $producto)
            if(($key>=($per_page*$page))&&($key<=(($per_page*($page+1)))))
                if(!is_null($producto))
                    $tmp[]=$producto;
        $productos=$tmp;
        
        $data=array('titulo'=>'Vaciado desde tienda','facebook'=>FALSE);
               
        echo  $this->load->view('template/head',$data,TRUE);
        echo  $this->load->view('template/javascript',FALSE,TRUE);
        echo  $this->css;
        echo  '<div class="row" style="padding-left:5%;heigth:150%">';
        echo  '<div class="col-md-14 col-xs-14 col-lg-14 ">';
            echo  form_open_multipart("tienda/insert/$b2b/");
                echo $this->print_nav_bar($page,$page!=0,count($productos)>($per_page-1),$per_page,"tienda/productos_empresa/$b2c/$b2b/");
                $this->categorias();
                echo '<div class="row">';
                echo @$this->print_product(); 
                foreach ($productos as $key => $producto) 
                    echo @$this->print_product($this->load($producto->ID,'get'));                    
                    #echo @$this->print_product($producto);                    
                echo '</div>'; 
                echo $this->print_nav_bar($page,$page!=0,count($productos)>($per_page-1),$per_page,"tienda/productos_empresa/$b2c/$b2b/");               
            echo  form_close();
        echo '</div>';
        echo '</div>';
        echo  $this->javascript;
        echo  $this->load->view('template/footer_empy',FALSE,TRUE);
        return; 
    }
    public function categorias($id=FALSE)
    {  
        #$data=array('titulo'=>'Vaciado desde tienda','facebook'=>FALSE);      
        #echo  $this->load->view('template/head',$data,TRUE);
        #echo  $this->load->view('template/javascript',FALSE,TRUE);
        #echo  $this->javascript;
        $out="<div class='categoria'><b>";
        
        !$id?
        $this->load->model('new/Categoria_model','categoria'):
        $this->load->model('new/Subcategoria_model','categoria');
        #$this->producto_tienda->connect();
        
        $categorias=!$id?$this->categoria->get_all():$this->categoria->get_all(array('id_categoria'=>$id));
        $out.=!$id?"</b>Seleccione los datos de destino<br><b>":'';
        $out.=!$id?"Categoria":"Subcategoria";
        $out.="</b><br><select ".(!$id?"onchange='categoria(this.value)'":"name='b2b'").">";
        foreach ($categorias as $key => $value) 
            $out.="<option value='".(!$id?$value->id_categoria:$value->id_subcategoria).
            "'>".(!$id?$value->nombre_categoria:$value->nom_subcategoria)."</option>";
         $out.="</select>";
         $out.="<p id='sub'></p></div>";
         echo $out;
    } 
    function producto($id)#producto
    {
        echo "<PRE>";
        print_r($this->load($id));  
        echo "</PRE>";          
    }
    function print_nav_bar($page=0,$back=FALSE,$next=FALSE,$per_page=20,$url)
    {
        $url=base_url().$url;
        $out= '<div class="row">';
            $out.= "<br><br>";
            $out.= '<div aling="center" class="col-md-4 col-md-4 col-md-4 ">';
            $out.=  '<div style="float:left"><input id="t" type="checkbox" onclick="printr(this.checked)"><label for="t"> Marcar/Desmarcar todos</label></div>';
            $out.= '</div>';
            $out.= '<div class="col-md-4 col-md-4 col-md-4 ">';
            $out.=  form_submit(array('value'=>'Registrar','class'=>'btn btn-default a'));
            $out.= '</div>';
        
            $out.= '<div class="col-md-4 col-md-4 col-md-4 ">';
            if($back)$out.= '<a class="btn btn-default a" href="'.$url.($page-1)."/$per_page\"> Atras<a>";
            $out.="<b>Pagina: $page</b>";
            if($next)$out.= '<a class="btn btn-default a" href="'.$url.($page+1)."/$per_page\"> Siguiente<a>";
            $out.= '</div>';
            $out.= "<br><br>";
            
        $out.= '</div>';
        return $out;        
    }
    function print_product($producto=FALSE)#producto
    {
        $tmp->t=$producto;
        if($producto==FALSE)
        {
            $tmp->ID=0;
            $tmp->t=FALSE;            
            $tmp->usuario->display_name="<h4>Origen</h4>";
            $tmp->post_title="<h4>Producto</h4>";
            $tmp->guid='';
            $producto=$tmp;            
        }
         $url=base_url().'tienda/producto/';
         $this->bit=!$this->bit;
         $out= '';         
         if($this->bit)
            $out.= '<div class="col-md-11 col-md-11 col-md-11 ">';
         else
            $out.= '<div class="bit col-md-11 col-md-11 col-md-11">';
           
         $out.= '<div class="col-md-1 col-md-1 col-md-1 ">';
           if($tmp->t!=FALSE)$out.= form_input(array('name'=>'news[]','type'=>'checkbox','value'=>$producto->ID));
         $out.= '</div>';
         
         $out.= '<div class="col-md-3 col-md-3 col-md-3 ">';
         $out.= '<b> '.$producto->usuario->display_name.' </b>';
         $out.= '</div>';         
         
         $bd2_id=$this->b2b_id;         
         $out.= '<div class="col-md-3 col-md-3 col-md-3 ">'; 
         $out.= $tmp->t!=FALSE?"<a target='other' href='".base_url()."empresa/inicio/$bd2_id'>":'';        
         $out.= $tmp->t==FALSE?"<h4>Destino</h4>":$this->b2b;        
         $out.= $tmp->t!=FALSE?"</a>":'';        
         #$out.= '<a href="'.$url.$producto->ID.'">';
         # $out.= $this->B2C_B2B($producto->usuario->user_login,'nombre');
         #$out.= '</a>';
         $out.= '</div>';
         
         $out.= '<div class="col-md-3 col-md-3 col-md-3 ">';         
         if($producto->guid=='')$out.= '<a target="other" href="'.$url.$producto->ID.'">';
         else $out.= '<a href="'.$producto->guid.'">';
         $out.= $producto->post_title;
         $out.= '</a>';
         $out.= '</div>';
         
         
         $out.= '</div>';
         
         echo "<script>console.log('$producto->b2b')</script>";
         return $out;
    }
    public function subcategoria($b2b)
    {
        $this->producto_tienda->connect();        
        $e = $this->empresaB2B->get_($b2b);
        #echo "<PRE>";
        #print_r($e);
        #echo "<PRE>";
        return !$e?1:$e->subcategoria;
    }
    public function insert($b2b)#producto
    {
        $to_insert=$this->input->post('news');
        $subcategoria=$this->input->post('b2b');//$this->subcategoria($b2b);
        $subcategoria=!$subcategoria?$this->subcategoria($b2b):$subcategoria;
        if(is_array($to_insert))
        foreach ($to_insert as $key => $b2c) 
            {
                $p=$this->transformB2B($b2c,$b2b);
                $p->subcategoria=$subcategoria?$subcategoria:4001;
                $to_insert[$key]=$p;
                unset($p);                
            }
        #echo "<PRE>";
        #print_r($to_insert);
        #echo "<PRE>";
        #return;
        $this->db->close();
        $this->load->database('default');
        $this->db->reconnect();
        $this->load->model('new/Producto_model','productoT');
        $imagenes="";
        foreach ($to_insert as $key => $producto) 
        {
            $imagenes.=$producto->imagenes.',';
            $img_tmp="";
            foreach(explode(',',$producto->imagenes) as $key=> $img_raw)
            {
                $part_img_raw=explode('/',$img_raw);
                $img_tmp=$part_img_raw[count($part_img_raw)-1].',';
            }
            $producto->imagenes=$img_tmp;
            
            $id=$this->productoT->insert($producto);
                if($id)
                    echo "<br><a target='other' href=\"".base_url()."producto/ver/".$id."\">".$producto->nombre."</a> Registrado con exito";
         }
         #echo "<PRE>";
         #print_r($to_insert);
         #redirect(base_url()."uploads/tienda/exce.php/$imagenes",'refresh');
         $a=base_url()."uploads/tienda/exce.php/$imagenes";
         echo "<p id='h'>
         Si tiene AdBlock, o algún plug-in que impida abrir pesteñas de forma automática, click 
         <a target='other' href='$a' id='a'>aquí</a>
         para iniciar la copia de imagenes. </p>
         <script>
                document.getElementById('a').click();         
                window.onload=function(e)
                {
                        div=document.getElementById('h');
                        div.innerHTML='Iniciciando copia de imagenes';
                        var popup=new XMLHttpRequest();
                        popup.open('GET', '$a', true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);

                        function show()
                        {
                            div.innerHTML='<div ><br>'+popup.response+'</div>';
                        }
                }
          </script>";
    }
    #Este metodo busca laempresa correspondiente en proveedor, con el id de producto de la tienda.
    function Producto_id_idB2B($id)#producto
    {        
        $out=$this->load($id);
        $email=$this->search('billing_email',$out->empresa);
        
        $this->producto_tienda->connect();
        $tmp=explode('|',$this->empresaB2B($email,FALSE)); 
        #echo "<PRE>";
        #print_r($out);
        #echo "</PRE>";
        return $tmp[0];       
    }
    #devuelve el correspondiente value de la empresa vicnculada a la tienda.
    function B2C_B2B($b2c,$value='id')#empresa
    {
        $this->producto_tienda->connect();
        return $this->empresaB2B->get(array('tienda'=>$b2c))->$value;
    } 
    function empresaB2B($value,$id=TRUE)#empresa
    {   
        if($id)
        {
            #$this->producto_tienda->connect();
            $e = $this->empresaB2B->get($value);
        }
        else
        {
            $u = $this->usuarioB2B->get(array('email'=>$value));
            if(!$u) return '|';
            $e = $this->empresaB2B->get(array('usuario'=>$u->id));
        }
        if(!$e) $out = '|Empresa no encontrada.';
        else if($e->nombre!="") $out=$e->nombre.',<b> Nit: </b>'.$e->nit;
        
        echo $id?$out:'';
        return !$e?$out:$e->id.'|'.$out; 
    }
    function empresaB2B_($value)#empresa
    {   
        $e = $this->empresaB2B->get_($value);
        
        if(!$e) $out = 'Empresa no encontrada.';
        else if($e->nombre!="") $out=$e->nombre.',<b> Nit: </b>'.$e->nit;
        #echo $out;
        
        
        $this->b2b_id=$value;      
        
        return $out; 
    }
    function empresaB2C($value,$id=TRUE)#empresa
    {   
        $e=FALSE;
        if($id)
            $e = $this->producto_tienda->get($value,'wp_users');
            #$e = $this->producto_tienda->get_all(array('user_id'=>$value),'*','wp_usermeta','ID,user_login');
        
        if(!$e) $out = '|Tienda no encontrada.';
        else if($e->display_name!="") $out=$e->display_name.',<b> Id: </b>'.$e->ID;
        
        echo $id?$out:'';
        return !$e?$out:$e->ID.'|'.$out; 
    }
    public function empresa($page=0,$per_page=50)#empresa
    {        
        $empresas = $this->producto_tienda->get_all(NULL,'*','wp_users','ID,user_login');
        $numero_destacados=0;
        $tmp = array();
        
        $this->producto_tienda->connect();
        foreach ($empresas as $key => $empresa)
        {
          if(($key>=(($per_page*$page)+$numero_destacados))&&($key<=((($per_page*($page+1))+$numero_destacados))))
          {
            if(is_null($empresa))continue;
            
            $empresa->b2b=$this->empresaB2B($empresa->user_email,FALSE);
            $tmp[]=$empresa;
          }
        }   
        $empresas=$tmp;
        #echo "<PRE>";
        #print_r($empresas);
        #echo "<PRE>";        
        $bit=FALSE;
        $url=base_url();
        
        $data=array('titulo'=>'Vaciado desde tienda','facebook'=>FALSE);
        echo  $this->load->view('template/head',$data,TRUE);
        echo  $this->load->view('template/javascript',FALSE,TRUE);
        echo $this->css;

        echo '<div style="padding-left:5%;heigth:150%">';
        echo  form_open_multipart('tienda/linkEmpresa');                       
        echo $this->print_nav_bar($page,$page!=0,count($empresas)>($per_page-1),$per_page,'tienda/empresa/');
        foreach ($empresas as $key => $empresa) 
        {
            $bit=!$bit;
            $out= '';         
            if($bit)
            $out.= '<div class="col-md-11 col-md-11 col-md-11 ">';
            else
            $out.= '<div class="bit col-md-11 col-md-11 col-md-11">';
                
                
            $out.= '<div class="col-md-1 col-md-1 col-md-1 ">';
            $out.= form_input(array('type'=>'checkbox','name'=>'if[]','value'=>$empresa->user_login));
            $out.= '</div>'; 
            
            $out.= '<div class="col-md-3 col-md-3 col-md-3 ">';
            $out.= form_input(array('id'=>'b2c$key','type'=>'hidden','name'=>'b2c[]','value'=>$empresa->user_login));
            $out.= "<b> $empresa->display_name </b>";
            $out.= '</div>';
            
            $tmp=explode('|',$empresa->b2b);
            
            $out.= '<div class="col-md-1 col-md-1 col-md-1 ">';
            $out.= form_input(array('size'=>'6','name'=>'b2b[]','onchange'=>"link(this,$key)",'value'=>$tmp[0]));
            $out.= '</div>';            
            
            $out.= '<div id="display'.$key.'" class="col-md-6 col-md-6 col-md-6 ">';
            $out.=$tmp[1];  
            $out.= '</div>';
            
            $out.= '</div>';
            echo $out;
        }         
        echo $this->print_nav_bar($page,$page!=0,count($empresas)>($per_page-1),$per_page,'tienda/empresa/');
        
        echo  form_close();
        echo  '</div>';
        
        echo $this->javascript;
        
    }
    public function linkEmpresa()#empresa
    {   
        $ifs=$this->input->post('if');
        $b2b=$this->input->post('b2b');
        $b2c=$this->input->post('b2c');
        if($ifs==NULL)$ifs='';
        else $ifs=implode(',',$ifs);
        #echo $ifs;
        #return;
        
        $count=0;
        foreach($b2b as $key=>$id)
        {
            if(str_replace($b2c[$key],'',$ifs)==$ifs)continue;
            $t=$this->empresaB2B->get($id);
            if(!$t)continue;
            $count++;
            $result=$this->empresaB2B->update(array('tienda'=>$b2c[$key]),$b2b[$key]);
            #if($result)
            $tmp=explode('.',$b2c[$key]);
            echo '<br><b><a target="proveedor" href="'.base_url().'empresa/inicio/'.$t->id."\">$t->nombre</a></b>";
            echo '<a target="tienda" href="http://tienda.proveedor.com.co/proveedor/'.$tmp[0]."\"> vinculada</a>";
        }
        echo "<h2>$count Vinculos generados</h2>";
        echo "<a href='".base_url()."tienda'> Registrar Productos</a>";
    }
    public  function registro()
    {
      $b2b=$this->input->post('b2b');
      $b2c=$this->input->post('b2c');
      $this->productos_empresa($b2c,$b2b);
    }
    public function asistente()
    {
        $data=array('titulo'=>'Vaciado desde tienda','facebook'=>FALSE);
        echo  $this->load->view('template/head',$data,TRUE);
        echo  $this->load->view('template/javascript',FALSE,TRUE);
        echo $this->css_x;
        echo $this->css;
        
        echo  form_open_multipart('tienda/registro',array('name'=>'f'));        
        echo '<div align="center" id="div0" class="asistente">';        
        echo '<img src="'.base_url().'uploads/logos/default.png">
                <h1>
                Bienvenido al asistente de registrar/publicar productos desde la tienda</h1>
                <div class="row"> 
                    <div class="col-md-6 col-xs-6 col-lg-6">
                    <img src="http://tienda.proveedor.com.co/wp-content/uploads/2016/04/logo-1.png"></div>
                    <div class="col-md-6 col-xs-6 col-lg-6">
                    <span class="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </span>
                    <img src="'.base_url().'assets/img/index/logo_proveedor.png"></div>
                 </div>
                 <div align="center" class="row" >
                    <a class="continuar" href="javascript:asistente(0)"> Continuar <span class="glyphicon glyphicon-chevron-right"></span></a>
                 </div>';
          echo '</div>';
                 
        echo @$this->printEmpresasB2C();          
        echo @$this->printEmpresasB2B();
        echo  form_close();
        
        echo @$this->javascript; 
        
    }
    function printEmpresasB2C()
    {   
        $out= '<div align="center" id="div1" class="asistente" style="display:none">';
        $out.= '<h1 class="h">Seleccione la tienda desde la cual obtener los productos</h1>';
        $out.='<select name="b2c" onchange="selected(this.value)" >';
        $empresas = $this->producto_tienda->get_all(NULL,'*','wp_users','ID,user_login');
        foreach ($empresas as $key => $empresa)
        {
            $nombre=$this->producto_tienda->get(array('meta_key'=>'dokan_profile_settings','user_id'=>$empresa->ID),'wp_usermeta','umeta_id')->meta_value;
            $nombre=explode('"',$nombre);
            $nombre=$nombre[3]==''?$empresa->display_name:$nombre[3];
            $out.='<option value="'.$empresa->ID.'">'.$nombre.'</option>';
        }
        $out.='</select>';
        $out.=' <div align="center" class="row" >
                        <br><br>
                    <a class="continuar" href="javascript:asistente(1)"> Continuar <span class="glyphicon glyphicon-chevron-right"></span></a>
                 </div> ';
         $out.=  '</div>';
        return $out;
    }
    function printEmpresasB2B()
    {
        $out.= '<div align="center" id="div2" class="asistente" style="display:none">';
        $out.= '<h3 id="div_b2c"></h3>';
        $out.= '<h1 class="h">Seleccione la empresa destino, en el portal porveedor.com.co; a la que se agregaran los productos </h1>';
        $out.='<select name="b2b">';
        $this->producto_tienda->connect();
        $empresas=$this->empresaB2B->get_all();
        foreach ($empresas as $key => $empresa)
        {
            $out.='<option value="'.$empresa->id.'">'.$empresa->nombre.'</option>';
        }
        $out.='</select>';
        $out.=' <div align="center" class="row" >
                        <br><br>
                    <a class="continuar" href="javascript:document.f.submit();"> Continuar <span class="glyphicon glyphicon-chevron-right"></span></button>
                 </div> ';
        $out.=  '</div>';
                 
        return $out;
    }
    private function search($needs,$stack,$key_need='meta_key',$value_need='meta_value')
    {
        if(!is_array($needs))$needs=array(''=>$needs);
        foreach ($needs as $key => $need) 
            foreach ($stack as $key => $value)
            if(is_object($value))
               { if($value->$key_need==$need)return $value->$value_need;}
            else if(is_array($value)) 
                {if($value[$key_need]==$need)return $value->$value_need;}
                
        foreach ($stack as $key => $value)
        {
            if(!is_object($value)&&!is_array($value))continue;
            $var=$this->search($need,$value,$key_need,$value_need);
            if($var!=FALSE)return $var;
        }
        return FALSE; 
    } 
    public function agrupar($in)
    {
        $out=array();
        $tmp=array();
        foreach ($in as $key => $post)
            $tmp[$post->post_author][]=$post;
            
        foreach ($tmp as $key => $value)
           foreach ($value as $key1 => $value1)
            $out[]=$value1;
         
         return $out;
    }
    public function load($id,$function='get')#producto
    {
        $out=$this->producto_tienda->get($id);
        $out->data=$this->producto_tienda->load($id);
        $out->data2=$this->producto_tienda->get_all(array('post_parent'=>$id,'post_type'=>'attachment'));
        #$out->data2=$this->producto_tienda->load($out->post_type,'wp_term_taxonomy','taxonomy');
        #$out->data=array_merge($out->data,$this->producto_tienda->load($id,'wp_term_relationships','object_id'));
        $out->usuario=$this->producto_tienda->$function($out->post_author,'wp_users','ID');
        $out->empresa=$this->producto_tienda->$function($out->post_author,'wp_usermeta','user_id');
        #echo "<PRE>";
        #print_r($out);
        return $out;
    }
    public function transformB2B($id=null,$b2b="FALSE")#producto
    {   
        $producto=$this->load($id);
        $out->nombre=$producto->post_title;
        $out->tienda=$producto->guid;
        $out->descripcion=$producto->post_excerpt;
        $out->palabras_clave=$producto->post_content;
        $out->precio_unidad=$this->search('_price',$producto->data);
        $out->medida= 1;
        $out->formas_de_pago='A convenir';
        $this->producto_tienda->connect();
        $out->empresa=$b2b=="FALSE"?$this->B2C_B2B($producto->usuario->user_login):$b2b;
        
        $tmp='';
        $imgs = $this->producto_tienda->get_all(array('post_parent'=>$id,'post_mime_type'=>'image/jpeg'),'guid');
        if(!($imgs==FALSE))
            foreach($imgs as $key=>$img)
                $tmp.=str_replace('http://tienda.proveedor.com.co/','',$img->guid).',';
              
        $imgs=$this->producto_tienda->get_all(array('post_parent'=>$id,'post_mime_type'=>'image/png'),'guid');
        if(!($imgs==FALSE))
            foreach($imgs as $key=>$img)
                $tmp.=str_replace('http://tienda.proveedor.com.co/','',$img->guid).',';
                
        $imgs = $this->producto_tienda->get_all(array('post_parent'=>$id,'post_mime_type'=>'image/gif'),'guid');
        
        if(!($imgs==FALSE))
            foreach($imgs as $key=>$img)
                $tmp.=str_replace('http://tienda.proveedor.com.co/','',$img->guid).',';
        
        $imgs = $this->producto_tienda->get_all(array('post_id'=>$id,'meta_key'=>'_wp_attached_file'),'meta_value','wp_postmeta');
        foreach($imgs as $key => $img)
           $tmp.="wp-content/uploads/".$img->meta_value.',';        
                  
        $out->imagenes=$tmp==''?'default.jpg':substr($tmp,0,strlen($tmp)-1); 
        
        #echo "<PRE>";
        #print_r($out);
        #echo 0;
        
        $out->estado="nuevo";
        return $out;        
    }
    function testQ($id)
    {    
        #$productos = $this->producto_tienda->get_all(NULL,'*','wp_posts','ID');
        echo "<PRE>";
        #print_r($empresas);
        #/*
        #foreach ($productos as $key => $producto)
        $tmp='';
        {    
            $imgs = $this->producto_tienda->get_all(array('post_id'=>$id,'meta_key'=>'_wp_attached_file'),'meta_value','wp_postmeta');
            foreach($imgs as $key => $img)
                $tmp.="wp-content/uploads/".$img->meta_value.',';        
       
#            $imgs = $this->producto_tienda->get_all(array('post_id'=>$producto->ID,'meta_key'=>'_wp_attached_file'),'meta_value','wp_postmeta');
            print_r($imgs);
        }
        echo $tmp;#*/
    }
}?>