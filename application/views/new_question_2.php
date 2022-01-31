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
            <form method="post" id="qf" action="<?php echo site_url('qbank/new_question_2/' . $nop . '/' . $para); ?>">
                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <div class="form-group font-weight-bold">
                    <?php echo $this->lang->line('multiple_choice_multiple_answer'); ?>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_category'); ?></label>
                            <select class="form-control" name="cid">
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['cid']; ?>"><?php echo $val['category_name']; ?></option>
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
                                    <option value="<?php echo $val['lid']; ?>"><?php echo $val['level_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <?php
                if ($para == 1) {
                    foreach ($lang as $lkey => $val) {
                        $lno = $lkey != 0 ? $lkey : "";
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="inputEmail"
                                           class="font-weight-bold"><?php echo $this->lang->line('paragraph'); ?></label>
                                    <textarea name="paragraph<?php echo $lno; ?>" class="form-control"><?php
                                        if (isset($qp)) {
                                            echo $qp['paragraph' . $lno];
                                        } ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                foreach ($lang as $lkey => $val) {
                    $lno = $lkey != 0 ? $lkey : "";
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('question'); ?></label>
                                <textarea name="question<?php echo $lno; ?>" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                foreach ($lang as $lkey => $val) {
                    $lno = $lkey != 0 ? $lkey : "";
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('description'); ?></label>
                                <textarea name="description<?php echo $lno; ?>" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                for ($i = 1; $i <= $nop; $i++) {
                    ?>
                    <div class="row">
                        <?php
                        foreach ($lang as $lkey => $val) {
                            $lno = $lkey != 0 ? $lkey : "";
                            if ($lkey == 0) {
                                $lno = "";
                            }
                            ?>
                            <div class="col-12 col-sm12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="inputEmail"
                                           class="font-weight-bold"><?php echo $this->lang->line('options'); ?> <?php echo $i; ?>
                                        )</label> <br>
                                    <?php
                                    if ($lkey == 0) { ?><input type="checkbox" name="score[]"
                                                               value="<?php echo $i - 1; ?>" <?php if ($i == 1) {
                                            echo 'checked';
                                        } ?> ><?php echo $this->lang->line('select_correct_option'); ?>
                                    <?php } ?>
                                    <br><textarea name="option<?php echo $lno; ?>[]"
                                                  class="form-control"></textarea>
                                </div>
                            </div>
                            <?php
                        }
                        ?></div>
                    <?php
                }
                ?>

                <input type="hidden" name="parag" id="parag" value="0">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm- 6 col-md-6 col-lg-6 mb-2">
                            <button class="btn btn-success"
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
                <?php
                if ($para == 1) {
                    ?>
                    <button class="btn btn-primary" type="button"
                            onClick="javascript:parag();"><?php echo $this->lang->line('submit&add'); ?></button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<script>
    function parags() {
        $('#parag').val('1');
        $('#qf').submit();
    }
</script>
