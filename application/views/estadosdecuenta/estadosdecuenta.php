<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Estados de Cuenta</span></h2>
    </div>
    <div class="row">
     <div id="lista_localizadores" class="col-md-12">
       <div class="row">
         <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading"><strong>Lista de Estados de Cuenta</strong></div>
            <div class="panel-body"> 
              <div id="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTable">
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
           </div>
          </div>
        </div>
       </div>
  </div>        
 </div>                    
</div>  
<script src="<?php echo base_url(); ?>js/localizadores/funciones.js"></script>