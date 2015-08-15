var x = 0;
function pasar () { alert("dd");
if(x==0){ 
var indice = document.forms[0].categoria.options.selectedIndex;
document.forms[0].categorias.value = document.forms[0].categoria.options[indice].text;
} 

}

///cuenta la cantidad de clics que se hacen en el multiselect
window.onload = function(){
    var contador = 0;
    document.getElementById("categoria").onclick = function(){
      contador++;
      if(contador==1){ 
      var indice = document.forms[0].categoria.options.selectedIndex;
		document.forms[0].categorias.value = document.forms[0].categoria.options[indice].text;   	
		}
        }}




