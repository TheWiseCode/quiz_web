<div class="container">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10"><h3 class="font-weight-bold"><?php echo $title; ?></h3></div>
        <div class="col-12 col-sm-12 col-md-2 col-lg-2">
            <a href="<?php echo site_url('quiz/edit_quiz/' . $quid); ?>"
               style="width: 100%;" class="btn btn-info mb-2"><?php echo $this->lang->line('close'); ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <input type="hidden" id="added" value="<?php echo $this->lang->line('added'); ?>">
            <table class="table table-bordered" id="table_questions">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('question'); ?></th>
                    <th><?php echo $this->lang->line('question_type'); ?></th>
                    <th><?php echo $this->lang->line('category_name'); ?></th>
                    <th><?php echo $this->lang->line('level_name'); ?></th>
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
                        <td><?php echo strip_tags($val['question']); ?>
                            <span style="display:none;" id="stat-<?php echo $val['qid']; ?>"></span>
                        </td>
                        <td><?php echo $this->lang->line($val['question_type']); ?></td>
                        <td><?php echo $val['category_name']; ?></td>
                        <td><?php echo $val['level_name']; ?></td>
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
                            <a href="javascript:addquestion('<?php echo $quid; ?>','<?php echo $val['qid']; ?>');"
                               class="btn btn-primary" id='q<?php echo $val['qid']; ?>'>
                                <?php
                                if (in_array($val['qid'], explode(',', $quiz['qids']))) {
                                    echo $this->lang->line('added');
                                } else {
                                    echo $this->lang->line('add');
                                }
                                ?>
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
        $("#table_questions").DataTable({
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