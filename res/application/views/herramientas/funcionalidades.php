<script type="text/javascript">
function change(nombre,id)
{
	switch(nombre)
	{
		case 'departamento':
				get('<?=base_url()?>herramientas/municipios/'+id, nombre);
				alert(id);
				break;
		case 'categoria':
				get('<?=base_url()?>herramientas/subcategorias/'+id, nombre);
				break;
		default:
	}
}

 function get(url, id_content) 
 {
    var nav=new XMLHttpRequest();
    nav.open("GET", url, true);
    nav.addEventListener('load',show,false);
    nav.send(null);
    
    function show()
    {
    	document.getElementById(id_content).style.display='';
        content=document.getElementById(id_content);
        content.innerHTML=nav.response;        
        console.log(nav.response);
    }
 }

</script>