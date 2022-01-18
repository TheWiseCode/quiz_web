<?php if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
} ?>
<div class="col-lg-12">
    <div class="col-lg-8">
        <h3 class="font-weight-bold"><?php echo $this->lang->line('add_new1'); ?> </h3>
        <form method="post" action="<?php echo site_url('user/custom_fields'); ?>">
            <br>
            <div class="form-group">
                <label class="font-weight-bold"><?php echo $this->lang->line('field_name'); ?></label>
                <input type="text" name="field_title" class="form-control" value="" required>
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><?php echo $this->lang->line('field_type'); ?></label>
                <select name="field_type" class="form-control">
                    <option value="text">Text</option>
                    <option value="password">Password</option>
                </select>

            </div>

            <div class="form-group">
                <label class="font-weight-bold"><?php echo $this->lang->line('field_validate'); ?></label>
                <input type="text" name="field_validate" class="form-control" value='pattern="[A-Za-z0-9]{1,100}"'>
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><?php echo $this->lang->line('field_value'); ?></label>
                <input type="text" name="field_value" class="form-control" value="">
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><?php echo $this->lang->line('display_at'); ?></label>
                <select name="display_at" class="form-control">
                    <option value="Registration">Registration</option>
                    <option value="Result">Before Showing Result</option>
                </select>

            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit'); ?></button>
            </div>

        </form>
        </form>
    </div>
    <div style="clear:both;"></div>
    <hr>
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div style="text-align: center;">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo $this->lang->line('field_name'); ?> </th>

                <th><?php echo $this->lang->line('action'); ?> </th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($custom_fields_list as $key => $val) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $val['field_title']; ?></td>
                    <td>
                        <a href="<?php echo site_url('user/edit_custom/' . $val['field_id']); ?>">
                            <i class="fas fa-edit"  style="color:#3472f7;"></i></a>

                        <a href="<?php echo site_url('user/remove_custom/' . $val['field_id']); ?>">
                            <i class="fas fa-trash"  style="color:#3472f7;"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

