<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>


    <div class="row">
        <div class="col-md-12">
            <br>
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>

            <table class="table table-bordered" id="table_resume">
                <thead class="thead-light">
                <th>#</th>
                <th><?php echo 'Nombre'; ?></th>
                <th><?php echo 'Code CD'; ?></th>
                <th><?php echo 'fecha de inscripción'; ?></th>
                </thead>
                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['full_name']; ?></td>
                        <td><?php echo $val['cod_student']; ?></td>
                        <td><?php echo $val['fecha_r'] ?></td>
                    </tr>
                <?php }
                ?>
            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        let value = "Mostrar "
        value += "<select class='custom-select custom-select-sm form-control form-control-sm'>";
        value += "<option value='10'>10</option>" + "<option value='25'>25</option>" + "<option value='50'>50</option>" + "<option value='100'>100</option>" + "<option value='-1'>Todos</option>";
        value += "</select>";
        value += " registros por pagina";
        $("#table_resume").DataTable({
            buttons: [
                'pdf'
            ],
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
    });
</script>