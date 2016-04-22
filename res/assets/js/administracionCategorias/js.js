function dragstart(caja, evento) 
{ event.dataTransfer.setData('Data', caja.id);    }

function drop(target, evento)
{
    var caja = event.dataTransfer.getData('Data');
    //target.appendChild(document.getElementById(caja));
    up(caja.replace('div',''),target.id.replace('div',''));
    
    //document.getElementById(caja).remove();
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