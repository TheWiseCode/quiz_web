<?php
$uid = $this->session->userdata('logged_in')['uid'];
?>
<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form enctype="multipart/form-data" id="form_new" method="post"
              onsubmit="return confirm('<?php echo $this->lang->line('confirm_submit'); ?>');"
              action="<?php echo site_url('applicant/insert/'); ?>">
            <div class="col-md-8">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="row">
                            <div class="col col-md-7">
                                <div class="form-group">
                                    <label for="code_student"
                                           class="font-weight-bold"><?php echo $this->lang->line('cod_cd'); ?></label>
                                    <input type="text" name="code_student" class="form-control" value="<?php
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
                                            <select class="form-control select2" name="exp" id="exp" tabindex="3">
                                                <?php
                                                $expedidos = $this->lang->line('expedidos');
                                                $names = $this->lang->line('name_expedidos');
                                                for ($i = 0; $i < count($expedidos); $i++) {
                                                    echo "<option value='$expedidos[$i]'";
                                                    if ($expedidos[$i] == $exp)
                                                        echo selected;
                                                    echo "'>$names[$i]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-5">
                                <label for="biometric_data"
                                       class="font-weight-bold"><?php echo $this->lang->line('biometric_data') ?></label>
                                <div class="row rounded" id="biometric_data">
                                    <div class="col col-md-6">
                                        <div class="picture-container float-right" id="profile">
                                            <img src="<?php echo base_url('images/profile.jpg') ?>"
                                                 class="img-profile rounded rounded-1 border border-dark"
                                                 style="width: 120px; height: 120px;"
                                                 id="wizardPicturePreview" title="Imagen de Perfil"
                                                 onclick="openLoaderProfile()">
                                            <input type="file" id="wizard_picture" name="wizard_picture"
                                                   accept="image/*" hidden>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="font-weight-bold">
                                            <div class="fingerprint">
                                                <a href="#" id="huella" onclick="launchBiometricReader()">
                                                    <img src="<?php echo base_url('images/huella.png') ?>"
                                                         class="img-fluid border border-dark rounded rounded-1"
                                                         title="Huella"
                                                         style="width: 120px; height: 120px;">
                                                </a>
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
                            echo $first_name;
                            ?>" tabindex="4"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="last_name"
                                   class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control" value="<?php
                            echo $last_name;
                            ?>" tabindex="5"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="civil_status"><?php echo $this->lang->line('civil_status_select'); ?></label>
                            <select class="form-control select2" name="civil_status" id="civil_status" tabindex="6">
                                <?php
                                $status = $this->lang->line('status_civil');
                                for ($i = 0; $i < count($status); $i++) {
                                    echo "<option value='$status[$i]'";
                                    if ($civil_status == $status[$i])
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
                                    if ($gender == $it)
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
                                    echo "<option value='$val'";
                                    if ($nationality == $val)
                                        echo selected;
                                    echo ">$val</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="university"><?php echo $this->lang->line('select_university'); ?></label>
                            <select class="form-control" name="university" id="university" tabindex="10"
                                <?php
                                if ($other_uni) echo disabled;
                                ?>
                            >
                                <?php
                                foreach ($university_list as $key => $val) {
                                    $id = $val['id'];
                                    $name = $val['name'];
                                    echo "<option value='$id' ";
                                    if ($university != null && $university == $id)
                                        echo selected;
                                    echo ">$name</option>";
                                }
                                ?>
                            </select>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="other_uni" name="other_uni"
                                       onchange="changeOtherUni()"
                                    <?php
                                    if ($other_uni) echo checked;
                                    ?>
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $this->lang->line('other') ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="div_another_uni" style="display: <?php
                        if ($other_uni) echo 'block'; else echo 'none';
                        ?>;">
                            <label class="font-weight-bold"><?php echo $this->lang->line('new_university') ?></label>
                            <input type="text" name="another_uni" class="form-control" id="another_uni"
                                   placeholder="<?php echo $this->lang->line('new_university'); ?>" autofocus
                                   value="<?php echo $another_uni; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_specialties'); ?></label>
                            <select class="form-control" name="specialties" id="specialties" tabindex="11"
                                <?php
                                if ($other_spe) echo disabled;
                                ?>
                            >
                                <?php
                                foreach ($specialties_list as $key => $val) {
                                    $id = $val['id'];
                                    $name = $val['name'];
                                    echo "<option value='$id' ";
                                    if ($specialties != null && $specialties == $id)
                                        echo selected;
                                    echo ">$name</option>";
                                }
                                ?>
                            </select>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="other_spe" name="other_spe"
                                       onchange="changeOtherSpe()"
                                    <?php
                                    if ($other_spe) echo checked;
                                    ?>
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $this->lang->line('other') ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="div_another_spe" style="display: <?php
                        if ($other_spe) echo 'block'; else echo 'none';
                        ?>;">
                            <label class="font-weight-bold"><?php echo $this->lang->line('new_specialty') ?></label>
                            <input type="text" name="another_spe" class="form-control" id="another_spe"
                                   placeholder="<?php echo $this->lang->line('new_specialty') ?>" autofocus
                                   value="<?php echo $another_spe; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact_no"
                                   class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control" value="<?php
                            echo $contact_no;
                            ?>" tabindex="12"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" id="gid" tabindex="13">
                                <?php
                                foreach ($group_list as $key => $val) {
                                    $id = $val['gid'];
                                    $name = $val['group_name'];
                                    echo "<option value='$id'";
                                    echo ">$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control" value="<?php
                            echo $email;
                            ?>" tabindex="14"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col col-md-6">
                                    <button class="btn btn-success" tabindex="15" style="width: 100%;"
                                            id="pre_save"
                                            type="submit"><?php echo $this->lang->line('submit'); ?></button>
                                </div>
                                <button onclick="" id="submit" type="submit"
                                        class="btn btn-primary" style="display: none">
                                </button>
                                <div class="col col-md-6">
                                    <button type="button" class="btn btn-danger" onclick="window.history.back();"
                                            style="width: 100%;">
                                        <?php echo $this->lang->line('cancel'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('input[type="text"]').keyup(function () {
            this.value = this.value.toUpperCase();
        });
        $("#wizard_picture").change(function () {
            readURL(this);
        });
        $('#pre_save').on('click', function (e) {
            e.preventDefault();
            if ($('#wizard_picture').get(0).files.length === 0) {
                alert('<?php echo $this->lang->line('register_photo');?>');
                return false;
            } else {
                $('#submit').trigger("click");
            }
        });
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

    function launchBiometricReader() {
        let code = document.getElementsByName("code_student")[0].value;
        let uid = '<?php echo $uid?>';
        if (code === undefined || code === '') {
            alert('Registre el codigo de postulante');
        } else {
            window.open('testus:' + code + ',' + uid + ',' + '1');
        }
    }

    function changeOtherUni() {
        let other_uni = document.getElementById('other_uni');
        if (other_uni.checked) {
            document.getElementById('university').setAttribute('disabled', 'disabled');
            document.getElementById('another_uni').removeAttribute('disabled');
            document.getElementById('div_another_uni').style.display = 'block';
        } else {
            document.getElementById('university').removeAttribute('disabled');
            document.getElementById('another_uni').setAttribute('disabled', 'disabled');
            document.getElementById('div_another_uni').style.display = 'none';
        }
    }

    function changeOtherSpe() {
        let other_uni = document.getElementById('other_spe');
        if (other_uni.checked) {
            document.getElementById('specialties').setAttribute('disabled', 'disabled');
            document.getElementById('another_spe').removeAttribute('disabled');
            document.getElementById('div_another_spe').style.display = 'block';
        } else {
            document.getElementById('specialties').removeAttribute('disabled');
            document.getElementById('another_spe').setAttribute('disabled', 'disabled');
            document.getElementById('div_another_spe').style.display = 'none';
        }
    }

    function openLoaderProfile() {
        $('#wizard_picture').click();
    }
</script>