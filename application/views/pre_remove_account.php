<div class="">
    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <h3 class="font-weight-bold text-center"><?php echo $this->lang->line('delete_account'); ?></h3>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <form method="post" action="<?php echo site_url('account/remove_account/' . $account_id); ?>">
                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <div id="message"></div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <?php echo $this->lang->line('remove_account_message'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">

                            <select name="maid" class="form-control">>
                                <?php
                                foreach ($result as $gk => $val) {
                                    if ($account_id != $val['account_id']) {
                                        ?>
                                        <option value="<?php echo $val['account_id']; ?>"><?php echo $val['account_name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                        <button class="btn btn-danger" style="width: 100%;"
                                type="submit"><?php echo $this->lang->line('delete'); ?></button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <a href="<?php echo site_url('account'); ?>" style="width: 100%;"
                           class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
