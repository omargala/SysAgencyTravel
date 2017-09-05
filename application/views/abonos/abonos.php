<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">abonoes</span></h2>
    </div>
    <div class="row">
     <div id="lista_abonoes" class="col-md-12">
       <div class="row">
         <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading"><strong>Lista de abonoes</strong><a class="btn btn-success btn-right-in-panel" href="<?=base_url(); ?>abonoes/nuevo" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></div>
            <div class="panel-body"> 
              <div id="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTable">
                  <thead>
                    <tr class="info"> 
                      <th>Edo. de cuenta</th>
                      <th>Titular</th>
                      <th>Localizador</th>      
                      <th>Abono</th>
                      <th>Cancelado</th>
                      <th>Pagado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                 <tbody>                    
                   <?php if ($listaabonos): ?>
                     <?php foreach ($listaabonos as $abono): ?>
                      <tr class="odd gradeX">
                       <td><?=$abono->idedocta; ?></td>
                       <td><?=$abono->titular; ?></td>
                       <td><?=$abono->cvelocalizador; ?></td>
                       <td><?=$abono->montoabono; ?></td>
                       <td align="center"><strong class="<?php if($abono->cancelado==1){echo "text-danger";} ?>"><?php if($abono->cancelado==0){echo "NO";}else{echo "CA";};?></strong></td>      
                       <td align="center"><strong class="<?php if($abono->pagado==1){echo "text-success";} ?>"><?php if($abono->pagado==0){echo "NO";}else{echo "P";};?></strong></td>
                       <td align="center">
                        <a class="btn" href="<?php echo base_url(); ?>abonos/ver/<?php echo $abono->idabono; ?>/<?php echo $abono->idedocta; ?>"><i class="fa fa-eye text-info" aria-hidden="true"></i></a>
                        <a class="btn" href="<?php echo base_url(); ?>abonos/editar/<?php echo $abono->idabono; ?>/<?php echo $abono->idedocta; ?>"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                        <a class="btn" href="<?php echo base_url(); ?>abonos/cancelar/<?php echo $abono->idabono; ?>/<?php echo $abono->idedocta; ?>"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                      </td>
                      </tr> 
                     <?php endforeach ?>
                   <?php endif ?>                           
                 </tbody>
                </table>   
              </div>                      
            </div>
           </div>
          </div>
        </div>
       </div>
  </div>        
 </div>                    
</div>  
<script src="<?php echo base_url(); ?>js/abonoes/funciones.js"></script>