<!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header text-white bg-info">
            <i class="fa fa-table"></i>
            Localizadores <a class="btn btn-success btn-right-in-panel" href="<?=base_url(); ?>Localizadores/nuevo" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" width="100%" id="" cellspacing="0">
                <thead>
                  <tr class="info"> 
                      <th>Clave</th>
                      <th>Titular</th>
                      <th>Cancelado</th>      
                      <th>Pagado</th>
                      <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if ($listalocalizadores): ?>
                     <?php foreach ($listalocalizadores as $localizador): ?>
                      <tr class="odd gradeX">
                       <td><?=$localizador->cvelocalizador; ?></td>
                       <td><?=$localizador->titular; ?></td>
                       <td align="center"><strong class="<?php if($localizador->cancelado==1){echo "text-danger";} ?>"><?php if($localizador->cancelado==0){echo "NO";}else{echo "CA";};?></strong></td>      
                       <td align="center"><strong class="<?php if($localizador->pagado==1){echo "text-success";} ?>"><?php if($localizador->pagado==0){echo "NO";}else{echo "P";};?></strong></td>
                       <td align="center">
                        <a data-toggle="tooltip" data-placement="top" title="Ver Detalle" class="btn" href="<?=base_url(); ?>Localizadores/ver/<?php echo $localizador->idlocalizador; ?>" role="button"><i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Editar" href="<?=base_url(); ?>Localizadores/editar/<?php echo $localizador->idlocalizador; ?>" class="btn" role="button"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Cancelar" role="button" href="<?=base_url(); ?>Localizadores/cancelar/<?php echo $localizador->idlocalizador; ?>" class="btn <?php if($localizador->cancelado==1){echo 'disabled';} ?>"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Estado de Cuenta" role="button" href="<?=base_url(); ?>estadosdecuenta/detalleEstadodeCuenta/<?php echo $localizador->idlocalizador; ?>" class="btn"><i class="fa fa-line-chart text-success" aria-hidden="true"></i></a>  
                      </td>
                      </tr> 
                     <?php endforeach ?>
                   <?php endif ?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>

<script src="<?php echo base_url(); ?>js/localizadores/funciones.js"></script>