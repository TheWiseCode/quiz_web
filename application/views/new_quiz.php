<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>"/>

<script type="text/javascript" src="<?php echo base_url('vendor/moment/js/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('vendor/transition/js/transition.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap-collapse.min.js'); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('quiz/insert_quiz/'); ?>">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="form-group">
                            <label for="quiz_name"
                                   class=" font-weight-bold"><?php echo $this->lang->line('quiz_name'); ?></label>
                            <input type="text" name="quiz_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('quiz_name'); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description"
                                   class="font-weight-bold"><?php echo $this->lang->line('description'); ?></label>
                            <textarea name="description" class="form-control tinymce_textarea"></textarea>
                        </div>

                        <a href="#" data-toggle="collapse"
                           data-target="#advance_options"><u><?php echo $this->lang->line('advance_options'); ?></u></a>

                        <div id="advance_options" class="collapse">
                            <div class="form-group">
                                <label for="start_date"
                                       class="font-weight-bold"><?php echo $this->lang->line('start_date'); ?></label>
                                <div class="input-group date my_datetime" id="">
                                    <input type="text" value="<?php echo date('d/m/Y H:i:s', time()); ?>"
                                           name="start_date" class="form-control" required/>
                                    <div class="input-group-addon input-group-append">
                                        <div class="input-group-text">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date"
                                       class="font-weight-bold"><?php echo $this->lang->line('end_date'); ?></label>
                                <div class="input-group date my_datetime" id="">
                                    <input type="text" value="<?php echo date('d/m/Y H:i:s', time()); ?>"
                                           name="end_date" class="form-control" required/>
                                    <div class="input-group-addon input-group-append">
                                        <div class="input-group-text">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="duration"
                                       class="font-weight-bold"><?php echo $this->lang->line('duration'); ?></label>
                                <input type="number" name="duration" value="10" class="form-control"
                                       placeholder="<?php echo $this->lang->line('duration'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="maximum_attempts"
                                       class="font-weight-bold"><?php echo $this->lang->line('maximum_attempts'); ?></label>
                                <input type="number" name="maximum_attempts" value="10" class="form-control"
                                       placeholder="<?php echo $this->lang->line('maximum_attempts'); ?>" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="pass_percentage"
                                       class="font-weight-bold"><?php echo $this->lang->line('pass_percentage'); ?></label>
                                <input type="number" name="pass_percentage" value="50" class="form-control"
                                       placeholder="<?php echo $this->lang->line('pass_percentage'); ?>" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="correct_score"
                                       class="font-weight-bold"><?php echo $this->lang->line('correct_score'); ?></label>
                                <input type="text" name="correct_score" value="1" class="form-control"
                                       placeholder="<?php echo $this->lang->line('correct_score'); ?>" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="incorrect_score"
                                       class="font-weight-bold"><?php echo $this->lang->line('incorrect_score'); ?></label>
                                <input type="text" name="incorrect_score" value="0" class="form-control"
                                       placeholder="<?php echo $this->lang->line('incorrect_score'); ?>" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="ip_address"
                                       class="font-weight-bold"><?php echo $this->lang->line('ip_address'); ?></label>
                                <input type="text" name="ip_address" value="" class="form-control"
                                       placeholder="<?php echo $this->lang->line('ip_address'); ?>">
                            </div>
                            <div class="form-group" hidden>
                                <label for="view_answer"
                                       class="font-weight-bold"><?php echo $this->lang->line('view_answer'); ?></label>
                                <br>
                                <input type="radio" name="view_answer" value="1"
                                       checked> <?php echo $this->lang->line('yes'); ?>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="view_answer" value="0"> <?php echo $this->lang->line('no'); ?>
                            </div>
                            <div class="form-group" hidden>
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('open_quiz'); ?></label>
                                <br>
                                <input type="radio" name="with_login" value="0"> <?php echo $this->lang->line('yes'); ?>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="with_login" value="1"
                                       checked> <?php echo $this->lang->line('no'); ?>
                            </div>

                            <div class="form-group" hidden>
                                <label for="inputEmail"
                                       class="font-weight-bold"><?php echo $this->lang->line('show_rank'); ?></label>
                                <br>
                                <input type="radio" name="show_chart_rank" value="1"
                                       checked> <?php echo $this->lang->line('yes'); ?>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="show_chart_rank"
                                       value="0"> <?php echo $this->lang->line('no'); ?>
                            </div>


                            <?php
                            if ($this->config->item('webcam') == true) {
                                ?>
                                <div class="form-group" hidden>
                                    <label for="camera_req"
                                           class="font-weight-bold"><?php echo $this->lang->line('capture_photo'); ?></label>
                                    <br>
                                    <input type="radio" name="camera_req"
                                           value="1"> <?php echo $this->lang->line('yes'); ?>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="camera_req" value="0"
                                           checked> <?php echo $this->lang->line('no'); ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <input type="hidden" name="camera_req" value="0">
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label class="font-weight-bold"><?php echo $this->lang->line('assign_to_group'); ?></label>
                                <br>
                                <?php
                                foreach ($group_list as $key => $val) {
                                    ?>
                                    <input type="checkbox" name="gids[]"
                                           value="<?php echo $val['gid']; ?>" <?php if ($key == 0) {
                                        echo 'checked';
                                    } ?> > <?php echo $val['group_name']; ?> &nbsp;&nbsp;&nbsp;
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="form-group" hidden>
                                <label class="font-weight-bold"><?php echo $this->lang->line('assign_to_student'); ?></label>
                                <br>
                                <select class="js-example-basic-multiple form-control" name="uids[]"
                                        multiple="multiple">
                                    <?php foreach ($user_list as $k => $uval) { ?>
                                        <option value="<?php echo $uval['uid']; ?>"><?php echo $uval['first_name'] . ' ' . $uval['last_name'] . ' (' . $uval['email'] . ')'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group" hidden>
                                <label class="font-weight-bold"><?php echo $this->lang->line('quiz_template'); ?></label>
                                <br>
                                <select name="quiz_template">
                                    <?php
                                    foreach ($this->config->item('quiz_templates') as $qk => $val) {
                                        ?>
                                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select><br>
                                <a href="<?php echo site_url('payment_gateway'); ?>">Enable Advance Template</a>
                                <p>Based on indian examination system</p>
                            </div>

                            <div class="form-group">
                                <label for="question_selection"
                                       class="font-weight-bold"><?php echo $this->lang->line('question_selection'); ?></label>
                                <br>
                                <input type="radio" name="question_selection"
                                       value="1"> <?php echo $this->lang->line('automatically'); ?><br>
                                <input type="radio" name="question_selection" value="0"
                                       checked> <?php echo $this->lang->line('manually'); ?>
                            </div>


                            <div class="form-group" hidden>
                                <label for="quiz_price"
                                       class="font-weight-bold"><?php echo $this->lang->line('quiz_price'); ?></label>
                                <br>
                                <input type="text" name="quiz_price" value="0" class="form-control"
                                       placeholder="<?php echo $this->lang->line('quiz_price'); ?>" readonly=readonly
                                       required>
                                <a href="<?php echo site_url('payment_gateway'); ?>">Enable this feature</a>
                            </div>
                            <div class="form-group" hidden>
                                <label for="gen_certificate"
                                       class="font-weight-bold"><?php echo $this->lang->line('generate_certificate'); ?></label>
                                <br>
                                <input type="radio" name="gen_certificate"
                                       value="1"> <?php echo $this->lang->line('yes'); ?><br>
                                <input type="radio" name="gen_certificate" value="0"
                                       checked> <?php echo $this->lang->line('no'); ?>
                            </div>
                            <div class="form-group" hidden>
                                <label for="certificate_text"
                                       class="font-weight-bold"><?php echo $this->lang->line('certificate_text'); ?></label>
                                <textarea name="certificate_text" class="form-control"></textarea><br>
                                <?php echo $this->lang->line('tags_use'); ?> <?php echo htmlentities("<br>  <center></center>  <b></b>  <h1></h1>  <h2></h2>   <h3></h3>    <font></font>"); ?>
                                <br>
                                {email}, {first_name}, {last_name}, {quiz_name}, {percentage_obtained},
                                {score_obtained}, {result}, {generated_date}, {result_id}, {qr_code}
                            </div>

                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit"><?php echo $this->lang->line('next'); ?></button>
                        <br>
                        <?php echo $this->lang->line('open_quiz_warning'); ?>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.my_datetime').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "DD/MM/YYYY HH:mm:ss",
        });
        $(".js-example-basic-multiple").select2();
    });
</script>