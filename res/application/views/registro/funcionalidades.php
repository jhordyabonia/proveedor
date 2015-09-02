<script type="text/javascript">
                    var content_paso3;
                    var name;
                    var nit;
                    var tipo_empresa;
                    var descripcion;
                    var prod_prin;
                    var prod_int;
                    function mostrar_categorias()
                    {
                        var data = "<a href='JavaScript:ocultar_categorias()'><<<  <span></span></a>";
                        name=document.getElementById('name').value;
                        nit=document.getElementById('nit').value;
                        tipo_empresa=document.getElementById('tipo_empresa').value;
                        descripcion=document.getElementById('descripcion').value;
                        prod_prin=document.getElementById('prod_prin').value;
                        prod_int=document.getElementById('prod_int').value;
                        
                        document.getElementById('title').innerHTML='<i class="fa fa-list-ul"> </i> Categorias';
                        content_paso3=document.getElementById('content_paso3').innerHTML;
                        document.getElementById('content_paso3').innerHTML=document.getElementById('content_categorias').innerHTML;
                    }

                    function ocultar_categorias()
                    {
                        var data='<span class="glyphicon glyphicon-pencil" style="font-size: 24px;left: -1px;"></span>Registrar Empresa';
                        document.getElementById('title').innerHTML=data;
                        document.getElementById('content_categorias').innerHTML=document.getElementById('content_paso3').innerHTML;
                        document.getElementById('content_paso3').innerHTML=content_paso3;
                        document.getElementById('sectores').value="Ver o cambiar selección";
                        
                        document.getElementById('name').value=name;
                        document.getElementById('nit').value=nit;
                        document.getElementById('tipo_empresa').value=tipo_empresa;
                        document.getElementById('descripcion').value=descripcion;
                        document.getElementById('prod_prin').value=prod_prin;
                        document.getElementById('prod_int').value=prod_int;
                        
                    }

                    function marcar_categoria(id)
                    {
                        content_paso3+="<input type='hidden' name='categorias[]' value='"+id+"'>";
                    }
                    
                    function load_new_logo()
                    {
                        var paths = document.getElementById('btn_archivos').files;
                        var navegador = window.URL || window.webkitURL;
                        var url = navegador.createObjectURL(paths[0]);
                        console.log(url);
                        document.getElementById('logo').src=url; 
                        document.getElementById('logo').style.display="";
                        document.getElementById('eliminar_img').style.display=""; 
                        //document.getElementById('txt_alt').style.display="none"; 
                    } 
                    function delete_logo()
                    {
                        document.getElementById('logo').style.display="none";  
                        document.getElementById('eliminar_img').style.display="none"; 
                        //document.getElementById('txt_alt').style.display=""; 
                    }
                    function limpiar(obj)
                    {
                        //document.getElementById('err_'+obj.name).innerHTML="";
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        document.getElementById('msj_err_'+obj.name).innerHTML="";
                    }
                    function verificar_attime(obj)
                    {
                        var popup=new XMLHttpRequest();
                        var dato=obj.value.replace('@','ARROBA');
                        var url_popup="<?=base_url()?>registro/verificar/"+dato+"/"+obj.name;
                        if(obj.name=='nit')
                        { url_popup="<?=base_url()?>registro/verificar/"+dato+"/"+obj.name+"/empresa";  }
                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);
                                
                        function show()
                        {
                            var div=document.getElementById('err_'+obj.name);
                            var div_msj=document.getElementById('msj_err_'+obj.name);
                            if(div_msj.innerHTML.indexOf("<bd></bd>")!=-1||div_msj.innerHTML=="")
                            {
                                div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"><bd></bd></span>';
                                document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                                if(popup.response!="0")
                                {
                                    err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+": "+obj.value+" Ya se encuentra registrado!<bd></bd></i><br>";
                                    div.innerHTML='<span name="err" class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                                    if(div_msj.innerHTML.indexOf(err)==-1)
                                    {    div_msj.innerHTML=err;  } 
                                    document.getElementById('parent_msj_err_'+obj.name).style.display='';
                                }
                            }
                        }
                    } 
                    function verificar_largo(obj,max)
                    {                        
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(obj.value.length<max)
                        {                                 
                            err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" debe tener, minímo "+max+" caracteres</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                        }
                    } 
                    function verificar_formato(obj)
                    {                        
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        if(obj.value.indexOf("@")!=-1&&obj.value.indexOf(".")!=-1)
                            {  
                               div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                               document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                            }
                            else
                            { 
                               err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" no tiene el formato debido. ejem: usuario@dominio.com</i><br>";
                               div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                               if(div_msj.innerHTML.indexOf(err)==-1)
                               {    div_msj.innerHTML=err;  }
                               document.getElementById('parent_msj_err_'+obj.name).style.display='';
                            }
                    }
                    function verificar_igualdad(obj1,obj2)
                    {                        
                        var div=document.getElementById('err_'+obj1.name);
                        var div_msj=document.getElementById('msj_err_'+obj1.name);
                                                        
                        if(obj2.value==""||obj1.value=="")
                        {return;}

                        if(obj1.value==obj2.value)
                        {                        
                            div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                            document.getElementById('parent_msj_err_'+obj1.name).style.display='none';
                        }
                        else
                        { 
                            err="<i style='font-size:12px;font-family:Arial:'>Las contraseñas no coinciden</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                               {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj1.name).style.display='';
                        }
                    }
                    /*
                    window.onload=init();
                    function init()
                    {
                        var popup=new XMLHttpRequest();
                        var url_popup="<?=base_url()?>";
                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);
                        function show()
                          {
                            div=document.getElementById('index');
                            div.innerHTML=popup.response;
                            console.log(popup.response);
                         }
                    }
                    */
                    function cambio_pais()
                    {
                        if(document.getElementById('pais').value=="52")
                        {                   
                           document.getElementById('ubicacion').style.display='';
                           document.getElementById('ubicacion2').style.display='';
                           document.getElementById('provincia').style.display='';
                           document.getElementById('municipio').style.display='';
                           document.getElementById('required_municipio').style.display='';
                           document.getElementById('required_provincia').style.display='';
                           return;
                        }
                        
                        document.getElementById('ubicacion').style.display='none';
                        document.getElementById('ubicacion2').style.display='none';
                        document.getElementById('provincia').style.display='none';
                        document.getElementById('municipio').style.display='none';
                        document.getElementById('required_municipio').style.display='none';
                        document.getElementById('required_provincia').style.display='none';
                                            
                        document.getElementById('provincia').value=33;
                        document.getElementById('municipio').value=1113;
                    }

                    function cambio_departamento(id)
                    {
                        var popup=new XMLHttpRequest();
                        var url_popup='<?=base_url()?>registro/municipio_select/'+id;
                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);
                        function show()
                          {
                            div=document.getElementById('municipio');
                            div.innerHTML=popup.response;
                          }
                    }                                     
   </script>
   <link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">