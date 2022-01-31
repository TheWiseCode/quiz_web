<style>
    label {
        font-weight: bold;
    }
</style>
<div class="">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <form method="post" action="<?php echo site_url('qbank/pre_new_question/'); ?>">
        <?php
        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
        }
        ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label><?php echo $this->lang->line('select_question_type'); ?></label>
                    <select class="form-control" name="question_type" onChange="hidenop(this.value);">
                        <option value="1"><?php echo $this->lang->line('multiple_choice_single_answer'); ?></option>
                        <option value="2"><?php echo $this->lang->line('multiple_choice_multiple_answer'); ?></option>
                        <option value="3"><?php echo $this->lang->line('match_the_column'); ?></option>
                        <option value="4"><?php echo $this->lang->line('short_answer'); ?></option>
                        <option value="5"><?php echo $this->lang->line('long_answer'); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group" id="nop">
                    <label for="inputEmail"><?php echo $this->lang->line('nop'); ?></label>
                    <input type="number" name="nop" class="form-control" value="4">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <input type="checkbox" name="with_paragraph"
                           value="1"> <?php echo $this->lang->line('with_paragraph'); ?></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <button class="btn btn-success" tabindex="15"
                            style="width: 100%;" id="pre_save"
                            type="submit"><?php echo $this->lang->line('next'); ?></button>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <button type="button" class="btn btn-danger" onclick="window.history.back();"
                            style="width: 100%;">
                        <?php echo $this->lang->line('cancel'); ?>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
