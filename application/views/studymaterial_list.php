<div class="container">
    <?php
    $logged_in = $this->session->userdata('logged_in');
    ?>
    <div class="row mb-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <a href="<?php echo site_url('study_material/add_new'); ?>"
               class="btn btn-labeled btn-primary" style="width: 100%;">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_study_material'); ?>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            $acp = explode(',', $logged_in['study_material']);
            if (in_array('Add', $acp)) {
                ?>

                <?php
            }
            ?>
            <table class="table table-bordered" id="table_study">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('title'); ?></th>
                    <th><?php echo $this->lang->line('description'); ?> </th>

                    <th><?php echo $this->lang->line('category_name'); ?></th>
                    <?php //if($logged_in['su']=='1'){ ?>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                    <?php // } ?>
                </tr>
                </thead>
                <?php
                if (count($result) == 0) {
                    ?>
                    <tr>
                        <td colspan="6"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>
                    <?php
                }
                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['stid']; ?></td>
                        <td><?php echo $val['title']; ?></td>
                        <td><?php echo substr($val['study_description'], 0, 50); ?>...</td>
                        <td><?php echo $val['category_name']; ?></td>
                        <td>
                            <?php
                            $acp = explode(',', $logged_in['study_material']);
                            if (in_array('Edit', $acp)) {
                                ?>
                                <a href="<?php echo site_url('study_material/edit_studymaterial/' . $val['stid']); ?>">
                                    <i class="fas fa-edit" style="color:#3472f7;"></i></a>
                            <?php } ?>
                            <?php
                            $acp = explode(',', $logged_in['study_material']);
                            if (in_array('View', $acp)) {
                                ?>
                                <a href="<?php echo site_url('study_material/view_studymaterial/' . $val['stid']); ?>">
                                    <i class="fas fa-eye" style="color:#3472f7;"></i></a>
                            <?php } ?>
                            <?php
                            $acp = explode(',', $logged_in['study_material']);
                            if (in_array('Remove', $acp)) {
                                ?>
                                <a href="<?php echo site_url('study_material/remove_studymaterial/' . $val['stid']); ?>">
                                    <i class="fas fa-trash" style="color:#3472f7;"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
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
        $("#table_study").DataTable({
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