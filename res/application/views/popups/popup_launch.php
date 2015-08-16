	<div class="modal fade" id="popup" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true" >
	     <link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
		    <div class="modal-dialog">
	        <div class="modal-content modal-content-one">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">
		                <span aria-hidden="true">
			                <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true">
			                </span>
	                    </span>
	                    <span class="sr-only">Close</span>
			        </button>
			    </div>
				<div class="modal-body">
					<?php foreach ($datos as $key => $value): ?>
							<button type="button" class="btn btn-primary btn_hecho" data-dismiss="modal"
							data-toggle="modal" data-target="#<?=$value['id_popup']?>" id="launch_<?=$value['popup']?>">
								<?=$value['popup']?>
							</button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div

