</div> 
<script>
	$(document).ready(function() {
		$('.dataTable').DataTable({
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
</body>
</html>