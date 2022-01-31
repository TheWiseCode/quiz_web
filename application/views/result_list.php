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
                            
                            <div class="col col-md 6">
                                <label for="gid"
                                       class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                                <select name="gid" class="form-control">
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
                            <div class="col col-md 6">
                                <label for="quid"
                                       class="font-weight-bold"><?php echo $this->lang->line('select_quiz'); ?></label>
                                <select name="quid" class="form-control">
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
                        </div>

                        <div hidden class="row mb-2">
                            <div class="col col-md-6">
                                <label for="date1" class="font-weight-bold"><?php echo "Fecha de inicio"; ?></label>
                                <input type="date" name="date1" value="" class="form-control"
                                       placeholder="<?php echo $this->lang->line('date_from'); ?>">
                            </div>
                            <div  hidden class="col col-md-6">
                                <label for="date2" class="font-weight-bold"><?php echo "Fecha de fin"; ?></label>
                                <input type="date" name="date2" value="" class="form-control"
                                       placeholder="<?php echo $this->lang->line('date_to'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3">
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
        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('result/index/'); ?>">
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
            <table class="table table-bordered">
                <tr style="background: #3472f7; color: white;">
                    <th><?php echo $this->lang->line('result_id'); ?></th>
                    <th><?php echo $this->lang->line('first_name') . ' '; ?><?php echo $this->lang->line('last_name'); ?></th>
                    <th><?php echo $this->lang->line('quiz_name'); ?></th>
                    <th><?php echo $this->lang->line('status'); ?>
                        <select onChange="sort_result('<?php echo $limit; ?>',this.value);" class="">
                            <option value="0"><?php echo $this->lang->line('all'); ?></option>
                            <option value="<?php echo('pass'); ?>" <?php if ($status == ('pass')) {
                                echo 'selected';
                            } ?> ><?php echo $this->lang->line('pass'); ?></option>
                            <option value="<?php echo('fail'); ?>" <?php if ($status == ('fail')) {
                                echo 'selected';
                            } ?> ><?php echo $this->lang->line('fail'); ?></option>
                            <option value="<?php echo('pending'); ?>" <?php if ($status == ('pending')) {
                                echo 'selected';
                            } ?> ><?php echo $this->lang->line('pending'); ?></option>
                        </select>
                    </th>
                    <th><?php echo $this->lang->line('percentage_obtained'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                <?php
                if (count($result) == 0) {
                    ?>
                    <tr>
                        <td colspan="6"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>


                    <?php
                }

                foreach ($result as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['rid']; ?></td>
                        <td><?php echo $val['first_name'] . ' '; ?><?php echo $val['last_name']; ?></td>
                        <td><?php echo $val['quiz_name']; ?></td>
                        <td><?php echo $this->lang->line($val['result_status']); ?></td>
                        <td><?php echo $val['percentage_obtained']; ?>%</td>
                        <td>
                            <a href="<?php echo site_url('result/view_result/' . $val['rid']); ?>">
                                <i class="fas fa-eye"  style="color:#3472f7;"></i></a>
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
            </table>
        </div>

    </div>


    <?php
    if (($limit - ($this->config->item('number_of_rows'))) >= 0) {
        $back = $limit - ($this->config->item('number_of_rows'));
    } else {
        $back = '0';
    } ?>

    <a href="<?php echo site_url('result/index/' . $back . '/' . $status); ?>"
       class="btn btn-primary"><?php echo $this->lang->line('back'); ?></a>
    &nbsp;&nbsp;
    <?php
    $next = $limit + ($this->config->item('number_of_rows')); ?>

    <a href="<?php echo site_url('result/index/' . $next . '/' . $status); ?>"
       class="btn btn-primary"><?php echo $this->lang->line('next'); ?></a>


    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    if ($logged_in['su'] == '1') {
        ?>
        <a href="<?php echo site_url('result/remove_result/0/1'); ?>"
           class="btn btn-primary"><?php echo $this->lang->line('cancel_opened'); ?></a>
        <?php
    }
    ?>

</div>
