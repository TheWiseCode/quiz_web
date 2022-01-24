<div class="container">
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="float-right" style="padding-bottom: 1%;">
                <a href="<?php echo site_url('user/create'); ?>"
                   class="btn btn-labeled btn-primary">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_user'); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>
            <table class="table table-bordered table-responsive-md" id="table_ulist">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('email'); ?></th>
                    <th><?php echo $this->lang->line('complete_name'); ?></th>
                    <th><?php echo $this->lang->line('cellphone'); ?> </th>
                    <th><?php echo $this->lang->line('account_type'); ?> </th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['email']; ?></td>
                        <td><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>
                        <td><?php foreach ($list_account_type as $key => $val_su) {
                                if ($val_su['account_id'] == $val['su']) {
                                    echo $val_su['account_name'];
                                }
                            } ?> </td>
                        <td>
                            <a href="<?php echo site_url(
                                'user/edit/' . $val['uid']
                            ); ?>"><i class="fas fa-edit" style="color:#3472f7;"></i></a>
                            &ensp;
                            <a href="javascript:remove_entry('user/remove/<?php echo $val['uid']; ?>');">
                                <i class="fas fa-trash" style="color:#3472f7;"></i>
                            </a>

                        </td>
                    </tr>
                <?php }
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
        $("#table_ulist").DataTable({
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
