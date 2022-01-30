<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('profile/update_user/' . $uid); ?>"
              enctype="multipart/form-data">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 order-2 order-sm-2 order-md-0">
                                <div class="form-group">
                                    <label for="first_name"
                                           class="font-weight-bold"><?php echo $this->lang->line('first_name'); ?></label>
                                    <input type="text" name="first_name" class="form-control"
                                           value="<?php echo $result['first_name']; ?>"
                                           tabindex="4"
                                           placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name"
                                           class="font-weight-bold"><?php echo $this->lang->line('last_name'); ?></label>
                                    <input type="text" name="last_name" class="form-control" value="<?php
                                    echo $result['last_name'];
                                    ?>" tabindex="5"
                                           placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus
                                           required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 order-0 order-sm-0 order-md-6">
                                <label for="profile">&ensp;</label>
                                <div class="form-group">
                                    <div class="picture-container float-md-right float-lg-right" id="profile">
                                        <img src="<?php echo base_url($result['photo']) ?>"
                                             class="img-profile rounded rounded-1 border border-dark"
                                             style="height: 130px"
                                             id="wizardPicturePreview" title="Imagen de Perfil"
                                             onclick="openLoaderProfile()">
                                        <input type="file" id="wizard_picture" name="wizard_picture"
                                               accept="image/*" hidden>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_no"
                                   class="font-weight-bold"><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   value="<?php echo $result['contact_no']; ?>" tabindex="12"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control" value="<?php
                            echo $result['email'];
                            ?>" tabindex="14"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm- 6 col-md-6 col-lg-6 mb-2">
                                    <button class="btn btn-success" tabindex="15" style="width: 100%;"
                                            id="pre_save"
                                            type="submit"><?php echo $this->lang->line('submit'); ?></button>
                                </div>
                                <button onclick="" id="submit" type="submit"
                                        class="btn btn-primary" style="display: none">
                                </button>
                                <div class="col-12 col-sm- 6 col-md-6 col-lg-6">
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

