<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('user/insert_user2/'); ?>">

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
                            <label for="inputEmail" class="font-weight-bold"><?php echo "CI"; ?></label>
                            <input type="text" name="ci" class="form-control" placeholder="<?php echo "CI"; ?>"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo "Seleccionar Expedido"; ?></label>
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
                            <label for="inputEmail" class="font-weight-bold"
                            ><?php echo $this->lang->line('first_name'); ?></label>
                            <input type="text" name="first_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('first_name'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold"
                            ><?php echo $this->lang->line('last_name'); ?></label>
                            <input type="text" name="last_name" class="form-control"
                                   placeholder="<?php echo $this->lang->line('last_name'); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold"
                            ><?php echo $this->lang->line('contact_no'); ?></label>
                            <input type="text" name="contact_no" class="form-control"
                                   placeholder="<?php echo $this->lang->line('contact_no'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('account_type'); ?></label>
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

                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold">
                            <?php echo $this->lang->line('email_address'); ?></label>
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                   placeholder="<?php echo $this->lang->line('email_address'); ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="font-weight-bold"
                            ><?php echo $this->lang->line('password'); ?></label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('password'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="font-weight-bold"
                            ><?php echo $this->lang->line('repeat_password'); ?></label>
                            <input type="password" id="inputPassword" name="repeat_password" class="form-control"
                                   placeholder="<?php echo $this->lang->line('repeat_password'); ?>" required>
                        </div>
                        <button class="btn btn-primary"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>
    getexpiry2();
</script>
