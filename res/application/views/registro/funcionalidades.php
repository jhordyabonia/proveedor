<script type="text/javascript">
                    var fails=1;
                    var content_paso3;
                    var name;
                    var nit;
                    var tipo_empresa;
                    var descripcion;
                    var prod_prin;
                    var prod_int;
                    var categorias= Array();
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

                        for(var a=0;a<categorias.length;a++)
                            {document.getElementById(categorias[a]).checked=true;}
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
                        verificar(document.getElementById('sectores'));                        
                    }

                    function marcar_categoria(id)
                    {
                        paso=0;
                        for(paso=0;paso<categorias.length;paso++)
                        {
                            if(categorias[paso]==id)
                            {break;}
                        }

                        if(paso<categorias.length)
                        {
                            content_paso3=content_paso3.replace("<input type='hidden' name='categorias[]' value='"+id+"'>",'');
                            categorias[paso]=0;
                        }else
                        {
                            content_paso3+="<input type='hidden' name='categorias[]' value='"+id+"'>";
                            categorias[categorias.length]=id;
                        }
                    }
                    
                    function load_new_logo()
                    {
                        delete_logo();
                        var paths = document.getElementById('btn_archivos').files;
                        var navegador = window.URL || window.webkitURL;
                        var url = navegador.createObjectURL(paths[0]);
                        document.getElementById('logo').src=url; 
                        document.getElementById('eliminar_img').style.display=""; 
                        var err=true;
                        if(paths[0].name.indexOf('.jpeg')!=-1){err=false;}
                        else if(paths[0].name.indexOf('.jpg')!=-1){err=false;}
                        else if(paths[0].name.indexOf('.png')!=-1){err=false;}
                        else if(paths[0].name.indexOf('.JPEG')!=-1){err=false;}
                        else if(paths[0].name.indexOf('.JPG')!=-1){err=false;}
                        else if(paths[0].name.indexOf('.PNG')!=-1){err=false;}
                        if(err)
                        {document.getElementById('err_logo').style.display=""; }
                        else 
                        {document.getElementById('logo').style.display="";}
                    } 
                    function delete_logo()
                    {
                        document.getElementById('logo').style.display="none";  
                        document.getElementById('eliminar_img').style.display="none"; 
                        document.getElementById('err_logo').style.display="none"; 
                        //document.getElementById('txt_alt').style.display=""; 
                    }
                    function limpiar(obj)
                    {
                        //document.getElementById('err_'+obj.name).innerHTML="";
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        document.getElementById('msj_err_'+obj.name).innerHTML="";
                    }
                    function verificar(obj)
                    {
                        var div=document.getElementById('err_'+obj.name);
                        if(div!=null)
                        {div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';}

                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        if(div_msj!=null)
                        {document.getElementById('parent_msj_err_'+obj.name).style.display='none';}  

                       // fails=0;                                         
                    }
                    function validar()
                    {
                        fails=0;
                        var inputs=document.registro.elements;
                        for(var i=0; i<inputs.length-1;i++)
                        { verificar_requerido(inputs[i]);}
                        //{ verificar_requerido(inputs[0]);}
                        
                        function verificar_requerido(obj)
                        {  
                            if(obj.type=="radio"||obj.type=="button")
                                { return;}
                            

                            var necessary = obj.ondblclick!=null;
                            var div=document.getElementById('err_'+obj.name);
                            var div_msj=document.getElementById('msj_err_'+obj.name);

                            if(fails!=0)
                                {return;}
                            if(!necessary)
                                {return;}
                            div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                            document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                            
                            if(obj.value==''||(obj.type=="select-one"&&obj.value=='0'))
                            {                                 
                                err="<i style='font-size:12px;font-family:Arial:'>Campo requerido</i><br>";
                                div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                                if(div_msj.innerHTML.indexOf(err)==-1)
                                {    div_msj.innerHTML=err;  }
                                document.getElementById('parent_msj_err_'+obj.name).style.display='';
                                fails=1;
                            }
                        } 
                        
                        if(document.getElementById('radio')!=null)
                        {
                            if(document.getElementById('radio').checked&&fails==0)
                            {document.registro.submit();}
                        }else if(fails==0)
                        {document.registro.submit();}
                    }
                    
                    function verificar_caracteres(obj,caracteres)
                    {                        
                        //fails=0;
                        var max=0;
                        var space="";
                        crt_exclude="";

                        if(fails!=0)
                        {return;}
                        
                        tmp=caracteres.split('|');
                        
                        if(tmp.length==2)
                        {
                            caracteres=tmp[0];
                            crt_exclude=tmp[1];
                        }
                        
                        print=caracteres;
                        
                        if(caracteres.indexOf("[SPACE]")!=-1)
                        {
                            space=" espacios o ";
                            caracteres=caracteres.replace("[SPACE]"," ");
                        }
                        if(caracteres.indexOf("[NUM]")!=-1)
                        {
                            caracteres=caracteres.replace("[NUM]","1234567890");
                        }

                        if(caracteres.indexOf("[ALPHA]")!=-1)
                        {
                            caracteres=caracteres.replace("[ALPHA]","abcdefghijklmnñopqrstvuwxyzABCDEFGHIJKLMNÑOPQRSTVUWXYZ");
                        }  

                        if(caracteres.indexOf("[SYM]")!=-1)
                        {
                            caracteres=caracteres.replace("[SYM]","~°!¡´#$%&/()=?¿{}[]*+,-.:;_@<>|¬`^\\'\"");
                        } 
                        if(caracteres.indexOf("[ACUTE]")!=-1)
                        {
                            caracteres=caracteres.replace("[ACUTE]","áéíóúàèìòùñýÁÉÍÓÚÂÊÎÔÛÝÑ");
                        } 
                        if(crt_exclude!="")
                        {
                            for(var i=0;i<crt_exclude.length;i++)
                            {
                                do{
                                caracteres=caracteres.replace(crt_exclude[i],'');
                                }while(caracteres.indexOf(crt_exclude[i])!=-1);
                            }                        
                        } 
                        
                        for(var i=0; i<caracteres.length;i++)
                        {
                            if(caracteres[i]==' '&&space==null)
                            { continue;}
                            if(obj.value.indexOf(caracteres[i])!=-1)
                            {max=1; break;}                            
                        }

                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(max!=0)
                        {                                 
                            err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" tiene caracteres no permitidos "+print;
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1;
                        }                       
                    }  
                    function verificar_attime(obj)
                    {
                        fails=0;
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
                                    fails=1;
                                }
                            }
                        }
                    } 
                    function verificar_largo(obj,max)
                    {                        
                        fails=0;
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(obj.value.length<max)
                        {                                 
                            err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" debe contener, por lo menos "+max+" caracteres</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1;
                        }
                    }  
                    function verificar_largo_max(obj,max)
                    {                        
                        //fails=0;
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        //div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                        //document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(obj.value.length>max)
                        {                                 
                            err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" debe contener, máximo "+max+" caracteres</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1;
                        }
                    }                    
                    function verificar_formato(obj)
                    {                        
                        fails=0;
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        if(obj.value.indexOf("@")!=-1&&obj.value.indexOf(".")!=-1)
                            {  
                               div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok"></span>';
                               document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                            }
                            else
                            { 
                               err="<i style='font-size:12px;font-family:Arial:'>El formato de "+obj.name+"  no es correcto. Ej.usuario@dominio.com</i><br>";
                               div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  
                               if(div_msj.innerHTML.indexOf(err)==-1)
                               {    div_msj.innerHTML=err;  }
                               document.getElementById('parent_msj_err_'+obj.name).style.display='';
                               fails=1;
                            }
                    }
                    function verificar_igualdad(obj1,obj2)
                    {                        
                        fails=0;
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
                            fails=1;
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
                           cambio_departamento(0);
                           return;
                        }
                        
                        document.getElementById('ubicacion').style.display='none';
                        document.getElementById('ubicacion2').style.display='none';
                        document.getElementById('provincia').style.display='none';
                        document.getElementById('municipio').style.display='none';
                        document.getElementById('required_municipio').style.display='none';
                        document.getElementById('required_provincia').style.display='none';
                                            
                        document.getElementById('provincia').value=33;
                        cambio_departamento(33);
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
                            if(id==33)
                            {document.getElementById('municipio').value=1113;}
                            else
                            {document.getElementById('municipio').value=0;}
                            fails=0;
                          }
                    }                                     
   </script>
   <link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">