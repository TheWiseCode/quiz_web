<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('user/insert_user/'); ?>">

            <div class="col-md-8">
                <br>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="sr-only"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"
                                   class="sr-only"><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only"><?php echo "CI"; ?></label>
                            <input type="text" name="ci" class="form-control" placeholder="<?php echo "CI"; ?>"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only"><?php echo "Expedido"; ?></label>
                            <input type="text" name="exp" class="form-control" placeholder="<?php echo "Expedido"; ?>"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="sr-only"><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="sr-only"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only"><?php echo "Codigo de estudiante"; ?></label>
                            <input type="text" name="code_student" class="form-control"
                                   placeholder="<?php echo "Codigo de estudiante"; ?>" autofocus>

                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only"><?php echo "Primera opcion de carrera"; ?></label>
                            <input type="text" name="first_opt_univ_degree" class="form-control"
                                   placeholder="<?php echo "Primera opcion de carrera"; ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only"><?php echo "Segunda opcion de carrera"; ?></label>
                            <input type="text" name="second_opt_univ_degree" class="form-control"
                                   placeholder="<?php echo "Segunda opcion de carrera"; ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="sr-only"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" id="gid" onChange="getexpiry();">
                                <?php
                                foreach ($group_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['gid']; ?>"><?php echo $val['group_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><?php echo $this->lang->line('subscription_expired'); ?></label>
                            <input type="date" name="subscription_expired" id="subscription_expired"
                                   class="form-control"
                                   placeholder="<?php echo $this->lang->line('subscription_expired'); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label><?php echo $this->lang->line('account_type'); ?></label>
                            <select class="form-control" name="su">
                                <?php
                                foreach ($account_type as $ak => $val) {
                                    ?>
                                    <option value="<?php echo $val['account_id']; ?>"><?php echo $val['account_name']; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>


                        <button class="btn btn-default"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>
    getexpiry();
</script>
