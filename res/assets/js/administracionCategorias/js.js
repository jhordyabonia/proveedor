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
    popup.open('GET', url+'/make/'+nueva_categoria+'/'+categoria_parent, true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
       var id=popup.response;            
    
        html="<div id='div<"+id+"' align='center' class='caja col-md-3 col-xs-3 col-lg-3'" ;
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
        html+= "</div>";
        console.log(html);
        var hidden= document.createElement('div');
        hidden.innerHTML=html;
        document.getElementById('main').appendChild(hidden.children[0]);   
    }         
}
function up(categoria,parent)
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/update/'+categoria+'/'+parent, true);
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