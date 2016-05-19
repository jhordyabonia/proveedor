  <!-- Content Wrapper. Contains page content -->      
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mensajes
        <small><?=$numero_recibidos?> mensajes <?=$filtro?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Mensajes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-block margin-bottom bg-orange hidden-xs"><?php echo $numero_nuevos?> Nuevos Mensajes</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?=base_url()?>mensajes/"><i class="fa fa-inbox"></i> Recibidos
                  <span class="label label-primary pull-right"><?php echo $numero_nuevos?></span></a></li>
                <li><a href="<?=base_url()?>mensajes/enviados"><i class="fa fa-envelope-o"></i> Enviados</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Mensajes de:</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?=base_url()?>mensajes/<?=$tab?>"><i class="fa fa-circle-o text-orange"></i> Todos </a></li>
                <li><a href="<?=base_url()?>mensajes/filtro/<?=$tab?>/3"><i class="fa fa-circle-o text-red"></i> Empresa </a></li>
                <li><a href="<?=base_url()?>mensajes/filtro/<?=$tab?>/2"><i class="fa fa-circle-o text-yellow"></i> Productos</a></li>
                <li><a href="<?=base_url()?>mensajes/filtro/<?=$tab?>/1"><i class="fa fa-circle-o text-light-blue"></i> Cotizaciones</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mensajes</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"  ><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" onclick="JavaScript:responder();"><i class="fa fa-refresh"></i></button>
                <!-- paginado---
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  </div>
              </div>              
                -->
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>                    
						       <?php $white=TRUE; foreach ($nuevos as $key => $value):?>
                      <tr onclick="JavaScript:location.href='<?=base_url()?>mensajes/leer/<?=$value->id?>/<?=$tab?>'">
                        <td><input type="checkbox" class="hidden-xs"></td>
                        <td class="mailbox-name"><?=$value->remitente->nombres?></td>
                        <td class="mailbox-subject"><div class="elipse"><b><?=str_replace('Proveedor.com.co - ','',$value->asunto)?></b><?=$value->mensaje?></div>
                        </td>
                        <td class="mailbox-attachment">
                          <?php if($value->adjunto):?>
                              <span class="fa fa-paperclip clip_icono"></span>
                            <?php endif;?>
                          </td>
                        <td class="mailbox-date"><?=$value->fecha?></td>
                      </tr>                  
                  <?php endforeach; ?>  
                   <?php foreach ($recibidos as $key => $value):?>
                      <tr onclick="JavaScript:location.href='<?=base_url()?>mensajes/leer/<?=$value->id?>/<?=$tab?>'">
                        <td><input type="checkbox"></td>
                        <td class="mailbox-name"><?=$value->remitente->nombres?></td>
                        <td class="mailbox-subject"><div class="elipse"><b><?=str_replace('Proveedor.com.co - ','',$value->asunto)?></b><?=$value->mensaje?></div>
                        </td>
                        <td class="mailbox-attachment">
                          <?php if($value->adjunto):?>
                              <span class="fa fa-paperclip clip_icono"></span>
                            <?php endif;?>
                          </td>
                        <td class="mailbox-date"><?=$value->fecha?></td>
                      </tr>                  
                  <?php endforeach; ?>                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"  ><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <!--
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
                -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
       
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->