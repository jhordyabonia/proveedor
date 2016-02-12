<script type="text/javascript">
                    var active_validation=true;
                    var stack_err="";
                    var fails=1;
                    var content_paso3;
                    var name;
                    var nit;
                    var tipo_empresa;
                    var descripcion;
                    var prod_prin;
                    var prod_int;
                    var categorias= Array();
                    categorias[0]=38;
                    paso=1; 
                    function iniciar_registro()
                    {
                        document.getElementById('popup_launch').click();
                        switch(paso)
                                {
                                    case 1: paso1(); break;                       
                                    case 2: paso2(); break;                       
                                    case 3: paso3(); break;                       
                                    default: paso1(); break;
                                }
                    }
                    function paso1()
                    {
                        document.getElementById('paso3').style.display='none';
                        document.getElementById('paso2').style.display='none';
                        document.getElementById('paso1').style.display='';
                        paso=1;
                    }
                    function paso2()
                    {
                        document.getElementById('paso1').style.display='none';
                        document.getElementById('paso3').style.display='none';
                        document.getElementById('paso2').style.display='';
                       
                        paso=2;
                    }
                    function paso3()
                    {               
                        document.getElementById('paso2').style.display='none';
                        document.getElementById('paso1').style.display='none';
                        document.getElementById('paso3').style.display='';
                        paso=3;
                    }
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
                        content_paso3=document.getElementById('paso3').innerHTML;
                        document.getElementById('paso3').innerHTML=document.getElementById('content_categorias').innerHTML;

                        for(var a=0;a<categorias.length;a++)
                            {document.getElementById(categorias[a]).checked=true;}
                    }

                    function ocultar_categorias()
                    {
                        var data='<span class="glyphicon glyphicon-pencil" style="font-size: 24px;left: -1px;"></span>Registrar Empresa';
                        document.getElementById('title').innerHTML=data;
                        document.getElementById('content_categorias').innerHTML=document.getElementById('paso3').innerHTML;
                        document.getElementById('paso3').innerHTML=content_paso3;
                        
                        document.getElementById('name').value=name;
                        document.getElementById('nit').value=nit;
                        document.getElementById('tipo_empresa').value=tipo_empresa;
                        document.getElementById('descripcion').value=descripcion;
                        document.getElementById('prod_prin').value=prod_prin;
                        document.getElementById('prod_int').value=prod_int;
                        document.getElementById('sectores').value="Ver o cambiar selección";
                        verificar(document.getElementById('sectores'));
                        fails=0;                        
                    }

                    function marcar_categoria(id)
                    {
                        /*Revisar codigo para eliminar categorias
                        content_paso3+="<input type='hidden' name='categorias[]' value='"+id+"'>";
                        console.log("<input type='hidden' name='categorias[]' value='"+id+"'>");
                        */
                        nun_categorias=0;
                        for(nun_categorias=0;nun_categorias<categorias.length;nun_categorias++)
                        {
                            if(categorias[nun_categorias]==id)
                            {break;}
                        }

                        if(nun_categorias<categorias.length)
                        {
                            content_paso3=content_paso3.replace("<input type='hidden' name='categorias[]' value='"+id+"'>",'');
                            categorias[nun_categorias]=0;
                        }else
                        {
                            content_paso3+="<input type='hidden' name='categorias[]' value='"+id+"'>";
                            categorias[categorias.length]=id;
                        }
                    }
                    
                    function load_new_logo()
                    {
                        //delete_logo();
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
                        {stack_err="logo";document.getElementById('err_logo').style.display=""; }
                        else 
                        {document.getElementById('logo').style.display="";}
                    } 
                    function delete_logo()
                    {
                        document.getElementById('logo').style.display="none";  
                        document.getElementById('eliminar_img').style.display="none"; 
                        document.getElementById('err_logo').style.display="none"; 
                        document.getElementById('btn_archivos').files=0;
                        document.getElementById('btn_archivos').value='';
                        if(stack_err=="logo"&&fails==1)
                        {
                            fails=0;
                            stack_err="";
                        }
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
                        {div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';}

                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        if(div_msj!=null)
                        {document.getElementById('parent_msj_err_'+obj.name).style.display='none';}  
                        if(stack_err.indexOf(obj.name)!=-1)
                            { fails=0; }
                    }
                    function eliminar_espacios(obj)
                    {
                        do
                        {
                            obj.value=obj.value.replace(' ','');
                        }while(obj.value.indexOf(' ')!=-1);
                    }
                    function validar(step, count)
                    {
                        //fails=0;
                        var inputs=document.registro.elements;
                        var i=0;
                        if(count==0)
                        {   count=inputs.length;    }
                        for( i=0; i<count;i++)
                        { 
                            if(inputs[i]==null||inputs[i].type=="radio"||inputs[i].type=="hidden"||inputs[i].type=="button")
                                { continue; }
                           
                            if(!verificar_requerido(inputs[i]))
                                { break; }
                        }
                        console.log(inputs[i]);
                        console.log(i);
                        //{ verificar_requerido(inputs[0]);}
                        
                        function verificar_requerido(obj)
                        {  
                            var necessary = obj.ondblclick!=null;
                            var div=document.getElementById('err_'+obj.name);
                            var div_msj=document.getElementById('msj_err_'+obj.name);

                            if(fails!=0)
                                {return false;}
                            if(!necessary)
                                {return true;}
                            div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                            document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                            
                             var msj_err="Campo requerido";

                            if(obj.name=="radio")
                               { msj_err="Debe aceptar los términos y condiciones de uso."}
                           else if(obj.name=="sectores")
                               { msj_err="Debe seleccionar por lo menos 1 sector de empresa."}

                            if(obj.value==''||(obj.type=="select-one"&&obj.value=='0')||(obj.name=="radio"&&!obj.checked))
                            {                                 
                                err="<i style='font-size:12px;font-family:Arial:'>"+msj_err+"</i><br>";
                                div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                                if(div_msj.innerHTML.indexOf(err)==-1)
                                {    div_msj.innerHTML=err;  }
                                document.getElementById('parent_msj_err_'+obj.name).style.display='';
                                fails=1;
                                stack_err="requerido: "+obj.name;
                                return false;
                            }
                            return true;
                        } 
                        switch(step)
                        {
                            case 1:
                                if(fails==0&&i==count)
                                    {paso2();}
                                break;
                            case 2: 
                                if(fails==0&&i==count)
                                    {paso3();}
                                break;
                            default:
                                if(document.getElementById('radio').checked&&fails==0&&i==count)
                                {document.registro.submit();}
                                break;
                        }
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
                        div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(max!=0)
                        {   
                             var msj_err="El "+obj.name+" tiene caracteres no permitidos "+print

                            if(obj.name=="password")
                               { msj_err="La contreseña tiene caracteres no permitidos (caracteres con tilde)."}
                                                           
                            err="<i style='font-size:12px;font-family:Arial:'>"+msj_err;
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1; stack_err="caracteres: "+obj.name;
                        }                       
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
                                div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"><bd></bd></span>';
                                fails=0;
                                document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                                if(popup.response!="0")
                                {
                                    err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+": "+obj.value+" Ya se encuentra registrado!<bd></bd></i><br>";
                                    div.innerHTML='<span name="err" class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                                    if(div_msj.innerHTML.indexOf(err)==-1)
                                    {    div_msj.innerHTML=err;  } 
                                    document.getElementById('parent_msj_err_'+obj.name).style.display='';
                                    fails=1; stack_err="attime: "+obj.name;
                                }
                            }
                        }
                    } 
                    function verificar_largo(obj,max)
                    {
                        /*if(stack_err.indexOf("largo")!=-1&&fails==1)
                        {
                            stack_err="";
                        }*/
                            fails=0;
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                        document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(obj.value.length<max)
                        {         
                            var msj_err="El "+obj.name;          
                           if(obj.name=="password")
                               { msj_err="La contraseña"}
                                         
                            err="<i style='font-size:12px;font-family:Arial:'>"+msj_err+" debe contener, por lo menos "+max+" caracteres</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1; stack_err="largo: "+obj.name;
                        }
                        //stack_err='';
                    }  
                    function verificar_largo_max(obj,max)
                    {                        
                        //fails=0;
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        //div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                        //document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                        if(obj.value.length>max)
                        {                                 
                            err="<i style='font-size:12px;font-family:Arial:'>El "+obj.name+" debe contener, máximo "+max+" caracteres</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                            {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj.name).style.display='';
                             fails=1;  stack_err="largo_max: "+obj.name;
                        }
                    }                    
                    function verificar_formato(obj)
                    {                        
                        var div=document.getElementById('err_'+obj.name);
                        var div_msj=document.getElementById('msj_err_'+obj.name);
                        if(obj.value.indexOf("@")!=-1&&obj.value.indexOf(".")!=-1)
                            {  
                               fails=0;
                               div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                               document.getElementById('parent_msj_err_'+obj.name).style.display='none';
                            }
                            else
                            { 
                               err="<i style='font-size:12px;font-family:Arial:'>El formato de "+obj.name+"  no es correcto. Ej.usuario@dominio.com</i><br>";
                               div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                               div_msj.innerHTML=err; 
                               document.getElementById('parent_msj_err_'+obj.name).style.display='';
                               fails=1; stack_err="formato: "+obj.name;
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
                            fails=0;
                            div.innerHTML='<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
                            document.getElementById('parent_msj_err_'+obj1.name).style.display='none';
                        }
                        else
                        { 
                            err="<i style='font-size:12px;font-family:Arial:'>Las contraseñas no coinciden</i><br>";
                            div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok validacion_error"></span>';  
                            if(div_msj.innerHTML.indexOf(err)==-1)
                               {    div_msj.innerHTML=err;  }
                            document.getElementById('parent_msj_err_'+obj1.name).style.display='';
                            fails=1; stack_err="igualdad: "+obj1.name;
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
                            if(active_validation)
                            {
                               document.getElementById('required_municipio').style.display='';
                               document.getElementById('required_provincia').style.display='';
                            }
                           cambio_departamento(0); 
                           return;
                        }
                        
                        document.getElementById('ubicacion').style.display='none';
                        document.getElementById('ubicacion2').style.display='none';
                        document.getElementById('provincia').style.display='none';
                        document.getElementById('municipio').style.display='none';
                        if(active_validation)
                        {
                            document.getElementById('required_municipio').style.display='none';
                            document.getElementById('required_provincia').style.display='none';
                        }
                                            
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
                            {
                                //document.getElementById('provincia').value=33;
                                document.getElementById('municipio').value=1113;
                            }
                            else
                            {document.getElementById('municipio').value=0;}
                            fails=0;  stack_err="cambio_departamento: "+id;
                          }
                    }        
                     function launch(obj)
                    {
                        var popup=new XMLHttpRequest();
                                              
                        var url_popup="<?=base_url()?>registro/get";    
                        //alert(url_popup);                             
                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);
                        function show()
                          {
                            div=document.getElementById('registro');
                            div.innerHTML=popup.response;
                            document.getElementById('popup_launch').click();
                            //console.log(popup.response);
                            obj.href="JavaScript:iniciar_registro();";
                          }
                    }      
                    function login(obj,reffer)
                   {
                        var popup=new XMLHttpRequest();
                        var url_popup="<?=base_url()?>logueo/popup/"+reffer;

                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);

                        function show()
                        {
                            cotizar=document.getElementById('div_login');
                            console.log(popup.response);
                            cotizar.innerHTML=popup.response;
                            obj.href="JavaScript:document.getElementById('auto_launch').click();";
                            document.getElementById('auto_launch').click();
                        }
                    }

                    function decimal_point(obj)
                    {                        
                        tmp=obj.value;
                        while(tmp.indexOf('.')!=-1)
                            {tmp=tmp.replace('.','');}

                        while(tmp.indexOf(' ')!=-1)
                            {tmp=tmp.replace(' ','');}

                        var decimal=Array(parseInt(""+tmp.length/3));
                        var i=0;
                        while(tmp.length>2)
                        {
                            decimal[i]=tmp.substring(tmp.length-3, tmp.length);
                            tmp=tmp.replace(decimal[i],'');
                            i++;
                        }
                        out=tmp;
                        for(a=i-1;a>=0;a--)
                            out+='.'+decimal[a];

                        if(out.indexOf('.')==0)
                            {out=out.replace('.','');}

                        obj.value=out.replace(' ','');
                    }
                                             
   </script>
<!-- Agregado por Carlos Martinez (Activa los link para compartir en redes sociales) -->
<script type="text/javascript">
 $(document).ready(function(){
    $('.share').ShareLink({
        title: 'My great post', // title for share message
        text: 'text of my great post', // text for share message
        image: 'http://www.proveedor.com.co/assets/img/facebook-banner/facebook-banner-catalogo-default.png', // optional image for share message (not for all networks)
        url: location.href, // link on shared page
        // class_prefix: 's_', // optional class prefix for share elements (buttons or links or everything), default: 's_'
        width: 700, // optional popup initial width
        height: 480 // optional popup initial height
    });
    $('.counter').ShareCounter({
        url: location.href
    });
});
</script>

<div id="div_login" ></div>
<div id="registro" ></div>