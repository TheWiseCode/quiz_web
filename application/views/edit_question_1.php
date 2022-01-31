<div class="">
    <?php
    $lang = $this->config->item('question_lang');
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <h3 class="font-weight-bold text-center"><?php echo $title; ?></h3>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <form method="post" action="<?php echo site_url('qbank/edit_question_1/' . $question['qid']); ?>">


                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>

                <div class="form-group font-weight-bold">
                    <?php echo $this->lang->line('multiple_choice_single_answer'); ?>
                </div>


                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_category'); ?></label>
                            <select class="form-control" name="cid">
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['cid']; ?>" <?php if ($question['cid'] == $val['cid']) {
                                        echo 'selected';
                                    } ?> ><?php echo $val['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_level'); ?></label>
                            <select class="form-control" name="lid">
                                <?php
                                foreach ($level_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['lid']; ?>" <?php if ($question['lid'] == $val['lid']) {
                                        echo 'selected';
                                    } ?> ><?php echo $val['level_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <?php
                if (strip_tags($question['paragraph']) != "") {
                    foreach ($lang as $lkey => $val) {
                        $lno = $lkey != 0 ? $lkey : "";
                        ?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="inputEmail"
                                           class="font-weight-bold"><?php echo $this->lang->line('paragraph') . ' : '; ?></label>
                                    <textarea name="paragraph<?php echo $lno; ?>"
                                              class="form-control"><?php echo $question['paragraph' . $lno]; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>

                <?php

                foreach ($lang as $lkey => $val) {
                    $lno = $lkey != 0 ? $lkey : "";
                    ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('question') . ' : '; ?></label>
                                <textarea name="question<?php echo $lno; ?>"
                                          class="form-control"><?php echo $question['question' . $lno]; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                foreach ($lang as $lkey => $val) {
                    $lno = $lkey != 0 ? $lkey : "";
                    ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('description') . ' : ' . $val; ?></label>
                                <textarea name="description<?php echo $lno; ?>"
                                          class="form-control"><?php echo $question['description' . $lno]; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                foreach ($options as $key => $val) {

                    ?>
                    <div class="row">
                        <?php

                        foreach ($lang as $lkey => $la) {
                            $lno = $lkey != 0 ? $lkey : "";
                            ?>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="inputEmail"
                                           class="font-weight-bold"><?php echo $this->lang->line('options'); ?> <?php echo($key + 1); ?>
                                        ) <?php echo ' : '; ?></label> <br>
                                    <?php
                                    if ($lkey == 0) {
                                        ?><input type="radio" name="score"
                                                 value="<?php echo $key; ?>" <?php if ($val['score'] == 1) {
                                            echo 'checked';
                                        } ?> > <?php $this->lang->line('select_correct_option'); ?>
                                    <?php } ?><br>
                                    <textarea name="option<?php echo $lno; ?>[]"
                                              class="form-control"><?php echo $val['q_option' . $lno]; ?></textarea>
                                </div>
                            </div>
                            <?php
                        }
                        ?></div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm- 6 col-md-6 col-lg-6 mb-2">
                            <button class="btn btn-success" tabindex="15"
                                    style="width: 100%;" id="pre_save"
                                    type="submit"><?php echo $this->lang->line('submit'); ?></button>
                        </div>
                        <div class="col-12 col-sm- 6 col-md-6 col-lg-6">
                            <button type="button" class="btn btn-danger" onclick="window.history.back();"
                                    style="width: 100%;">
                                <?php echo $this->lang->line('cancel'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <div class="form-group">
                    <table class="table table-bordered">
                        <tr>
                            <td><?php echo $this->lang->line('no_times_corrected'); ?></td>
                            <td><?php echo $question['no_time_corrected']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('no_times_incorrected'); ?></td>
                            <td><?php echo $question['no_time_incorrected']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('no_times_unattempted'); ?></td>
                            <td><?php echo $question['no_time_unattempted']; ?></td>
                        </tr>

                    </table>

                </div>


            </div>
        </div>
    </div>


</div>
