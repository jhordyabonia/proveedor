<div style="background-color:'white';">
  <table style="max-width: 300px;  margin: auto; border-radius: 7px; text-align: center;">
    <tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>header-email-platino.png" alt="">
      </td>
    </tr>
    <tr>
    	<td>
			<B>Bienvenido a Proveedor.com.co</B><BR>
			Sr(a). <?=$nombres?> Usted se ha registrado, con los siguientes datos 
			<br>
			<H2>Datos de la empresa</H2>
			<TABLE BORDER='0' padding='4' margin='2' cellspading='2' bgcolor='#efefef'>
				<TR><th align='left'>Nit de empresa: <td align='left'><I><?=$nit?></I>
				<TR><th align='left'>Nombre de empresa: <td align='left'><I><?=$nombre?></I>
				<TR><th align='left'>Nombres de contacto: <td align='left'><I><?=$nombres?></I>
				<TR><th align='left'>Email:<td align='left'><I><?=$email?></I>
				<TR><th align='left'>Telefono:<td align='left'><I><?=$telefono?></I>
			</TABLE> 
		</td>
	<tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>footer-email-platino.png" alt="">
      </td>      
    </tr>
 </table>