<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <a href="<?php echo site_url('applicant/create'); ?>"
               class="btn btn-labeled btn-primary" style="width: 100%;">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_applicant'); ?>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>
            <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-lg"
                   id="table_uapplicants">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('email'); ?></th>
                    <th><?php echo $this->lang->line('complete_name'); ?></th>
                    <th><?php echo $this->lang->line('contact_no'); ?> </th>
                    <th><?php echo $this->lang->line('applicant_code'); ?> </th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['email'] ?></td>
                        <td><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>
                        <td><?php echo $val['cod_student']; ?> </td>
                        <td>
                            <a hidden href="<?php echo site_url('user2/view_user/' . $val['uid']); ?>">
                                <i class="fa fa-eye" title="View Profile"></i></a>
                            <a href="<?php echo site_url('applicant/edit/' . $val['uid']); ?>">
                                <i class="fa fa-edit" style="color:#3472f7;"></i></a>
                            <a href="javascript:remove_entry('applicant/remove/<?php echo $val['uid']; ?>',
                            '<?php echo $this->lang->line('warning_remove') ?>');">
                                <i class="fa fa-trash" style="color:#3472f7;"></i>
                            </a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mb-3">
        <div class="mt-3 col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header font-weight-bold"><?php echo $this->lang->line('import_users'); ?></div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                          action="<?php echo site_url('applicant/import'); ?>">
                        <input type="hidden" name="size" value="3500000">
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="xslfile"><?php echo $this->lang->line('upload_excel'); ?></label>
                                <input type="file" name="xlsfile" accept=".xls,.xlsx" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="gid"><?php echo $this->lang->line('select_group'); ?>)</label>
                                <select name="gid" required class="form-control">
                                    <option value=""><?php echo $this->lang->line('select_group'); ?></option>
                                    <?php foreach ($group_list as $key => $val) { ?>
                                        <option value="<?php echo $val['gid']; ?>" <?php if ($val['gid'] == $gid) {
                                            echo 'selected';
                                        } ?> ><?php echo $val['group_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
                                <input type="submit" value="<?php echo $this->lang->line('import') ?>"
                                       class="btn btn-secondary form-control">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-9 col-lg-9">
                                <a href="<?php echo base_url(); ?>sample/ejemplo lista de estudiantes.xls"
                                   target="new"><?php echo $this->lang->line('click_here'); ?></a> <?php echo $this->lang->line('upload_excel_info'); ?>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
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
        $("#table_uapplicants").DataTable({
            responsive: true,
            autoWidth: false,
            columnDefs: [
                {responsivePriority: 1, targets: 4},
            ],
            /*"columns": [
                { "width": "10%" },
                { "width": "25%" },
                { "width": "25%" },
                { "width": "20%" },
                { "width": "10%" },
                { "width": "10%" },
            ],*/
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