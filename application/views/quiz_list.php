<div class="container">
    <?php
    $logged_in = $this->session->userdata('logged_in');
    $uid = $logged_in['uid'];
    ?>
    <div class="row mb-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <a href="<?php echo site_url('quiz/add_new'); ?>"
               class="btn btn-labeled btn-primary" style="width: 100%;">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_quiz'); ?>
            </a>
        </div>
    </div>
    <?php
    $list_view = "table";
    $acp = explode(',', $logged_in['quiz']);
    ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-header" style="<?php if ($stat == 'active') {
                    echo 'background:#eeeeee;';
                } ?> ">
                    <a href="<?php echo site_url('quiz/index/' . $limit . '/table/active'); ?>"> <?php echo $this->lang->line('active_quiz'); ?>
                    </a>
                </div>
                <div class="card-body">
                    <?php echo $active; ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-header" style="<?php if ($stat == 'upcoming') {
                    echo 'background:#eeeeee;';
                } ?> ">
                    <a href="<?php echo site_url('quiz/index/' . $limit . '/table/upcoming'); ?>">   <?php echo $this->lang->line('upcoming_quiz'); ?>
                    </a>
                </div>
                <div class="card-body">
                    <?php echo $upcoming; ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-header" style="<?php if ($stat == 'archived') {
                    echo 'background:#eeeeee;';
                } ?> ">
                    <a href="<?php echo site_url('quiz/index/' . $limit . '/table/archived'); ?>">  <?php echo $this->lang->line('archived_quiz'); ?>
                    </a>
                </div>
                <div class="card-body">
                    <?php echo $archived; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>

            <table class="table table-bordered" id="table_quiz">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('quiz_name'); ?></th>
                    <th><?php echo $this->lang->line('noq'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['quid']; ?></td>
                        <td><?php echo substr(strip_tags($val['quiz_name']), 0, 50); ?></td>
                        <td><?php echo $val['noq']; ?></td>
                        <td>
                            <?php
                            if ($val['quiz_price'] == 0 || in_array($val['quid'], $purchased_quiz)) {
                                if ($val['end_date'] >= time()) {
                                    ?>
                                    <a href="<?php echo site_url('quiz/quiz_detail/' . $val['quid']); ?>"
                                       class="btn btn-success"><?php echo $this->lang->line('attempt'); ?> </a>
                                    <?php
                                }
                                if ($val['end_date'] < time()) { ?><<
                                    <a href="#" class="btn btn-warning"><?php echo $this->lang->line('expired'); ?> </a>
                                    <?php
                                }
                                if ($val['start_date'] > time()) { ?>
                                    <a href="#"
                                       class="btn btn-primary"><?php echo $this->lang->line('upcoming'); ?> </a>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $acp = explode(',', $logged_in['quiz']);
                            if (in_array('List_all', $acp)) {
                                ?>
                                <a href="<?php echo site_url('quiz/edit_quiz/' . $val['quid']); ?>">
                                    <i class="fas fa-edit" style="color:#3472f7;"></i></a>
                                <a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid']; ?>',
                                    '<?php echo $this->lang->line('warning_remove') ?>');">
                                    <i class="fas fa-trash" style="color:#3472f7;"></i>
                                </a>
                                <?php
                            }
                            ?>
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
        $("#table_quiz").DataTable({
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