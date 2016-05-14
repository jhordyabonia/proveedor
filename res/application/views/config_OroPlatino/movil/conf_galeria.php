
<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-child"></i>
					Galería de imagenes
				 </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                                      
						<?=form_open_multipart(base_url().'editar_empresa/imagenes')?>
					<div class="titles">
						<h3 class="text-title-up">Subir imagenes de la Empresa</h3>
						<div class="conten-paso3">
							<p class="agreagar-text3">Agregar imagenes de la empresa a la página de inicio (Maximo 20 imagenes).</p>
                            <div id="content-img" class="col-md-12 col-xs-12 col-lg-12 ">
                                <?php foreach($imagenes as $key => $imagen):?>
                                <?php if($imagen==''){continue;}?>
                                     <div align="center" class="img-content black col-md-3 col-lg-3 col-xs-3">                                         
                                        <a id="link<?=$key?>";  href="javaScript:remove_img(<?=$key?>)">
                                            <span class="borrar">X</span>
                                        </a>
                                        <a href="javaScript:document.getElementById('input<?=$key?>').click();">
                                            <img id="galeria<?=$key?>" class="img" src=<?=verificar_imagen('uploads/imagenes/'.$imagen)?>>
                                        </a>
                                        <input class="titulo_img input-editing"  placeholder="Titulo de la imágen" name="titulos[]" value="<?=$titulos[$key]?>">
                                        <div style="display:none"><input id="input<?=$key?>" type="file" name="imagenes[]" alt="<?=$imagen?>" onchange="show_img(<?=$key?>);"></div>
                                     </div>
                                 <?php endforeach;?>
                                 <?php if($key<20):?>
                                    <div id="last" align="center" class="img-content simg col-md-3 col-lg-3 col-xs-3">
                                        <a href="javaScript:add_img();">
                                          <h4 class="img-subit-titulo">Subir imagen <i class="ico-up glyphicon glyphicon-open"></i> </h4>
                                        </a>
                                    </div>
                                    <input id="imagenes_eliminadas"  name="imagenes_eliminadas" type="hidden">
                                    
                                 <?php endif;?>
                            </div>
                            <script>
                                var id_global=<?=$key;?>;
                                function show_img(id)
			                    {   
                                    var input;             
                                    if(id.type=='change')
                                     input =id.target;
                                    else
                                     input = document.getElementById("input"+id);
			                        var paths = input.files;
			                        var navegador = window.URL || window.webkitURL;
			                        var url = navegador.createObjectURL(paths[0]);
                                    id=input.id.replace('input','');
                                    var img=document.getElementById('galeria'+id);
                                    img.src= url;
                                    
                                    img.parentElement.parentElement.className="img-content black col-md-3 col-lg-3 col-xs-3";
                                    if(document.getElementById('link'+id)!=null)
                                    img.parentElement.parentElement.removeChild(document.getElementById('link'+id));  
                                     
                                    if(input.alt=="")return;
                                    document.getElementById('imagenes_eliminadas').value+=','+input.alt;
                                    input.alt="";                                 
	                    		}
                                function remove_img(id)
                                {                                
                                    //if(document.getElementById('link'+id)!=null)return;
                                    var a = document.createElement('a');
                                    a.href="javaScript:document.getElementById('input"+id+"').click();";
                                    a.id="link"+id;                              
                                    var h = document.createElement('h4');
                                    h.className="img-subit-titulo"
                                    h.textContent=" Subir imagen";                              
                                    var i = document.createElement('i'); 
                                    i.className="ico-up glyphicon glyphicon-open";
                                    var img=document.getElementById('galeria'+id);
                                    img.src= '';
                                    a.appendChild(h);
                                    h.appendChild(i);
                                    img.parentElement.parentElement.appendChild(a);
                                    img.parentElement.parentElement.className="img-content white col-md-3 col-lg-3 col-xs-3";
                                    document.getElementById("input"+id).files=null;
                                    input = document.getElementById("input"+id);
                                    if(input.alt=="")return;
                                    document.getElementById('imagenes_eliminadas').value+=','+input.alt;
                                    input.alt="";
                                }
                                function add_img()
                                {
                                    var id=id_global+1;
                                    
                                    doc=document.getElementById('content-img');   
                                    last=document.getElementById('last');    
                                    
                                    var  div1=document.createElement('div');
                                    div1.className="img-content white col-md-3 col-lg-3 col-xs-3";
                                    if(id < 20 )                               
                                        {div1.innerHTML=last.innerHTML;} 
                                     else
                                        {div1.className="";}
                                    div1.align="center"; 
                                    last.innerHTML="";
                                    last.id="";
                                    div1.id="last";                                                                      
                                    
                                    var a_remove = document.createElement('a');
                                    a_remove.href="javaScript:remove_img("+id+");";
                                    var span = document.createElement('span');
                                    span.textContent="X";
                                    span.className="borrar";
                                    
                                    var a = document.createElement('a');
                                    a.href="javaScript:document.getElementById('input"+id+"').click();";
                                    
                                    var img = document.createElement('img');
                                    img.id="galeria"+id;
                                    img.className="img";
                                    
                                    var input = document.createElement('input');
                                    input.className="titulo_img input-editing";
                                    input.placeholder="Titulo de la imágen";
                                    input.name="titulos[]";
                                                                        
                                    var div2=document.createElement('div');
                                    div2.style.display='none';
                                    
                                    var inputFile = document.createElement('input');
                                    inputFile.id="input"+id;
                                    inputFile.type="file";
                                    inputFile.name="imagenes[]";                                           
                                    
                                    a_remove.appendChild(span);
                                    last.appendChild(a_remove);
                                    
                                    a.appendChild(img);
                                    last.appendChild(a);
                                    last.appendChild(input); 
                                    div2.appendChild(inputFile);
                                    last.appendChild(div2);                                   
                                    
                                    doc.appendChild(div1);
                                    
                                    inputFile.click();  
                                    inputFile.onchange=show_img;   
                                    //remove_img(id);
                                    id_global=id;    
                                }
                            </script>
                                
                            <style>
                                .simg
                                {                                    
                                    background-color: white;
                                }
                                .img-subit-titulo
                                {
                                   padding-top: 22%;
                                   color: black;
                                }
                                .borrar
                                {
                                   position: absolute;
                                    padding: 5px;
                                    right: 0PX;
                                    z-index: 1;
                                    background-color: rgba(0,0,0,0.1);
                                    color:white;
                                }
                                .titulo_img
                                {
                                    position: absolute;
                                    bottom: 0px;
                                    left: 0px;
                                    z-index: 1;
                                    width: 100%;
                                }
                                .input-editing 
                                {
                                    background-color: rgba(0,0,0,0.3);
                                    color: white;
                                    border: none;
                                    text-align:center;
                                }
                                .img-content
                                {                                   
                                    height: 139px;
                                    width: 214px;
                                    border: 3px solid white;
                                }
                                .black{background-color: rgb(0, 0, 0);}
                                .white{background-color: white;}
                                .whitesmoke{background-color: rgb(245, 245, 245);}
                                .img
                                {
                                   max-height:100%;                                    
                                   max-width:100%;                                   
                                   padding: 2%;
                                   padding-top: 10%;
                                }
                            </style>
							
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>						
    					<?=form_close()?>
	
                </div><!-- /.box-body -->
              </div>