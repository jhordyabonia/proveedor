var x = 0;
	function pasar () {
		if(x!=5){
	var indice = document.forms[0].categoria.options.selectedIndex;
	document.forms[0].categorias.value = document.forms[0].categoria.options[indice].text+'\n'+document.forms[0].categorias.value;
	x +=1;
}else{
	document.getElementById('msj').innerHTML += "Solo 5 categorias.";
	document.getElementById('categoria').disabled=true;
	}
} 
