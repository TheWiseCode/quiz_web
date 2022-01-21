<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
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
                    <th><?php echo 'Nombre '; ?><?php echo 'Completo'; ?></th>
                    <th><?php echo 'Telefono'; ?> </th>
                    <th><?php echo $this->lang->line('account_type'); ?> </th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['email'] . ' ' . $val['wp_user']; ?></td>
                        <td><?php echo $val['first_name'] . ' '; ?><?php echo $val['last_name']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>

                        <td><?php foreach ($list_account_type as $key => $val_su) {
                                if ($val_su['account_id'] == $val['su']) {
                                    echo $val_su['account_name'];
                                }
                            } ?> </td>

                        <td>

                            <?php /*<a href="<?php echo site_url(
                                'user2/view_user/' . $val['uid']
                            ); ?>"><i class="fa fa-eye" title="View Profile"></i></a>*/ ?>

                            <a href="<?php echo site_url(
                                'user/edit_user_admin/' . $val['uid']
                            ); ?>"><i class="fas fa-edit" style="color:#3472f7;"></i></a>
                            &ensp;
                            <a href="javascript:remove_entry('user/remove_user_admin/<?php echo $val['uid']; ?>');">
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


    <?php /*
    <br><br><br><br>
    <div class="card">
        <div class="card-heading"><?php echo $this->lang->line('import_users'); ?></div>

        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="<?php echo site_url(
                'user/import'
            ); ?>">

                <select name="gid" required>
                    <option value=""><?php echo 'Seleccionar Grupo'; ?></option>


                    <?php foreach ($group_list as $key => $val) { ?>

                        <option value="<?php echo $val['gid']; ?>" <?php if ($val['gid'] == $gid) {
                            echo 'selected';
                        } ?> ><?php echo $val['group_name']; ?></option>
                    <?php } ?>
                </select>


                <?php echo $this->lang->line('upload_excel'); ?>
                <input type="hidden" name="size" value="3500000">
                <input type="file" name="xlsfile" style="width:150px;float:left;margin-left:10px;">
                <div style="clear:both;margin-bottom:15px;"></div>
                <input type="submit" value="Import" style="margin-top:5px;" class="btn btn-primary">

                <a href="<?php echo base_url(); ?>sample/ejemplo lista de estudiantes.xls"
                   target="new"><?php echo $this->lang->line('click_here'); ?></a> <?php echo $this->lang->line('upload_excel_info'); ?>

            </form>

        </div>


    </div>*/ ?>


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
