function dragstart(caja, evento) 
{ event.dataTransfer.setData('Data', caja.id);    }

function drop(target, evento)
{
    var caja = event.dataTransfer.getData('Data');
    target.appendChild(document.getElementById(caja));
}
function reload()
{
              //location.href='#';
}           

function update(categoria,parent)
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/update/'+categoria+'/'+parent, true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
        if(popup.response!='0')
            alert(popup.response);
    }
}

function delete(categoria)
{
    var popup=new XMLHttpRequest();
    popup.open('GET', url+'/delete/'+categoria, true);
    popup.addEventListener('load',show,false);
    popup.send(null);

    function show()
    {
        if(popup.response!='0')
            alert(popup.response);
    }
}