<!-- Example Tables Card -->
<div class="card mb-3 ">
 <div class="card-header text-white bg-info">
  <i class="fa fa-table"></i>
  Lista de Estados de Cuenta
 </div>
 <div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered dataTable" width="100%" id="" cellspacing="0">
    <thead>
     <tr class="info"> 
      <th>Clave</th>
      <th>Titular</th>
      <th>Tarifa</th>      
      <th>Total Abonado</th>
      <th>Saldo Total</th>
      <th>Opciones</th>
     </tr>
    </thead>
    <tbody>
     <?php if ($listaestadosdecuenta): ?>
       <?php foreach ($listaestadosdecuenta as $estadodecuenta): ?>
        <tr class="odd gradeX">
         <td><?=$estadodecuenta->cvelocalizador; ?></td>
         <td><?=$estadodecuenta->titular; ?></td>
         <td><?=$estadodecuenta->montooriginal; ?></td>      
         <td><?=$estadodecuenta->acumulado; ?></td>
         <td><?=$estadodecuenta->saldo; ?></td>
         <td align="center">
           <a href="<?=base_url(); ?>Estadosdecuenta/detalleEstadodeCuenta/<?php echo $estadodecuenta->idlocalizador; ?>" class="btn" href="#"><i class="fa fa-line-chart text-success" aria-hidden="true"></i></a>  
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
<script src="<?php echo base_url(); ?>js/estadosdecuenta/funciones.js"></script>