<div class="card mb-3 ">
 <div class="card-header text-white bg-info">
   <i class="fa fa-bar-chart"></i>
     <strong>Información del abono</strong><a href="<?=base_url(); ?>estadosdecuenta/detalleEstadodeCuenta/<?php echo $idedocta; ?>" class="btn btn-success btn-right-in-panel" role="button"><i class="fa fa-list" aria-hidden="true"></i> Rregresar</a>
 </div>
 <div class="card-body">
  <div id="alertLocalizador"></div> 
  <ul class="list-group">                                            
    <?php foreach ($datos->result() as $dato){ ?>
       <li class="list-group-item"><strong class="text-primary">Referencia de Abono: </strong> <?php echo $dato->idabono ?></li>
       <li class="list-group-item"><strong class="text-primary">Referencia de Estado de Cuenta: </strong> <?php echo $dato->idedocta ?></li>
       <li class="list-group-item"><strong class="text-primary">Recibió: </strong> <?php echo $dato->recibidopor ?></li>
       <li class="list-group-item"><strong class="text-primary">Pagó: </strong> <?php echo $dato->abonadopor ?></li>
       <li class="list-group-item"><strong class="text-primary">Abono: </strong> <?php echo $dato->montoabono ?></li>
       <li class="list-group-item"><strong class="text-primary">Fecha: </strong> <?php echo $dato->fechaabono ?></li>
       <li class="list-group-item"><strong class="text-primary">Modo de Pago: </strong> <?php echo $dato->modopagoabono?></li>
       <li class="list-group-item"><strong class="text-primary">Cancelado: </strong> <?php if($dato->cancelado==0){echo "NO";}else{echo "CA";};?></li>
    <?php } ?>
   </ul>
 </div>
</div>