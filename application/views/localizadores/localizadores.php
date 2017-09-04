<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Localizadores</span></h2>
    </div>
    <div class="row">
     <div id="lista_localizadores" class="col-md-12">
       <div class="row">
         <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading"><strong>Lista de Localizadores</strong><a class="btn btn-success btn-right-in-panel" href="<?=base_url(); ?>Localizadores/nuevo" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></div>
            <div class="panel-body"> 
              <div id="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTable">
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
                       <td><?php if($localizador->cancelado==0){echo "NO";}else{echo "CA";};?></td>      
                       <td><?php if($localizador->pagado==0){echo "NO";}else{echo "P";};?></td>
                       <td align="center">
                       <a href="<?=base_url(); ?>Localizadores/editar/<?php echo $localizador->idlocalizador; ?>" class="btn"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                       <a href="<?=base_url(); ?>Localizadores/cancelar/<?php echo $localizador->idlocalizador; ?>" class="btn" href="#"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                       <a href="<?=base_url(); ?>estadosdecuenta/" class="btn" href="#"><i class="fa fa-line-chart text-success" aria-hidden="true"></i></a>  
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