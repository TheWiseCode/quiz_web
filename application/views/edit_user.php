<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('user/update/' . $uid); ?>">
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
                            <div class="col col-md-9">
                                <div class="form-group">
                                    <label for="first_name"
                                           class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                                    <input type="text" name="first_name" class="form-control"
                                           value="<?php echo $result['first_name']; ?>" tabindex="4"
                                           placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name"
                                           class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                                    <input type="text" name="last_name" class="form-control"
                                           value="<?php echo $result['last_name']; ?>" tabindex="5"
                                           placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus
                                           required>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <label for="profile">&ensp;</label>
                                <div class="form-group">
                                    <div class="picture-container float-right" id="profile">
                                        <img src="<?php echo base_url($result['photo']); ?>"
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
                            <label for="inputEmail" class="font-weight-bold"
                            ><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   value="<?php echo $result['contact_no']; ?>"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus required>
                        </div>

                        <?php
                        $su = $this->session->userdata('logged_in')['su'];
                        if ($su == '1') {
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
                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold">
                                <?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                   value='<?php echo $result['email']; ?>'
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
            if ($('#wizard_picture').get(0).files.length === 0 && 0) {
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

    function openLoaderProfile() {
        $('#wizard_picture').click();
    }
</script>
