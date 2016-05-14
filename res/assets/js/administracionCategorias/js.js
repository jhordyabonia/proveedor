function dragstart(caja, evento) 
{ event.dataTransfer.setData('Data', caja.id);    }

function drop(target, evento)
{
    var caja = event.dataTransfer.getData('Data');
    //target.appendChild(document.getElementById(caja));
    up(caja.replace('div',''),target.id.replace('div',''));
    
    //document.getElementById(caja).remove();
}    
  
function make()
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/make/'+toUrl(nueva_categoria)+'/'+categoria_parent, true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
       var id=popup.response;            
    /*
        html="<div id='div"+id+"' align='center' class='caja col-md-3 col-xs-3 col-lg-3'" ;
        html+=   "draggable='true' ondragstart='dragstart(this, event)' ondrop='drop(this, event)'";
        html+=    " ondragenter='return false' ondragover='return false'>";
        html+=     "<a href='"+url+"/show/"+id+"'>";
        html+=         "<div class='col-md-8 col-xs-8 col-lg-8'>";
        html+=             "<span class='glyphicon glyphicon-folder-open directori'></span><br>"+nueva_categoria;
        html+=         "</div>";
        html+=     "</a>";
        html+=     "<div class='col-md-4 col-xs-4 col-lg-4'>";
        html+=     "<div class='funciones'>";
        html+=             "<a onclick='up("+id+")'><span class='glyphicon glyphicon-upload'></span>Subir</a>";
        html+=             "<a onclick='del("+id+")'><span class='glyphicon glyphicon-trash'></span>Eliminar</a>";
        html+=         "</div>";
        html+=    "</div>";      
        html+= "</div>";*/
        
        html= "<dl  id='div"+id+"'  class='list-group-item' draggable='true' ondragstart='dragstart(this, event)' ondrop='drop(this, event)' ondragenter='return false' ondragover='return false' onclick='this.classList.add('active')'>";
        html+= "    <a href='"+url+"/show2/0/"+path+"%3A"+categoriaNombre+"%3A"+nueva_categoria+"'>";
        html+= "        <div class='pull-left'>";
        html+= "            <dt>"+nueva_categoria+"</dt>";
        html+= "        </div>";
        html+= "    </a> ";
        html+= "    <div class='pull-right'>";
        html+= "      <div class='btn-group'>";
        html+= "        <a onclick='up("+id+")' class='btn btn-success'>";
        html+= "            <i class='fa fa-arrow-up fa-fw fa-2x' aria-hidden='true'></i>";
        html+= "        </a>";
        html+= "       </div>";
        html+= "        <div class='btn-group'>";
        html+= "          <a onclick='del("+id+")' class='btn btn-danger'>";
        html+= "            <i class='fa fa-trash fa-fw fa-2x' aria-hidden='true'></i>";
        html+= "          </a>";
        html+= "        </div>";
        html+= "         <div class='btn-group'>"
        html+= "                                            <a class='launch_edit btn btn-success' id='launch_edit_"+id+"'>";
        html+= "                                                <i class='fa fa-pencil-square-o fa-2x' aria-hidden='true'></i>";
        html+= "                                            </a>";
        html+= "                                        </div>";
        html+= "                                    </div>     "; 
        html+= "                                 <div class='col-md-12' id='div_edit_"+id+"'>";
        html+= "                                    <form action='"+url+"/update2/"+id+"' method='post' accept-charset='utf-8' enctype='multipart/form-data'>"; 
        html+= "                                            <br>";
        html+= "                                            <p>Nombre categoria:</p>";                 
        html+= "                                                <div class='col-xs-12 input-group'>";
        html+= "                                                    <input type='text' class='form-control' placeholder='Ingrese el nombre de la categoria' name='nombre_"+id+"' value='"+nueva_categoria+"'>";
        html+= "                                                </div>";
        html+= "                                            <p >Descripcion:</p>";
        html+= "                                            <div class='col-xs-12 input-group'>";
        html+= "                                                <textarea class='form-control caja_mensaje' rows='4' name='descripcion_"+id+"'></textarea>";
        html+= "                                            </div>";
        html+= "                                            <div class='col-md-12 input-group enviar'>";
        html+= "                                                <input type='submit' class='btn btn-default center-block boton_enviar' value='Guardar' onclick=''>";
        html+= "                                            </div>";
        html+= "                                            <br>";
        html+= "                                     </form>";
        html+= "                                   </div>";
                             
        html+= "      <div class='clearfix'></div>";
        html+= "      </dl>";
        var hidden= document.createElement('div');
        hidden.innerHTML=html;
        document.getElementById('main').appendChild(hidden.children[0]);
        
        var t=document.getElementsByName('nombre_'+id);
        t.item(0).focus();   
    }         
}
function up(categoria,parent)
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/update/'+categoria+'/'+toUrl(parent), true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
        if(popup.response!='0')
            alert(popup.response);
         else
            document.getElementById('div'+categoria).remove();            
    }
}

function del(categoria)
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/delete/'+categoria, true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
        if(popup.response!='0')
            alert(popup.response);
         else
            document.getElementById('div'+categoria).remove();
    }
}

 function toUrl(s)
{
        while(s.indexOf(' ')!=-1)
            s=s.replace(' ','%20');
        while(s.indexOf('[')!=-1)
            s=s.replace('[','%5B');
        while(s.indexOf(']')!=-1)
            s=s.replace(']','%5D');
        while(s.indexOf(':')!=-1)
            s=s.replace(':','%3A');
        while(s.indexOf('/')!=-1)
            s=s.replace('/','%2F');
        while(s.indexOf('-')!=-1)
            s=s.replace('-','%2b');
        while(s.indexOf('\"')!=-1)
            s=s.replace('\"','%22');
        while(s.indexOf('\#')!=-1)
            s=s.replace('\#','%21');
        while(s.indexOf('=')!=-1)
            s=s.replace('=','%3d');
        while(s.indexOf('?')!=-1)
            s=s.replace('?','%3F');
        while(s.indexOf('&')!=-1)
            s=s.replace('&','%26');
        while(s.indexOf('@')!=-1)
            s=s.replace('@','%40');
        while(s.indexOf(',')!=-1)
            s=s.replace(',','%vx');
                     
        return s;
}