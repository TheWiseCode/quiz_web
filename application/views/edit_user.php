<div class="container">


    <h3 class="font-weight-bold"><?php echo $title; ?></h3>


    <div class="row">
        <form method="post" action="<?php echo site_url('user/update_user/' . $uid); ?>">

            <div class="col-md-8">
                <br>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">


                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>

                        <?php /*<div class="form-group">
				<?php echo $this->lang->line('group_name');?>: <?php echo $result['group_name'];?>
				</div>*/ ?>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('ci'); ?></label>
                            <input type="text" name="ci" class="form-control" value="<?php echo $result['ci']; ?>"
                                   autofocus>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo "Seleccionar Expedido"; ?></label>
                            <select class="form-control" name="exp" id="exp" placeholder="<?php echo "Expedido"; ?>">
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
                                   value="<?php echo $result['first_name']; ?>"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control"
                                   value="<?php echo $result['last_name']; ?>"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('civil_status_select'); ?></label>
                            <select class="form-control" name="civil_status" id="civil_status"
                                    placeholder="<?php echo $this->lang->line('civil_status'); ?>">

                                <?php
                                $status = $this->lang->line('status_civil');
                                for ($i = 0; $i < count($status); $i++) {
                                    echo "<option value='$status[$i]'";
                                    if ($status[$i] == $result['civil_status']) {
                                        echo selected;
                                    }
                                    echo ">$status[$i]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('gender_select'); ?></label>
                            <select class="form-control" name="gender" id="gender"
                                    placeholder="<?php echo $this->lang->line('gender'); ?>">

                                <?php
                                $gender = $this->lang->line('gender');
                                foreach ($gender as $it) {
                                    echo "<option value='$it'";
                                    if ($result['sexo'] == $it) {
                                        echo selected;
                                    }
                                    echo ">$it</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('address'); ?></label>
                            <input type="text" name="address" class="form-control"
                                   value="<?php echo $result['address']; ?>"
                                   placeholder="<?php echo $this->lang->line('address'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('nationality'); ?></label>
                            <input type="text" name="nationality" class="form-control"
                                   value="<?php echo $result['nationality']; ?>"
                                   placeholder="<?php echo $this->lang->line('nationality'); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo "Codigo cd"; ?></label>
                            <input type="text" name="code_student" class="form-control"
                                   value="<?php echo $result['cod_student']; ?>"
                                   placeholder="<?php echo "Codigo de cd"; ?>" autofocus>

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_university'); ?></label>
                            <select class="form-control" name="university" id="university">
                                <?php
                                foreach ($university_list as $key => $val) {
                                    ?>
                                    <option <?php if ($result['id_university'] === $val['id']) {
                                        echo selected;
                                    } ?> value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_specialties'); ?></label>
                            <select class="form-control" name="specialties" id="specialties">
                                <?php
                                foreach ($speciality_list as $key => $val) {
                                    ?>

                                    <option <?php if ($result['id_speciality'] === $val['id']) {
                                        echo selected;
                                    } ?> value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div hidden class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_second_career'); ?></label>
                            <select class="form-control" name="second_opt_univ_degree" id="second_opt_univ_degree">
                                <?php
                                foreach ($career_list as $key => $val) {
                                    ?>

                                    <option <?php if ($result['second_opt_univ_degree'] === $val['name']) {
                                        echo selected;
                                    } ?> value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   value="<?php echo $result['contact_no']; ?>"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus>
                        </div>


                        <?php /*<div class="form-group">
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('skype_id');?></label> 
					<input type="text" name="skype_id"  class="form-control"  value="<?php echo $result['skype_id'];?>"  placeholder="<?php echo $this->lang->line('skype_id');?>"   autofocus>
			</div>*/ ?>

                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" onChange="getexpiry2();" id="gid">
                                <?php

                                foreach ($group_list as $key => $val) {
                                    ?>

                                    <option <?php if ($result['gid'] === $val['gid']) {
                                        echo selected;
                                    } ?> value="<?php echo $val['gid']; ?>"><?php echo $val['group_name']; ?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="inputEmail"><?php echo $this->lang->line('subscription_expired'); ?></label>
                            <input type="text" name="subscription_expired" id="subscription_expired" disabled
                                   class="form-control" value="<?php if ($result['subscription_expired'] != '0') {
                                echo date('Y-m-d', $result['subscription_expired']);
                            } else {
                                echo '0';
                            } ?>" placeholder="<?php echo $this->lang->line('subscription_expired'); ?>" value=""
                                   autofocus>
                        </div>


                        <div class="form-group" hidden>
                            <label class="font-weight-bold"><?php echo $this->lang->line('account_type'); ?></label>
                            <select disabled="disabled" class="form-control" name="su">
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
                                   class="font-weight-bold"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" value="<?php echo $result['email']; ?>"
                                   class="form-control" placeholder="<?php echo $this->lang->line('email_address'); ?>"
                                   required autofocus>
                        </div>
                        <div class="form-group" hidden>
                            <label for="inputPassword"
                                   class="sr-only"><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" value="" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>">
                        </div>
                        <div class="form-group" hidden>
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


