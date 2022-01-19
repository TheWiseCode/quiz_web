<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('user/update_user_admin/' . $uid); ?>">

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
                            <label class="font-weight-bold"><?php echo $this->lang->line('ci'); ?></label>
                            <input type="text" name="ci" class="form-control" value="<?php echo $result['ci']; ?>"
                                   autofocus required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo "Seleccionar Expedido"; ?></label>
                            <select class="form-control" name="exp" id="exp" placeholder="<?php echo "Expedido"; ?>"
                                    required>
                                <?php
                                $expedidos = $this->lang->line('expedidos');
                                $names = $this->lang->line('name_expedidos');
                                for ($i = 0; $i < count($expedidos); $i++) {
                                    echo "<option value='$expedidos[$i]'";
                                    if ($result['exp'] == $expedidos[$i]) {
                                        echo selected;
                                    }
                                    echo ">$names[$i]</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control"
                                   value="<?php echo $result['first_name']; ?>" required
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control"
                                   value="<?php echo $result['last_name']; ?>" required
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   value="<?php echo $result['contact_no']; ?>" required
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus>
                        </div>

                        <?php
                        if ($result['su'] == '1') {
                            ?>
                            <div class="form-group">
                                <label class="font-weight-bold"><?php echo $this->lang->line('account_type'); ?></label>
                                <select class="form-control" name="su">
                                    <?php
                                    foreach ($account_type as $ak => $val) {
                                        ?>
                                        <option value="<?php echo $val['account_id']; ?>"<?php if ($result['su'] == $val['account_id']) {
                                            echo 'selected';
                                        } ?> ><?php echo $val['account_name']; ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="form-group" hidden>
                            <label class="font-weight-bold"><?php echo $this->lang->line('account_status'); ?></label>
                            <select class="form-control" name="user_status">
                                <option value="Active" <?php if ($result['user_status'] == 'Active') {
                                    echo 'selected';
                                } ?> ><?php echo $this->lang->line('active'); ?></option>
                                <option value="Inactive" <?php if ($result['user_status'] == 'Inactive') {
                                    echo 'selected';
                                } ?> ><?php echo $this->lang->line('inactive'); ?></option>
                            </select>
                        </div>
                        <?php
                        foreach ($custom_form as $fk => $fval) {
                            ?>
                            <div class="form-group">
                                <label for="inputEmail"><?php echo $fval['field_title']; ?></label>
                                <input type="<?php echo $fval['field_type']; ?>"
                                       name="custom[<?php echo $fval['field_id']; ?>]" class="form-control"
                                       value="<?php echo $custom_form_user[$fval['field_id']]; ?>" <?php echo $fval['field_validate']; ?> >
                            </div>

                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="sr-only"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" value="<?php echo $result['email']; ?>"
                                   class="form-control" placeholder="<?php echo $this->lang->line('email_address'); ?>"
                                   required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"
                                   class="sr-only"><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" value="" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"
                                   class="sr-only"><?php echo $this->lang->line('repeat_password'); ?></label>
                            <input type="password" id="repeat_password" name="repeat_password" value=""
                                   class="form-control"
                                   placeholder="<?php echo $this->lang->line('repeat_password'); ?>">
                        </div>

                        <button class="btn btn-primary"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>
    <script>
        getexpiry2();
    </script>
