<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('profile/update_applicant/' . $uid); ?>" enctype="multipart/form-data">
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
                                    echo $result['cod_student'];
                                    ?>" tabindex="1" readonly
                                           placeholder="<?php echo $this->lang->line('cod_cd'); ?>" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="ci_div1"
                                           class="font-weight-bold"><?php echo $this->lang->line('ci'); ?></label>
                                    <div class="row" id="civ_div1">
                                        <div class="input-group col col-md-12" id="ci_div">
                                            <input type="text" name="ci" class="form-control" value="<?php
                                            echo $result['ci'];
                                            ?>" tabindex="2" readonly
                                                   placeholder="<?php echo $this->lang->line('ci'); ?>"
                                                   autofocus required>
                                            <select class="form-control select2" name="exp" id="exp" tabindex="3" readonly="">
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
                                <label for="profile">&ensp;</label>
                                <div class="form-group">
                                    <div class="picture-container float-right" id="profile">
                                        <img src="<?php echo base_url($result['photo']) ?>"
                                             class="img-profile rounded rounded-1 border border-dark"
                                             style="width: 130px; height: 130px"
                                             id="wizardPicturePreview" title="Imagen de Perfil"
                                             onclick="openLoaderProfile()">
                                        <input type="file" id="wizard_picture" name="wizard_picture"
                                               accept="image/*" hidden>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name"
                                   class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control"
                                   value="<?php echo $result['first_name']; ?>"
                                   tabindex="4" readonly
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="last_name"
                                   class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control" value="<?php
                            echo $result['last_name'];
                            ?>" tabindex="5" readonly
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"
                                   for="civil_status"><?php echo $this->lang->line('civil_status_select'); ?></label>
                            <select class="form-control select2" name="civil_status" id="civil_status" tabindex="6" readonly="">
                                <?php
                                $status = $this->lang->line('status_civil');
                                for ($i = 0; $i < count($status); $i++) {
                                    echo "<option value='$status[$i]'";
                                    if ($result['civil_status'] == $status[$i])
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
                                    placeholder="<?php echo $this->lang->line('gender'); ?>" readonly="">
                                <?php
                                $genders = $this->lang->line('gender');
                                foreach ($genders as $it) {
                                    echo "<option value='$it'";
                                    if ($result['gender'] == $it)
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
                            echo $result['address'];
                            ?>" tabindex="8"
                                   placeholder="<?php echo $this->lang->line('address'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nationality"
                                   class="font-weight-bold"><?php echo $this->lang->line('nationality'); ?></label>
                            <select class="form-control" name="nationality" id="nationality" tabindex="9" required readonly="">
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
                            <select class="form-control" name="first_career" id="first_opt_univ_degree" readonly="">
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
                            <select class="form-control" name="second_career" id="second_opt_univ_degree" readonly="">
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
                            <label for="contact_no"
                                   class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control" value="<?php
                            echo $result['contact_no'];
                            ?>" tabindex="12" readonly
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" id="gid" tabindex="13" readonly="">
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
                            echo $result['email'];
                            ?>" tabindex="14" readonly
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
    <script>
        var image_loaded = false;

        $(document).ready(function () {
            $("#wizard_picture").change(function () {
                readURL(this);
            });
            $('#pre_save').on('click', function (e) {
                e.preventDefault();
                /*if ($('#wizard_picture').get(0).files.length === 0) {
                    alert('<?php echo $this->lang->line('register_photo');?>');
                    return false;
                } else {*/
                $('#submit').trigger("click");
                //}
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

        function openLoaderProfile() {
            $('#wizard_picture').click();
        }
    </script>


