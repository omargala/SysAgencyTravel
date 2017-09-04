<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Información Detallada del Localizador</span></h2>
    </div>
    <div class="row">
     <div class="col-md-8">
      <div id="alertSection"></div>
       <div class="panel panel-primary">                       
        <div class="panel-heading">
            <strong>Información del localizador</strong><a href="<?=base_url(); ?>Localizadores" class="btn btn-success btn-right-in-panel"" type="button"><i class="fa fa-list" aria-hidden="true"></i> Lista Localizadores</a>
        </div>             
        <div class="panel-body">
         <div class="row">
          <div class="col-md-12"> 
           <div id="alertLocalizador"></div>                                             
            <?php foreach ($localizador as $valor): ?>
               <li class="list-group-item"><strong class="text-primary">Clave del Localizador: </strong> <?php echo $valor->cvelocalizador ?></li>
               <li class="list-group-item"><strong class="text-primary">Titular: </strong> <?php echo $valor->titular ?></li>
               <li class="list-group-item"><strong class="text-primary">Ttoo: </strong> <?php echo $valor->ttoo ?></li>
               <li class="list-group-item"><strong class="text-primary">Otros: </strong> <?php echo $valor->otroespecificacion ?></li>
               <li class="list-group-item"><strong class="text-primary">Tarifa: </strong> <?php echo $valor->tarifapublica ?></li>
               <li class="list-group-item"><strong class="text-primary">Fecha In: </strong> <?php echo $valor->fechain ?></li>
               <li class="list-group-item"><strong class="text-primary">Fecha Out: </strong> <?php echo $valor->fechaout?></li>
               <li class="list-group-item"><strong class="text-primary">Servicio: </strong> <?php echo $valor->servicio ?></li>
               <li class="list-group-item"><strong class="text-primary">Plan de Alimentos: </strong> <?php echo $valor->planalimentos ?></li>
               <li class="list-group-item"><strong class="text-primary">Tipo de Tarifa: </strong> <?php echo $valor->tipotarifa ?></li>
               <li class="list-group-item"><strong class="text-primary">Núm. de Habitaciones: </strong> <?php echo $valor->numhabs ?></li>
               <li class="list-group-item"><strong class="text-primary">Adulto: </strong> <?php echo $valor->adultos ?></li>
               <li class="list-group-item"><strong class="text-primary">Menores: </strong> <?php echo $valor->menores ?></li>
               <li class="list-group-item"><strong class="text-primary">Cancelado: </strong> <?php echo $valor->cancelado ?></li>
               <li class="list-group-item"><strong class="text-primary">Fecha de Alta: </strong> <?php echo $valor->fechacreacion ?></li>
               <li class="list-group-item"><strong class="text-primary">Pagado: </strong> <?php echo $valor->pagado ?></li>
             </ul>
           </div>
          </div>
         </div>
       </div>
     </div>
     <div class="col-md-4">
       <div class="panel panel-primary">                       
        <div class="panel-heading">
            <strong>Información del Estado de Cuenta</strong>
        </div>             
        <div class="panel-body">
         <div class="row">
          <div class="col-md-12"> 
           <div id="alertLocalizador"></div>
               <li class="list-group-item"><strong class="text-primary">Monto a pagar: $</strong> <?php echo $valor->montooriginal ?></li>
               <li class="list-group-item"><strong class="text-primary">Total de pagos realizados: $</strong> <?php echo $valor->acumulado ?></li>
               <li class="list-group-item"><strong class="text-primary">Saldo: $</strong> <?php echo $valor->saldo ?></li>
               <li class="list-group-item"><strong class="text-primary">Abonos realizados: </strong> <?php echo $valor->cantidadabonos ?></li>
               <li class="list-group-item"><strong class="text-primary">Fecha último abono: </strong> <?php echo $valor->fechaultimoabono ?></li>              
             </ul>
            <?php endforeach ?>
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