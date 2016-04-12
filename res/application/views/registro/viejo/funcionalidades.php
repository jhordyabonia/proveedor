<script type="text/javascript">
                    function verificar_attime(obj)
                    {
                      var popup=new XMLHttpRequest();
                    var url_popup="<?=base_url()?>registro/verificar/"+obj.value+"/"+obj.name;
                    if(obj.name=='nit')
                    { url_popup="<?=base_url()?>registro/verificar/"+obj.value+"/"+obj.name+"/empresa_new";  }
                    popup.open("GET", url_popup, true);
                    popup.addEventListener('load',show,false);
                    popup.send(null);
                    function show()
                      {
                        div=document.getElementById('err_'+obj.name);
                        if(div.innerHTML!=""){return;};
                        console.log(popup.response);
                        if(popup.response=="0")
                        { div.innerHTML='<span class="glyphicon glyphicon-ok-sign boton-verificar2-ok"></span>';  }
                        else
                          { div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  }
                       }
                    } 
                    function verificar_largo(obj,max)
                    {                        
                        div=document.getElementById('err_'+obj.name);
                        if(obj.value.length>max)
                        { div.innerHTML='<span class="glyphicon glyphicon-ok-sign boton-verificar2-ok"></span>';  }
                        else
                        { div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  }
                    } 
                    function verificar_formato(obj)
                    {                        
                        div=document.getElementById('err_'+obj.name);
                        if(obj.value.indexOf("@")!=-1&&obj.value.indexOf(".")!=-1)
                        { div.innerHTML='<span class="glyphicon glyphicon-ok-sign boton-verificar2-ok"></span>';  }
                        else
                        { div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  }
                    }
                    function verificar_igualdad(obj1,obj2)
                    {                        
                        div=document.getElementById('err_'+obj1.name);
                        if(obj1.value==obj2.value)
                        { div.innerHTML='<span class="glyphicon glyphicon-ok-sign boton-verificar2-ok"></span>';  }
                        else
                        { div.innerHTML='<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';  }
                    }
                    
                    function cambio_pais()
                    {
                        if(document.getElementById('pais').value=="52")
                        {                   
                           document.getElementById('provincia').style.display='';
                           document.getElementById('municipio').style.display='';
                           return;
                        }
                                            
                        document.getElementById('provincia').style.display='none';
                        document.getElementById('municipio').style.display='none';
                                            
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
