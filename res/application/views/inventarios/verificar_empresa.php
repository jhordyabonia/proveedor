<div style="padding:10px;margin:4px">
		<table>	
                    
                    <td width="10%" >                       
                       <a href="<?= base_url(); ?>perfil/ver_empresa/<?=$empresa->nit?>" >                         
                          <?=$empresa->nombre?>
                        </a>
                      </td>
                      <td width="10%" > 
						<img  class="center-block" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>" style="max-width:185px; max-height:100px">
					  </td>
                      <td width="15%" > 
					    <div class="center-block" style="max-width: 220px;">
							<?=$empresa->descripcion?> 
						</div>
					  </td>
					<td width="10%"> 
					   <a href="JavaScript:start(<?=$empresa->nit?>,1);">  
						 <i class="fa fa-envelope icono_mensaje" style="font-size: 30px; margin: 20% 40%;"> 
						 </i> 
						</a> 
					</td>

                  </tr>
		</table>
</div>