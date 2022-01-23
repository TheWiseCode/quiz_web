
<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Especialidad</th>
                <th>Nombre</th>
                <th>CD</th>
                <th>CI</th>
                <th>Nacionalidad</th>
                <th>Universidad</th>
				<th>Número de contacto</th>
				<th>Correo</th>
				<th>Fecha de inscripción</th>

			
            </tr>
        </thead>
        <tbody>
            
			<?php
               
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['specialties']; ?></td>
                        <td><?php echo $val['last_name'] . ' '; ?><?php echo $val['first_name']; ?></td>
                        <td><?php echo $val['cod_student']; ?></td>
                        <td><?php echo $val['ci'] . ' ' . $val['exp']; ?></td>
                        
						<td><?php echo $val['nationality']; ?></td>
                        <td><?php echo $val['university']; ?></td>
                        
						<td><?php echo $val['contact_no']; ?></td>
						<td><?php echo $val['email']; ?></td>
						<td><?php echo $val['registered_date']; ?></td>
		
                    </tr>

                <?php 
				}
                ?>
					
        </tbody>
        <tfoot>
            <tr>
			<th>CD</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th>Universidad</th>
				<th>Especialidad</th>
				<th>Número de contacto</th>
				<th>Correo</th>
				<th>Fecha de inscripción</th>
			
            </tr>
        </tfoot>
    </table>

</div>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>





   
 
    <script>
	
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
        },
        buttons: [
            {
                extend: 'excel',
                split: [ 'pdf', 'csv'],
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
    </script>

   










