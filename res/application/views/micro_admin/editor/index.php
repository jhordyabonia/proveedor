<html>
<head>
<script type="Text/JavaScript">

var cursor=false;
var stoped=false;
var editor="";
var timecursor=0;
var data="";
var focus=true;
var id_tag=0;
var	text_old="";
var editing=false;
var selection="";
var tags_stack="";
var tags_stack_end="";
var enter="\n<BR>";
setInterval(function(){update_preview()},250);

function update_preview()
{
	if(stoped)
	{ return;}
	if(editing)
	{ return;}

	data=document.getElementById('editor').value;
	if(focus)
	{	
		mostrar_cursor();
		document.getElementById("editor").focus();
	}
	if(data==document.getElementById('display').innerHTML)
		{	return;}
	depuar();
	document.getElementById('display').innerHTML=document.getElementById('editor').value;
	
	////console.log(document.getElementById('display').innerHTML);
	//get_focus();
}

function mostrar_cursor()
{	
	if(timecursor>2)
	{ 
		timecursor=0;
		if(cursor){	data+="<font color='black'>|</font>"}
		else{data=""+data.replace("<font color='black'>|</font>",'');}
		cursor=!cursor;
	}
	timecursor++;
}
function depuar()
{
	//eliminar etiquetas incompletas
	if(data.lastIndexOf('<')>data.lastIndexOf('>'))
	{data=""+data.substr(0,data.lastIndexOf('<')-1);}
	else{data=""+data;}
	
	document.getElementById('editor').value=data;
}
function get_focus(value)
{
	focus=value;
	//document.getElementById("editor").focus();
	
	//var selection=document.getSelection();
	//selection.outerHTML:
	//selection.outerText:
	////console.log(document.getSelection());
}
function newLine(elEvento)
{
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
  if(codigoCaracter==13)
  	{document.getElementById(editor).value+="</A>"+enter;}
  else if(codigoCaracter==32&&evento.shiftKey)
  	{document.getElementById(editor).value+="</A>"+tag("<TD>"); }

  cursor=false;
  data=document.getElementById('editor').value;
  data=""+data.replace("<font color='black'>|</font>",'');
  document.getElementById('editor').value=data+"<font color='black'>|</font>";
  //console.log(evento);
}
function numerar(tagg)
{
	var DOM = document.getElementsByTagName(tagg);
	for(var i=0; i<DOM.length; i++) 
	{		
		data=document.getElementById('editor').value.replace(DOM[i].innerHTML,tag(DOM[i].innerHTML)+"</A>");
		document.getElementById('editor').value=data;
  	}	
}
function tag(target)
{
	id_tag+=1;
	//return target;
	return "<A CLASS='tag' rel='tooltip' data-placement='right' title='editable' href='JavaScript:make_edit("+id_tag+")' ID='tag_"+id_tag+"'>"+target;
}
function make_edit(id_obj)
{
	obj=document.getElementById('tag_'+id_obj);
	
	if(editing||document.getElementById('display').innerHTML.indexOf('<textarea')!=-1)
		{return;}

	editing=true;
	document.getElementById('editor').value=document.getElementById('display').innerHTML;
	text_old=obj.innerText.replace("<font color='black'>|</font>",'');
	//obj.innerHTML="<input id='input_"+id_obj+"' onchange='change("+id_obj+")' onmouseout='change("+id_obj+")' value='"+text_old+"'/>";
	obj.innerHTML="<textarea rows='2' style='width:100%;' id='input_"+id_obj+"' onmouseout='catch_selection()' onclick='' onchange='change('input_'+"+id_obj+")'>"+text_old+"</textarea><br>";
	editor='input_'+id_obj;
	document.getElementById(editor).focus();
	console.log();
	///obj.href='';
}
function change(id_obj)
{	
	if(id_obj==""){return;}
	obj=document.getElementById(id_obj);
	data=document.getElementById('editor').value.replace(text_old,tags_stack+obj.value+tags_stack_end);
	document.getElementById('editor').value=data;
	editing=false;
	//id_obj.replace('input_','tag_');
	tags_stack="";
	tags_stack_end="";
}
var s=new Button("S");
var p=new Button("P");
var b=new Button("B");
var i=new Button("I");
var h1=new Button("H1");
var h2=new Button("H2");
var h3=new Button("H3");
var ul=new Button("UL");
var t=new Button("TABLE");
var center=new Button("CENTER");
var font=new Button("FONT");

function Button(l)
{	
	this.active=false;
	this.label=l; 
	this.click=click;
}

function catch_selection()
{	
	selection=document.getSelection().toString();
}
function click(obj,value)
{
	if(editing)
	{
		tags_stack+=tag("\n<"+this.label+" "+value+">");
		tags_stack_end+="\n</"+this.label+"></A>";
		//var tmp=document.getElementById(editor).value;
		//tmp=tmp.replace(selection,tag("\n<"+this.label+" "+value+" >"+selection+"</"+this.label+">"));
		//document.getElementById(editor).value=tmp;
		console.log(tags_stack);
		return;
	}
	if(this.active)
	{
		document.getElementById('editor').value+="\n</"+this.label+"></A>"+tag('<P>');
		if(this.label=="UL")
		{enter="\n<BR>";}
		else if(this.label=="TABLE")
		{enter="\n<BR>";}
		else if(this.label=="FONT"||this.label=="P")
		{document.getElementById('editor').value+=tag("\n<"+this.label+" "+value+">");}
		obj.style.color='black';
		focus=false;
	}else
	{
		document.getElementById('editor').value+=tag("\n<"+this.label+" "+value+">");
		if(this.label=="UL")
		{enter=tag("\n<LI>");}
		else if(this.label=="TABLE")
		{enter="\n<TR>"+tag("<TD>");}
		obj.style.color='gray';
		focus=true;
	}
	this.active=!this.active;
}

function delete_tag()
{
	var DOM = document.getElementsByTagName('a');
	//var DOM_TMP= Array();
	var id=1;
	for(var i=0; i<DOM.length; i++) 
	{		
		if(DOM[i].href.indexOf('make_edit')!=-1)
		{
			//var tmp = '<a class="tag" rel="tooltip" data-placement="right" title="editable" href="JavaScript:make_edit('+id+')" id="'+DOM[i].id+'">'+DOM[i].innerHTML+'</a>';
			//var tmp = '<a class="tag" rel="tooltip" data-placement="right" title="editable" href="JavaScript:make_edit('+id+')" id="'+DOM[i].id+'">'+DOM[i].innerHTML+'</a>';
			var tmp = "A CLASS='tag' rel='tooltip' data-placement='right' title='editable' href='JavaScript:make_edit("+id+")' ID='"+DOM[i].id+"'>"+DOM[i].innerHTML;
			id++;
			data=data.replace(tmp,DOM[i].innerHTML);
			//data=data.replace(tmp,'');
			//data=document.getElementById('display').innerHTML.replace(tmp,DOM[i].innerHTML);
			//return tmp;
			//console.log(tmp);
			//console.log(DOM[i]);
			//document.getElementById('guadar_plantilla').innerHTML+='<input type="hidden" name="DOM[]" id="DOM" value="'+i+'"">';
			//continue;
		}
		console.log(data);
		document.getElementById('editor').value=data;
		//document.getElementById('DOM').value=DOM_TMP;
  	}	
}

function add_var()
{
	var t=document.getElementsByClassName('var');
	for(var i=1; i<=t.length;i++)
	{
		var input= document.getElementById('input_var_'+i);
		var part=String.fromCharCode(36);
		var question=String.fromCharCode(63)
		if(input!=null)
		{	
			console.log("<::0=::1"+input.value+"::0>");
			document.getElementById('var_'+i).innerHTML="<::0=::1"+input.value+"::0>";	
		}
	}
}

function guardar()
{
	stoped=true;
	add_var();
	data=document.getElementById('display').innerHTML;
	delete_tag();
	document.getElementById('nombre_plantilla').value = document.getElementById('nombre_plantilla_tmp').value;
	alert("Desea guardar la plantilla "+document.getElementById('nombre_plantilla').value+"?\nRecuerde, que los mensajes, se enviaran con la ultima plantilla guardada.\nPuede guardar varias versiones de una plantilla, solo modificando el nombre antes de guardar" );
	document.guadar_plantilla.submit();
}


</script>
<style type="text/css">
.var
{
    background-color:inherit;
    color:inherit;
}
.tag
{
	text-decoration: none;
	color:inherit;
}
p
{	
  	background-color: inherit;
	text-decoration: inherit;
	color:inherit;
}
 .justify
{
	text-align:justify;
}
 .left
{
	text-align:left;
}
 .right
{
	text-align:right;
}
.tools
{
  position: absolute;
  top: 12%;
  left: 18%;
  height:20%;
  max-width: 59%; 
  width: 59%; 
  border-top: 1px solid black;
  border-right: 1px solid black;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  margin-bottom: 15px;
  padding-top: 8px;
  padding-left: 8px;
  padding-right: 8px;
  padding-bottom: 8px;
  background: -webkit-linear-gradient(top, #FFFFFF, whitesmoke);
  background: -moz-linear-gradient(top, #FFFFFF, whitesmoke);
  box-shadow: rgb(225,225,225) 5px 5px 5px;

}
#editor
{
opacity:0.01;
color:white;
}
.display
{
  box-shadow: rgb(225,225,225) 5px 5px 5px;
  overflow-y:scroll;
  background-color: white;
  position: absolute;
  top: 32%;
  left: 18%;
  height:inherit;
  width: 59%;
  min-height:63%;
  max-height:63%;
  max-width: 59%; 
  border-top: 1px solid black;
  border-right: 1px solid black;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  margin-top: 15px;
  padding-top: 5px;
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 5px;
}
.eventos
{
  background-color: whitesmoke;
  position: absolute;
  top: 12%;
  left: 2%;
  height:85%;
  width: 15%;
  min-height:85%;
  max-height:85%;
  border-top: 1px solid black;
  border-right: 1px solid black;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  padding-top: 5px;
  padding-right: 5px;
  padding-bottom: 5px;
}
.tools td, th 
{
    padding: 2px 2px 10px !important;
}
.builder td, th 
{
    padding: 3px 3px 3px !important;
}
.panel
{
  background-color: white;
  position: absolute;
  top: 12%;
  right: 2%;
  height:85%;
  width: 20%;
  min-height:85%;
  max-width: 20%; 
  border-top: 1px solid black;
  border-right: 1px solid black;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  padding-top: 10px;
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  background: -webkit-linear-gradient(top, #FFFFFF, whitesmoke);
  background: -moz-linear-gradient(top, #FFFFFF, whitesmoke);
  box-shadow: rgb(225,225,225) 5px 5px 5px;
}
</style>
</head>
<body bgcolor="whitesmoke">	


<div class="tools" >
	<button active onclick="guardar()"> Guardar
	</button>
	<?php if ($plantilla):?>
		<input type="text" size="20" onclick="get_focus(false)" name="nombre" id="nombre_plantilla_tmp" value="<?=$plantilla->nombre?>">		
	<?php else:?>	
		<input type="text" size="20" onclick="get_focus(false)" name="nombre" id="nombre_plantilla_tmp" value="Nueva plantilla">		
	<?php endif;?>	

	<button active onclick="numerar(document.getElementById('tag_edit').value)"> Iniciar Edicion
		<select onclick="get_focus(false)" id="tag_edit" value="p">
			<option value="p">P</option>
			<option value="h1">H1</option>
			<option value="b">B</option>
			<option value="i">I</option>
		</select>			
	</button>

	Plantilla
	<select name="plantilla" onclick="get_focus(false)" onchange="location.href='<?=base_url()?>micro_admin/test_envio/<?=$evento->id?>/'+this.value+'/<?=$solicitud->id?>'" >
		<option value="0"></option>
		<option value="0">Crear plantilla</option>
		<?php foreach ($plantillas as $key => $value):?>
			<option value="<?=$value->id?>" <?=set_select(set_value('plantilla'));?> ><?=$value->nombre?></option>
		<?php endforeach;?>				 
	</select>
	<br>
	<br>
	<table  >
		<tr vlign="center">
			
			<td> 
				<b>Event: </b>
			</td>
			<td> 
				<?=$evento->nombre?>
			</td>
			<td> 
				<button onclick="p.click(this,'')"> P 
				</button> 
			</td>

			<td> 
				<button onclick="s.click(this,'')"><s> S </s>
				</button> 
			</td>			
			
			<td> 
				<button onclick="b.click(this,'')"><b> B </b>
				</button> 
			</td>
			
			<td> 
				<button onclick="i.click(this,'')"><i> I </i>
				</button> 
			</td>
			
			<td> 
				<button onclick="h1.click(this,'')"> H1 
				</button> 
			</td>
			
			<td> 
				<button onclick="h2.click(this,'')"> H2 
				</button> 
			</td>
			
			<td> 
				<button onclick="h3.click(this,'')"> H3 
				</button> 
			</td>
			
			<td> 
				<button onclick="center.click(this,'')">=
				</button> 
			</td>
				
			<td> 
				<button onclick="p.click(this,'class=right')">>
				</button> 
			</td>
				
			<td> 
				<button onclick="p.click(this,'class=left')"><
				</button> 
			</td>

			<td> 
				<button onclick="p.click(this,'class=justify')">J
				</button> 
			</td>		

			<td> 
				<button onclick="ul.click(this,'')">-
				</button> 
			</td>	

			<td> 
				<button onclick="t.click(this,'class=builder')">T
				</button> 
			</td>				
				
		<tr vlign="center">
			<td> 
				<b>Plantilla: </b>
			</td>
			<td > 
				<?php if($plantilla)
				{ echo $plantilla->nombre;	}
				else {echo "Nueva plantilla";}
				?>
			</td>
			<td align="center" colspan="2"> 
				A 
				<input type="color" onchange="font.click(this,'color='+this.value)"/>
			</td>
			 
			<td align="center" colspan="2">  
				A 
			<select onclick="get_focus(false)" onchange="font.click(this,'size='+this.value)" >
				<option value="2">2</option>
				<option value="3" selected>3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
			</select> 
			</td>
			
			<td align="center" colspan="4"> 
				A 
			<select onclick="get_focus(false)" onchange="font.click(this,'family='+this.value)">
				<option value="Arial">Arial</option>
				<option value="'Times new Roman'">Times New Roman</option>
				<option value="Verdana">Verdana</option>
				<option value="Vivaldi">Vivaldi</option>
				<option value="Vijaya">Vijaya</option>
				<option value="'Lucida Console'">Lucida Console</option>
				<option value="Mangal">Mangal</option>
			</select> 
			</td>
		</tr>
	</table>
	
</div>

<div id="display" class="display" onselect="newLine(event);" onclick="get_focus(true);" 
	ondblclick="change(editor);"></div>

<?=form_open_multipart('micro_admin/guadar_plantilla/',array('name'=>'guadar_plantilla','id'=>'guadar_plantilla'));  ?>
<input type="hidden" name="nombre_plantilla" id="nombre_plantilla">
<input type="hidden" name="evento_plantilla" id="nombre_plantilla" value="<?=$evento->id?>">
<textarea id="editor" name="editor"  onclick="get_focus(true);" onkeypress="newLine(event);">
<?=$mensaje?>
</textarea>
 <?= form_close() ?>

<div class="panel">
<center>
						
						<br>
						<input  type="button" name="enviar" onclick="JavaScript:enviar()" value=">>>Enviar<<<">
						<br>
					Agregar un destinarario. <i>(ingresar correo)</i>
						<br>
					<input onclick="get_focus(false)"  id="nuevo_detinatario" size="20"> <input type="button" value="Agregar" onclick="JavaScript:agregar_nuevo()">
							
							<br>
							<br>Lista de sestinatarios
							<p >
							 Aqui, se encuentran, precargados todos los correos de empresas platino de de la categoria: <?=$solicitud->nombre_categoria?>. Basta, tocar un correo de la lista, para eliminarlo de la lista.<br><br><br>
							<select size="10" id="destinatarios" onchange="JavaScript:eliminar_destinatrio(this.value);" style="width: 260px;">
								<?php foreach ($destinatarios as $key => $value)
									{
										echo "<option value='$value'>$value</option>";
									}
								?>
						</select>
						<br>			
						Empresas platino; <?=$solicitud->nombre_categoria?>	
						<select id="nombres_destinatarios" name="destinatarios[]" onchange="JavaScript:agregar_destinatrio(this.value)" onclick="get_focus(false)" style="width: 260px;">
								<option value="--">Agragar destinatario</option>
								<?php foreach ($nombres_destinatarios as $key => $value):?>
									<option value='<?=$destinatarios[$key]?>'><?=$value?></option>
								<?php endforeach?>
						</select>
			</center>


<?php $attribbs=array('id'=>"formulario_mensaje",'novalidate' => 'novalidate');?>
<?=form_open_multipart('micro_admin/enviar/'.$solicitud->id,$attribbs)?>
<input type="hidden" name="mensaje" id="mensaje">
<?= form_close() ?>
<script type="text/javascript">
function agregar_nuevo()
{
	obj=document.getElementById('nuevo_detinatario');
	agregar_destinatrio(obj.value);
	obj.value="";
}

function enviar()
{
	document.getElementById('mensaje').value=document.getElementById('destinatarios').innerHTML;
	document.getElementById('formulario_mensaje').submit();
} 

function agregar_destinatrio(value)
{
	//alert('tty');
	if(value=="--")
		{return;}
	if(document.getElementById('destinatarios').innerHTML.indexOf(''+value)!=-1)
		{return;}

	input="<option value='"+value+"'>"+value+"</option>";
	document.getElementById('destinatarios').innerHTML+=input;
	out=document.getElementById('nombres_destinatarios').innerHTML;
	out=out.replace(input,'');
	document.getElementById('nombres_destinatarios').innerHTML=out;
}
function eliminar_destinatrio(value)
{		
	<?php 
	$html="";
	$key=0;
	foreach ($nombres_destinatarios as $key => $value) 
	{
		$html.= $value.'|'.$destinatarios[$key].',';		
	}?>
	input="<?=$html?>";
	key=<?=$key?>;
	input=input.split(',');
	i=0;
	for(i=0;i<key;i++)
	{
		if(input[i].indexOf(value)!=-1)
			{break;}
	}
	input=input[i].split('|')[0];
	console.log(input);
	//return;

	//input = '<option value="'+input+'">'+input+'</option>';
	//document.getElementById('nombres_destinatarios').innerHTML+=input;
	
	value = '<option value="'+value+'">'+value+'</option>';
	out=document.getElementById('destinatarios').innerHTML;
	out=out.replace(value,'');
	document.getElementById('destinatarios').innerHTML=out;
	/*
	if(document.getElementById('nombres_destinatarios').innerHTML.indexOf(''+value)!=-1)
		{return;}
	*/
	
}
</script>
</div>

</body>
</html>
