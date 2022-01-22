<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    /*select.form-control {
        padding: 6px 12px 6px 12px !important;
        height: 18.4px !important;
    }*/
</style>
<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form enctype="multipart/form-data" id="form_new" method="post"
              onsubmit="return confirm('¿Está seguro de registrar los datos?');"
              action="<?php echo site_url('user/insert_user/'); ?>">
            <div class="col-md-8">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="row">
                            <div class="col col-md-9">
                                <div class="form-group">
                                    <label for="code_student"
                                           class="font-weight-bold"><?php echo $this->lang->line('cod_cd'); ?></label>
                                    <input type="text" name="code_student" class="form-control" value="<?php
                                    if ($code_student != null)
                                        echo $code_student;
                                    ?>" tabindex="1"
                                           placeholder="<?php echo $this->lang->line('cod_cd'); ?>" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="ci_div1"
                                           class="font-weight-bold"><?php echo $this->lang->line('ci'); ?></label>
                                    <div class="row" id="civ_div1">
                                        <div class="input-group col col-md-12" id="ci_div">
                                            <input type="text" name="ci" class="form-control" value="<?php
                                            if ($ci != null)
                                                echo $ci;
                                            ?>" tabindex="2"
                                                   placeholder="<?php echo $this->lang->line('ci'); ?>"
                                                   autofocus required>
                                            <select class="form-control" name="exp" id="exp" tabindex="3">
                                                <?php
                                                $expedidos = $this->lang->line('expedidos');
                                                $names = $this->lang->line('name_expedidos');
                                                for ($i = 0; $i < count($expedidos); $i++) {
                                                    echo "<option value='$expedidos[$i]'>$names[$i]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <label for="biometric_data"
                                       class="font-weight-bold">Fotografica</label>
                                <div class="row rounded" id="biometric_data">
                                    <div class="col col-md-6">
                                        <div class="picture-container" id="profile">
                                            <div class="">
                                                <img src="<?php echo base_url() . 'images/profile.jpg' ?>"
                                                     class="img-profile rounded rounded-1 border border-dark"
                                                     style="width: 120px; height: 120px;"
                                                     id="wizardPicturePreview" title="Imagen de Perfil"
                                                     onclick="openLoaderProfile()">
                                                <input type="file" id="wizard_picture" name="wizard_picture"
                                                       accept="image/*" hidden>
                                                <!--<input type="text" id="foto_valid" class="sr-only" value=""
                                                       oninvalid="this.setCustomValidity('Registre la foto del postulante')"
                                                       required>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name"
                                   class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control" value="<?php
                            if ($first_name != null)
                                echo $first_name;
                            ?>" tabindex="4"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="last_name"
                                   class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control" value="<?php
                            if ($last_name != null)
                                echo $last_name;
                            ?>" tabindex="5"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="civil_status"><?php echo $this->lang->line('civil_status_select'); ?></label>
                            <select class="form-control" name="civil_status" id="civil_status" tabindex="6"
                            style="height: 100%;">
                                <?php
                                $status = $this->lang->line('status_civil');
                                for ($i = 0; $i < count($status); $i++) {
                                    echo "<option value='$status[$i]'";
                                    if ($civil_status != null && $civil_status == $status[$i])
                                        echo selected;
                                    echo ">$status[$i]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="gender"><?php echo $this->lang->line('gender_select'); ?></label>
                            <select class="form-control" name="gender" id="gender" tabindex="7"
                                    placeholder="<?php echo $this->lang->line('gender'); ?>">
                                <?php
                                $genders = $this->lang->line('gender');
                                foreach ($genders as $it) {
                                    echo "<option value='$it'";
                                    if ($gender != null && $gender == $it)
                                        echo selected;
                                    echo ">$it</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"
                                   class="font-weight-bold"><?php echo $this->lang->line('address'); ?></label>
                            <input type="text" name="address" class="form-control" value="<?php
                            if ($address != null) echo $address;
                            ?>" tabindex="8"
                                   placeholder="<?php echo $this->lang->line('address'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nationality"
                                   class="font-weight-bold"><?php echo $this->lang->line('nationality'); ?></label>
                            <select class="form-control" name="nationality" id="nationality" tabindex="9" required>
                                <?php
                                foreach ($nationalities as $val) {
                                    ?>
                                    <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="first_opt_univ_degree"><?php echo $this->lang->line('select_first_career'); ?></label>
                            <select class="form-control" name="first_career" id="first_opt_univ_degree">
                                <?php
                                foreach ($career_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="second_opt_univ_degree"><?php echo $this->lang->line('select_second_career'); ?></label>
                            <select class="form-control" name="second_career" id="second_opt_univ_degree">
                                <?php
                                foreach ($career_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control" value="<?php
                            if ($contact_no != null) echo $contact_no;
                            ?>" tabindex="12"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" id="gid" onChange="getexpiry2();" tabindex="13">
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
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control" value="<?php
                            if ($email != null) echo $email;
                            ?>" tabindex="14"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>
                        <div class="form-group" hidden>
                            <label for="inputPassword"
                                   class="font-weight-bold"><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>">
                        </div>
                        <div class="form-group" hidden>
                            <label for="inputPassword"
                                   class="font-weight-bold"><?php echo $this->lang->line('repeat_password'); ?></label>
                            <input type="password" id="inputPassword" name="repeat_password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('repeat_password'); ?>">
                        </div>
                        <button class="btn btn-primary" tabindex="15"
                                id="boton" type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>
            </div>
        </form>
    </div>


</div>
<script>
    getexpiry2();
    $(document).ready(function () {
        $("#wizard_picture").change(function () {
            readURL(this);
        });
        $('.select2').select2();
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function openLoaderProfile() {
        $('#wizard_picture').click();
        $('#foto_valid').val('1');
    }
</script>