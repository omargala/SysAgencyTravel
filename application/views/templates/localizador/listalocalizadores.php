<div class="row">
    <div class="col-lg-12">
    	<div class="panel panel-primary">
    		<div class="panel-heading"><strong>Lista de Localizadores</strong></div>
    		<div class="panel-body">   
    			<div id="table-responsive">
    				<table id="loc" width="100%" class="table table-striped table-bordered table-hover">
		     			<thead>
					        <tr class="info"> 
						        <th>Clave</th>
						        <th>Titular</th>      
						        <th>...</th>
					        </tr>
				     	</thead>
		        		<tbody>
					        <?php 
						        if (empty($todoslocalizadores)) {	      	 	
						      	 		echo "Vacío";      		
					    	 	}else{ 
					    	 		foreach ($todoslocalizadores as $key) {  ?>	      	 	
						      	 	<tr class="odd gradeX">
						    			<td><?=$key->cvelocalizador; ?></td>
						    			<td><?=$key->titular; ?></td>
						    		 	<td align="center">
						    		 		<a class="btn" href="#" onclick='editarLocalizador("<?=$key->idlocalizador; ?>")'><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
						    		 		<a class="btn" href="#" onclick='cancelarLocalizador("<?=$key->idlocalizador; ?>")''><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
						    		 		<a class="btn" onclick="goEstadoCuenta()" data-set='<?=$key->idlocalizador; ?>'><i class="fa fa-line-chart text-success" aria-hidden="true"></i></a>		
						    		 	</td>
						    	 	</tr>
						    	<?php 
						    	 	}
						      	}	
		      				?>  				                                              
		        		</tbody>
		    		</table>   
    			</div>                      
    		</div>
   		</div>
  	</div>
</div>
<script src="<?=base_url();?>vendor/js/jquery.js"></script>
<script src="<?=base_url();?>vendor/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
	$(document).ready(function() {
		$('#loc').DataTable({
			 language: {
                search: "Buscar:",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                paginate: {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            lengthChange: false,
	    	responsive: true
	    });
	});
</script>