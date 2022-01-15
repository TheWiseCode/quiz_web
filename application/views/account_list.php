<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <?php if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    } ?>
    <div class="col-lg-12">
        <!--TODO: NO FUNCIONA VERSION FREE-->
        <a href="<?php echo site_url('payment_gateway'); ?>"
           class="btn btn-success"><?php echo $this->lang->line('add_new1'); ?></a><br><br>

        <div style="text-align: center;">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th><?php echo $this->lang->line('name'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['account_name']; ?></td>
                        <td>
                            <a href="<?php echo site_url('Account/edit_account/' . $val['account_id']); ?>">
                                <img src="<?php echo base_url('images/edit.png'); ?>"></a>
                            <?php
                            if ($val['account_id'] != 1 && $val['account_id'] != 2) {
                                ?>
                                <a href="<?php echo site_url('Account/pre_remove_account/' . $val['account_id']); ?>"><img
                                            src="<?php echo base_url('images/cross.png'); ?>"></a>
                            <?php } ?>

                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

