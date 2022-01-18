<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form enctype="multipart/form-data" id="form_new" method="post"
              action="<?php echo site_url('user/insert_user/'); ?>">

            <div class="col-md-8">
                <br>

                <div class="login-panel panel panel-default">

                    <div class="panel-body">

                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="row">
                            <div class="col col-md-8">
                                <div class="form-group">
                                    <label for="inputEmail"
                                           class="font-weight-bold"><?php echo $this->lang->line('cod_cd'); ?></label>
                                    <input type="text" name="code_student" class="form-control"
                                           placeholder="<?php echo $this->lang->line('cod_cd'); ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="font-weight-bold"><?php echo "CI"; ?></label>
                                    <input type="text" name="ci" class="form-control" placeholder="<?php echo "CI"; ?>"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <br><br>
                                <div class="picture-container">
                                    <div aling="left;" class="picture">
                                        <img src="<?php echo base_url() . 'photo/users/photo.jpeg' ?>" align="left"
                                             class="picture-src"
                                             id="wizardPicturePreview" title="">
                                        <input type="file" id="wizard-picture" name="wizard-picture"
                                               class="font-weight-bold">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <div class="font-weight-bold">
                                    <div class="fingerprint">
                                        <label for="huella">Leer Huella</label><br>
                                        <a href="#" id="huella" onclick="launchBiometricReader()">
                                            <img src="<?php echo base_url() . 'images/huella.png' ?>" class="picture-src"
                                                 style="width: 80px; height: 120px;" title="Leer Huella">
                                        </a>
                                    </div>
                                    <script>
                                        function launchBiometricReader() {
                                            let code = document.getElementsByName("code_student")[0].value;
                                            let uid = '<?php echo $uid?>';
                                            if (code === undefined || code == '') {
                                                alert('Registre el codigo de postulante');
                                            } else {
                                                window.open('testus:' + code + ',' + uid);
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo "Seleccionar Expedicion"; ?></label>
                            <select class="form-control" name="exp" id="exp" placeholder="<?php echo "Expedido"; ?>">

                                <option value="BE">Beni</option>
                                <option value="PD">Pando</option>
                                <option value="SC">Santa Cruz</option>
                                <option value="CB">Cochabamba</option>
                                <option value="CH">Chuquisaca</option>
                                <option value="TJ">Tarija</option>
                                <option value="LP">La Paz</option>
                                <option value="OR">Oruro</option>
                                <option value="PT">Potosi</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('civil_status_select'); ?></label>
                            <select class="form-control" name="civil_status" id="civil_status"
                                    placeholder="<?php echo $this->lang->line('civil_status'); ?>">

                                <option value="Soltero(a)">Soltero(a)</option>
                                <option value="Casado(a)">Casado(a)</option>
                                <option value="Viduo(a)">Viduo(a)</option>
                                <option value="Divorciado(a)">Divorciado(a)</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('gender_select'); ?></label>
                            <select class="form-control" name="gender" id="gender"
                                    placeholder="<?php echo $this->lang->line('gender'); ?>">

                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('address'); ?></label>
                            <input type="text" name="address" class="form-control"
                                   placeholder="<?php echo $this->lang->line('address'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('nationality'); ?></label>
                            <input type="text" name="nationality" class="form-control"
                                   placeholder="<?php echo $this->lang->line('nationality'); ?>" autofocus>
                        </div>
                        <div hidden class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_first_career'); ?></label>
                            <select class="form-control" name="first_opt_univ_degree" id="first_opt_univ_degree">
                                <?php
                                foreach ($career_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
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

                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <link type="text/css" href="select2/select2.min.css">
                            <script src="select2/select2.min.js"></script>
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_university'); ?></label>
                            <select class="form-control" name="university" id="university">
                                <?php
                                foreach ($university_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_specialties'); ?></label>
                            <select class="form-control" name="specialties" id="specialties">
                                <?php
                                foreach ($specialties_list as $key => $val) {
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
                            <input type="text" name="contact_no" class="form-control"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('select_group'); ?></label>
                            <select class="form-control" name="gid" id="gid" onChange="getexpiry2();">
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
                            <label for="inputEmail font-weight-bold"><?php echo $this->lang->line('subscription_expired'); ?></label>
                            <input type="date" name="subscription_expired" id="subscription_expired"
                                   class="form-control" disabled
                                   placeholder="<?php echo $this->lang->line('subscription_expired'); ?>" autofocus>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"
                                   class="font-weight-bold"><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"
                                   class="font-weight-bold"><?php echo $this->lang->line('repeat_password'); ?></label>
                            <input type="password" id="inputPassword" name="repeat_password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('repeat_password'); ?>" required>
                        </div>
                        <?php /*<div class="form-group">
                        <label class="font-weight-bold"><?php echo  $this->lang->line('cd');?></label>
                            <input type="text" name="id_p" id="id_p" class="form-control"
                                   placeholder="el id" autofocus>
                        </div>*/ ?>


                        <button class="btn btn-primary"
                                id="boton" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                        <button class="btn btn-secondary"
                                id="imprimir" disabled="false"
                                type="submit"><?php echo $this->lang->line('print'); ?> </button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>
    getexpiry2();


</script>
<script>
    $(document).ready(function () {
// Prepare the preview for profile picture
        $("#wizard-picture").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload - = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    /*$("#form_new").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data != "")
            {
                var print = document.getElementById('id_p');
	            print.value = data;
                var print = document.getElementById('imprimir');
	            print.disabled = true;
            }

        }
    });
});*/


</script>