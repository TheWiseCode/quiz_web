<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('qbank/index/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" name="search"
                           placeholder="<?php echo $this->lang->line('search'); ?>...">
                    <span class="input-group-append">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search'); ?></button>
      </span>
                </div><!-- /input-group -->
            </form>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <br>
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <div class="form-group">
                <form method="post"
                      action="<?php echo site_url('qbank/pre_question_list/' . $limit . '/' . $cid . '/' . $lid); ?>">
                    <div class="row">
                        <div class="col col-md-5">
                            <select name="cid" class="form-control">
                                <option value="0"><?php echo $this->lang->line('all_category'); ?></option>
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['cid']; ?>" <?php if ($val['cid'] == $cid) {
                                        echo 'selected';
                                    } ?> ><?php echo $val['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-md-5">
                            <select name="lid" class="form-control">
                                <option value="0"><?php echo $this->lang->line('all_level'); ?></option>
                                <?php
                                foreach ($level_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['lid']; ?>" <?php if ($val['lid'] == $lid) {
                                        echo 'selected';
                                    } ?> ><?php echo $val['level_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-md-2">
                            <button class="btn btn-secondary"
                                    type="submit"><?php echo $this->lang->line('filter'); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table table-bordered">
                <tr style="background: #4f7dea; color: white">
                    <th>#</th>
                    <th><?php echo $this->lang->line('question'); ?></th>
                    <th><?php echo $this->lang->line('question_type'); ?></th>
                    <th><?php echo $this->lang->line('category_name'); ?>
                        / <?php echo $this->lang->line('level_name'); ?></th>
                    <th><?php echo $this->lang->line('percent_corrected'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                <?php
                if (count($result) == 0) {
                    ?>
                    <tr>
                        <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>

                    <?php
                }
                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td>
                            <a href="javascript:show_question_stat('<?php echo $val['qid']; ?>');">+</a> <?php echo $val['qid']; ?>
                        </td>
                        <td><?php echo substr(strip_tags($val['question']), 0, 40); ?>

                            <span style="display:none;" id="stat-<?php echo $val['qid']; ?>">
 <table class="table table-bordered">
<tr><td><?php echo $this->lang->line('no_times_corrected'); ?></td><td><?php echo $val['no_time_corrected']; ?></td></tr>
<tr><td><?php echo $this->lang->line('no_times_incorrected'); ?></td><td><?php echo $val['no_time_incorrected']; ?></td></tr>
<tr><td><?php echo $this->lang->line('no_times_unattempted'); ?></td><td><?php echo $val['no_time_unattempted']; ?></td></tr>
</table>


 

 </span>
                        </td>
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
                            $qn = 1;
                            if ($val['question_type'] == ('multiple_choice_single_answer')) {
                                $qn = 1;
                            }
                            if ($val['question_type'] == ('multiple_choice_multiple_answer')) {
                                $qn = 2;
                            }
                            if ($val['question_type'] == ('match_the_column')) {
                                $qn = 3;
                            }
                            if ($val['question_type'] == ('short_answer')) {
                                $qn = 4;
                            }
                            if ($val['question_type'] == ('long_answer')) {
                                $qn = 5;
                            }
                            ?>
                            <a href="<?php echo site_url('qbank/edit_question_' . $qn . '/' . $val['qid']); ?>"><img
                                        src="<?php echo base_url('images/edit.png'); ?>"></a>
                            <a href="javascript:remove_entry('qbank/remove_question/<?php echo $val['qid']; ?>',
                                '<?php echo $this->lang->line('warning_remove') ?>');"><img
                                        src="<?php echo base_url('images/cross.png'); ?>"></a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </div>


    <?php
    if (($limit - ($this->config->item('number_of_rows'))) >= 0) {
        $back = $limit - ($this->config->item('number_of_rows'));
    } else {
        $back = '0';
    } ?>

    <a href="<?php echo site_url('qbank/index/' . $back . '/' . $cid . '/' . $lid); ?>"
       class="btn btn-primary"><?php echo $this->lang->line('back'); ?></a>
    &nbsp;&nbsp;
    <?php
    $next = $limit + ($this->config->item('number_of_rows')); ?>

    <a href="<?php echo site_url('qbank/index/' . $next . '/' . $cid . '/' . $lid); ?>"
       class="btn btn-primary"><?php echo $this->lang->line('next'); ?></a>

    <div class="card mt-3">
        <div class="card-header font-weight-bold">
            <?php echo $this->lang->line('import_question'); ?>
        </div>
        <div class="card-body">

            <?php echo form_open('qbank/import', array('enctype' => 'multipart/form-data')); ?>

            <div class="row mb-2">
                <input type="hidden" name="size" value="3500000">
                <div class="col col-md-12">
                    <label for="xslfile"><?php echo $this->lang->line('upload_excel'); ?></label>
                    <input type="file" name="xlsfile" accept=".xls" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-md-6">
                    <label for="cid"><?php echo $this->lang->line('select_category'); ?>)</label>
                    <select name="cid" class="form-control" required>
                        <?php
                        foreach ($category_list as $key => $val) {
                            ?>
                            <option value="<?php echo $val['cid']; ?>" <?php if ($val['cid'] == $cid) {
                                echo 'selected';
                            } ?> ><?php echo $val['category_name']; ?></option>
                            <?php
                        }
                        ?></select>
                </div>
                <div class="col col-md-6">
                    <label for="did"><?php echo $this->lang->line('select_category'); ?>)</label>
                    <select name="did" class="form-control" required>

                        <?php
                        foreach ($level_list as $key => $val) {
                            ?>

                            <option value="<?php echo $val['lid']; ?>" <?php if ($val['lid'] == $lid) {
                                echo 'selected';
                            } ?> ><?php echo $val['level_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-3">
                    <input type="submit" value="<?php echo $this->lang->line('import') ?>"
                           class="btn btn-secondary form-control">
                </div>
                <div class="col col-md-9">
                    <div class="form-control">
                        <a href="<?php echo base_url(); ?>sample/sample.xls"
                           target="new"><?php echo $this->lang->line('click_here'); ?>
                        </a> <?php echo $this->lang->line('upload_excel_info'); ?>
                    </div>
                </div>
            </div>
            </form>

        </div>


    </div>


    <div class="card" style="margin-top:20px;" hidden>
        <div class="card-header">
            <h4><?php echo $this->lang->line('import_question2'); ?></h4>
        </div>
        <div class="card-body">

            <?php echo form_open('word_import', array('enctype' => 'multipart/form-data')); ?>

            <div class="alert alert-warning"> <?php echo $this->lang->line('wordimportinfo'); ?></div>

            <select name="cid" required>
                <option value=""><?php echo $this->lang->line('select_category'); ?></option>
                <?php
                foreach ($category_list as $key => $val) {
                    ?>

                    <option value="<?php echo $val['cid']; ?>" <?php if ($val['cid'] == $cid) {
                        echo 'selected';
                    } ?> ><?php echo $val['category_name']; ?></option>
                    <?php
                }
                ?></select>
            <select name="lid" required>
                <option value=""><?php echo $this->lang->line('select_level'); ?></option>
                <?php
                foreach ($level_list as $key => $val) {
                    ?>

                    <option value="<?php echo $val['lid']; ?>" <?php if ($val['lid'] == $lid) {
                        echo 'selected';
                    } ?> ><?php echo $val['level_name']; ?></option>
                    <?php
                }
                ?>
            </select>

            <?php echo $this->lang->line('upload_doc'); ?>
            <input type="hidden" name="size" value="3500000">
            <input type="file" name="word_file" style="width:150px;float:left;margin-left:10px;">
            <div style="clear:both;"></div>
            <p style="padding:10px;"><a
                        href="javascript:advanceconfig();"><?php echo $this->lang->line('advance_options'); ?></a>
            </p>
            <div id="advanceconfig" style="padding:10px;display:none">
                <table>
                    <tr>
                        <td>Question Splitter:</td>
                        <td><input type="text" name="question_split" value="/Q:[0-9]+\)/"></td>
                    </tr>
                    <tr>
                        <td>Paragraph Splitter:</td>
                        <td><input type="text" name="paragraph_split" value="Paragraph:"></td>
                    </tr>
                    <tr>
                        <td>Description Splitter:</td>
                        <td><input type="text" name="description_split" value="/Sol:/"></td>
                    </tr>
                    <tr>
                        <td>Options Splitter:</td>
                        <td><input type="text" name="option_split" value="/[A-Z]:\)/"></td>
                    </tr>
                    <tr>
                        <td>Correct Option Splitter:</td>
                        <td><input type="text" name="correct_split" value="/Correct:/"></td>
                    </tr>
                </table>
            </div>

            <input type="submit" value="Import" style="margin-top:5px;" class="btn btn-default">

            <a href="<?php echo base_url(); ?>sample/sample.docx"
               target="new"><?php echo $this->lang->line('click_here'); ?>
                e</a> <?php echo $this->lang->line('upload_doc_info'); ?>
            </form>

        </div>


    </div>
    <script>

        function advanceconfig() {

            $('#advanceconfig').toggle();

        }


    </script>
    <br><br><br><br>
