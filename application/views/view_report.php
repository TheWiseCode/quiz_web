<style>
    label {
        font-weight: bold;
    }
</style>
<div class="">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>
            <table id="table_report" class="table table-bordered table-responsive-md">
                <thead class="thead-light">
                <th>Especialidad</th>
                <th>Nombre</th>
                <th>CD</th>
                <th>CI</th>
                <th>Nacionalidad</th>
                <th>Universidad</th>
                <th>Número de contacto</th>
                <th>Correo</th>
                <th>Fecha de inscripción</th>
                <th>Nro pago de inscripción</th>
              
                </thead>
                <tbody>

                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['specialties']; ?></td>
                        <td><?php echo $val['last_name'] . ' ' . $val['first_name']; ?></td>
                        <td><?php echo $val['cod_student']; ?></td>
                        <td><?php echo $val['ci'] . ' ' . $val['exp']; ?></td>
                        <td><?php echo $val['nationality']; ?></td>
                        <td><?php echo $val['university']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>
                        <td><?php echo $val['email']; ?></td>
                        <td><?php echo $val['registered_date']; ?></td>
                        <td><?php echo $val['nro_boleta']; ?></td>
                        
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
                    <th>Nro pago de inscripción</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url(); ?>vendor/datatables1/responsive/css/responsive.bootstrap4.css"/>s
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url(); ?>vendor/datatables1/buttons/css/buttons.bootstrap4.css"/>s
<script type="text/javascript"
        src="<?php echo base_url(); ?>vendor/datatables1/buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>vendor/datatables1/buttons/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>vendor/datatables1/responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>vendor/datatables1/responsive/js/responsive.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        let value = "Mostrar "
        value += "<select class='custom-select custom-select-sm form-control form-control-sm'>";
        value += "<option value='10'>10</option>" + "<option value='25'>25</option>" + "<option value='50'>50</option>" + "<option value='100'>100</option>" + "<option value='-1'>Todos</option>";
        value += "</select>";
        value += " registros por pagina";
        let table = $("#table_report").DataTable({
            responsive: true,
            autoWidth: true,
            "language": {
                "lengthMenu": value,
                "zeroRecords":
                    "No pudimos encontrar nada, lo siento",
                "info":
                    "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty":
                    "Sin registros disponibles",
                "infoFiltered":
                    "(filtrado de _MAX_ registros totales)",
                "search":
                    "Buscar:",
                "paginate":
                    {
                        "next":
                            "Siguiente",
                        "previous":
                            "Anterior"
                    }
            }
        });
        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ]
        });
        table.buttons().container()
            .appendTo($('.col-md-6:eq(0)', table.table().container()));
        });
</script>