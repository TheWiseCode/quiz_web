<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 mb-2 mb-sm-2">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?php echo site_url('user'); ?>">
                                    <?php echo $this->lang->line('no_registered_user'); ?>
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_users; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-2 mb-sm-2">
            <div class="card border-left-success shadow py-2 ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?php echo site_url('qbank'); ?>">
                                    <?php echo $this->lang->line('no_questions_qbank'); ?>
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_qbank; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-2 mb-sm-2">
            <div class="card border-left-warning shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?php echo site_url('quiz'); ?>">
                                    <?php echo $this->lang->line('no_registered_quiz'); ?>
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_quiz; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="sec_row">
        <div class="col-sm-12 col-md-4 col-lg-6 mb-2 mb-sm-2">
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?php echo site_url('user'); ?>">
                                    <?php echo $this->lang->line('active_users'); ?>
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $active_users; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-6 mb-2 mb-sm-2">
            <div class="card border-left-danger shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="<?php echo site_url('user'); ?>">
                                    <?php echo $this->lang->line('inactive_users'); ?>
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $inactive_users; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ban fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-12 col-md-12 col-lg-12">
            <div class="card py-2 mt-2">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <?php echo $this->lang->line('recently_registered'); ?>
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-md" id="table_dashboard">
                        <thead class="thead-light">
                        <tr>
                            <th><?php echo $this->lang->line('email'); ?></th>
                            <th class="text-xs-right"><?php echo $this->lang->line('full_name'); ?></th>
                            <th class="text-xs-right"><?php echo $this->lang->line('group_name'); ?></th>
                            <th class="text-xs-right"><?php echo $this->lang->line('contact_no'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($result as $key => $val) {
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('user/edit_user/' . $val['uid']); ?>"><?php echo $val['email']; ?><?php echo $val['wp_user']; ?></a>
                                </td>
                                <td class="text-xs-right"><?php echo $val['first_name'] . ' ' . $val['last_name']; ?></td>
                                <td class="text-xs-right"><?php echo $val['group_name']; ?></td>
                                <td class="text-xs-right"><?php echo $val['contact_no']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
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
        $("#table_dashboard").DataTable({
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
    if ($(window).width() < 514) {
    } else {
    }
</script>
