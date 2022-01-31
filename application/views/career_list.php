<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <a href="<?php echo site_url('user/add_new_career'); ?>"
               class="btn btn-labeled btn-primary" style="width: 100%;">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_new1'); ?>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <div id="message"></div>

            <table class="table table-bordered" id="table_careers">
                <thead class="thead-light">
                <tr>
                    <th><?php echo $this->lang->line('career_name'); ?></th>
                    <th><?php echo $this->lang->line('code'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($career_list as $key => $val) {
                    ?>
                    <tr>
                        <td> <?php echo $val['name']; ?></td>
                        <td><?php echo $val['code_career']; ?></td>
                        <td>
                            <a href="<?php echo site_url('user/edit_career/' . $val['id']); ?>">
                                <i class="fas fa-edit" style="color:#3472f7;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
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
        $("#table_careers").DataTable({
            responsive: true,
            autoWidth: false,
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