<div class="container">
    <?php
    $logged_in = $this->session->userdata('logged_in');
    ?>

    <?php
    if ($logged_in['su'] == '1') {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="<?php echo site_url('result/generate_report/'); ?>">
                    <div class=" ">
                        <div><h3 class="font-weight-bold"><?php echo $this->lang->line('generate_report'); ?> </h3>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 col-md 6 col-lg-6">
                                <label for="quid"
                                       class="font-weight-bold"><?php echo $this->lang->line('select_quiz'); ?></label>
                                <select name="quid" class="form-control" id="sel_quiz">
                                    <option value="0"><?php echo $this->lang->line('all'); ?></option>
                                    <?php
                                    foreach ($quiz_list as $qk => $quiz) {
                                        ?>
                                        <option value="<?php echo $quiz['quid']; ?>"><?php echo $quiz['quiz_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md 6 col-lg-6">
                                <label for="gid"
                                       class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                                <select name="gid" class="form-control" id="sel_group">
                                    <option value="0"><?php echo $this->lang->line('all'); ?></option>
                                    <?php
                                    foreach ($group_list as $gk => $group) {
                                        ?>
                                        <option value="<?php echo $group['gid']; ?>"><?php echo $group['group_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <button class="btn btn-info form-control"
                                        type="submit"><?php echo $this->lang->line('generate_report'); ?></button>
                            </div>
                        </div>
                    </div><!-- /input-group -->
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <?php
    }
    ?>

    <hr>
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <?php
            if ($logged_in['su'] == '1') {
                ?>
                <div class='alert alert-danger'><?php echo $this->lang->line('pending_message_admin'); ?></div>
                <?php
            }
            ?>
            <table class="table table-bordered" id="table_result">
                <thead class="thead-light">
                <tr>
                    <th><?php echo $this->lang->line('result_id'); ?></th>
                    <th><?php echo $this->lang->line('first_name') . ' '; ?><?php echo $this->lang->line('last_name'); ?></th>
                    <th><?php echo $this->lang->line('quiz_name'); ?></th>
                    <th hidden><?php echo $this->lang->line('status'); ?></th>
                    <th><?php echo $this->lang->line('group_name'); ?></th>
                    <th><?php echo $this->lang->line('percentage_obtained'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['rid']; ?></td>
                        <td><?php echo $val['first_name'] . ' '; ?><?php echo $val['last_name']; ?></td>
                        <td><?php echo $val['quiz_name']; ?></td>
                        <td hidden><?php echo $this->lang->line($val['result_status']); ?></td>
                        <td><?php echo $val['group_name']; ?></td>
                        <td><?php echo $val['percentage_obtained']; ?>%</td>
                        <td>
                            <a href="<?php echo site_url('result/view_result/' . $val['rid']); ?>">
                                <i class="fas fa-eye" style="color:#3472f7;"></i></a>
                            <?php
                            if ($logged_in['su'] == '1') {
                                ?>
                                <a href="javascript:remove_entry('result/remove_result/<?php echo $val['rid']; ?>',
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

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    if ($logged_in['su'] == '1' && 0) {
        ?>
        <a href="<?php echo site_url('result/remove_result/0/1'); ?>"
           class="btn btn-primary"><?php echo $this->lang->line('cancel_opened'); ?></a>
        <?php
    }
    ?>

</div>
<script>
    var table;
    $(document).ready(function () {
        table = $("#table_result").DataTable({
            "dom":
                '<"top.row"' +
                '<"col-md-4"l><"col-md-4"><"col-md-4"f>' +
                '<"clear">>' +
                'rt' +
                '<"bottom row"' +
                '<"col-md-6"i><"col-md-6"p>' +
                '<"clear">>',
            lengthChange: true,
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            responsive: true,
            autoWidth: false,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
            language: {
                //"url": 'dataTables.german.json',
                buttons: {
                    colvis: "Columnas Visibles",
                },
                lengthMenu: "Mostrando _MENU_ registros por pagina",
                zeroRecords:
                    "No pudimos encontrar nada, lo siento",
                info:
                    "Mostrando pagina _PAGE_ de _PAGES_",
                infoEmpty:
                    "Sin registros disponibles",
                infoFiltered:
                    "(filtrado de _MAX_ registros totales)",
                search:
                    "Buscar:",
                paginate:
                    {
                        next:
                            "Siguiente",
                        previous:
                            "Anterior"
                    }
            }
        });
        $('#sel_group').change(function () {
            table.draw();
        });
        $('#sel_group').change(function () {
            table.draw();
        });
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            let groupText = $('#sel_group option:selected').text();
            let quizText = $('#sel_quiz option:selected').text();
            let group = $('#sel_group').val();
            let quiz = $('#sel_quiz').val();
            if (group == 0 && quiz == 0) {
                return true;
            }
            let testDt = data[2];
            let groupDt = data[4];
            if ((quizText == testDt || quiz == 0) && (groupDt == groupText || group == 0)) {
                return true;
            }
            return false;
        });
    });
</script>