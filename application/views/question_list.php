<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <h3 class="font-weight-bold"><?php echo $this->lang->line('question_list'); ?></h3>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <a href="<?php echo site_url('qbank/pre_new_question') ?>"
               class="btn btn-labeled btn-primary" style="width: 100%;">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add'); ?>
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

            <table class="table table-bordered"
                   id="table_questions">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('question'); ?></th>
                    <th><?php echo $this->lang->line('question_type'); ?></th>
                    <th><?php echo $this->lang->line('category_name'); ?>
                        / <?php echo $this->lang->line('level_name'); ?></th>
                    <th><?php echo $this->lang->line('percent_corrected'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['qid']; ?></td>
                        <td><?php echo strip_tags($val['question']); ?></td>
                        <td><?php echo $this->lang->line($val['question_type']); ?></td>
                        <td><?php echo $val['category_name']; ?> / <span
                                    style="font-size:12px;"><?php echo $val['level_name']; ?></span></td>
                        <td><?php if ($val['no_time_served'] != '0') {
                                $perc = ($val['no_time_corrected'] / $val['no_time_served']) * 100;
                                ?>
                                <div style="background:#eeeeee;width:100%;height:10px;">
                                <div style="background:#449d44;width:<?php echo intval($perc); ?>%;height:10px;"></div>
                                <span style="font-size:10px;"><?php echo intval($perc); ?>%</span>
                                <?php
                            } else {
                                echo $this->lang->line('not_used');
                            } ?></td>
                        <td>
                            <?php
                            $options = ['multiple_choice_single_answer', 'multiple_choice_multiple_answer',
                                'match_the_column', 'short_answer', 'long_answer'];
                            $qn = 1;
                            for ($i = 1; $i < 5; $i++) {
                                if ($val['question_type'] == $options[$i - 1])
                                    $qn = $options[$i - 1];
                                $qn = $i;
                            }
                            ?>
                            <a href="<?php echo site_url('qbank/edit_question_' . $qn . '/' . $val['qid']); ?>">
                                <i class="fas fa-edit" style="color:#3472f7;"></i>
                            </a>
                            <a href="javascript:remove_entry('qbank/remove_question/<?php echo $val['qid']; ?>',
                                '<?php echo $this->lang->line('warning_remove') ?>');">
                                <i class="fas fa-trash" style="color:#3472f7;"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="mt-3 mb-3 col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="card-header font-weight-bold">
                    <?php echo $this->lang->line('import_question'); ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('qbank/import'); ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="size" value="3500000">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="xslfile"><?php echo $this->lang->line('upload_excel'); ?></label>
                                <input type="file" name="xlsfile" accept=".xls" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="cid"><?php echo $this->lang->line('select_category'); ?>:</label>
                                <select name="cid" class="form-control" required>
                                    <?php
                                    foreach ($category_list as $key => $val) {
                                        ?>
                                        <option value="<?php echo $val['cid']; ?>" <?php if ($val['cid'] == $cid) {
                                            echo selected;
                                        } ?> ><?php echo $val['category_name']; ?></option>
                                        <?php
                                    }
                                    ?></select>
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="did"><?php echo $this->lang->line('select_level'); ?>:</label>
                                <select name="did" class="form-control" required>
                                    <?php
                                    foreach ($level_list as $key => $val) {
                                        ?>
                                        <option value="<?php echo $val['lid']; ?>" <?php if ($val['lid'] == $lid) {
                                            echo selected;
                                        } ?> ><?php echo $val['level_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3">
                                <input type="submit" value="<?php echo $this->lang->line('import') ?>"
                                       class="btn btn-secondary form-control">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-9 col-lg-9">
                                <a href="<?php echo base_url(); ?>sample/sample.xls"
                                   target="new"><?php echo $this->lang->line('click_here'); ?>
                                </a> <?php echo $this->lang->line('upload_excel_info'); ?>
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
        $("#table_questions").DataTable({
            responsive: true,
            autoWidth: false,
            columnDefs: [
                {responsivePriority: 1, targets: 1},
            ],
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
