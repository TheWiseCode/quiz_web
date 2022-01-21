<div class="container">


    <h3 class="font-weight-bold"><?php echo $this->lang->line('edit_account_type'); ?></h3>


    <div class="row">
        <form method="post" action="<?php echo site_url('account/update_account/' . $account_id); ?>">

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
                            <label class="font-weight-bold"><?php echo $this->lang->line('name'); ?></label>&ensp;
                            <input type="text" name="name" value="<?php echo $result['account_name']; ?>"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('users'); ?></label>&ensp;<br>

                            <label>
                                <input type="checkbox" value="Add"
                                       name="users[]" <?php if (in_array('Add', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('add'); ?>
                            </label>&ensp;
                            &ensp;
                            <label>
                                <input type="checkbox" value="Edit"
                                       name="users[]" <?php if (in_array('Edit', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?>><?php echo $this->lang->line('edit'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="View"
                                       name="users[]" <?php if (in_array('View', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>

                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List"
                                       name="users[]" <?php if (in_array('List', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="users[]" <?php if (in_array('List_all', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Myaccount"
                                       name="users[]" <?php if (in_array('Myaccount', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('my_account'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Remove"
                                       name="users[]" <?php if (in_array('Remove', explode(',', $result['users']))) {
                                    echo 'checked';
                                } ?>><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('postulantes'); ?></label>&ensp;<br>

                            <label>
                                <input type="checkbox" value="Add"
                                       name="applicants[]" <?php if (in_array('Add', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('add'); ?>
                            </label>&ensp;
                            &ensp;
                            <label>
                                <input type="checkbox" value="Edit"
                                       name="applicants[]" <?php if (in_array('Edit', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?>><?php echo $this->lang->line('edit'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="View"
                                       name="applicants[]" <?php if (in_array('View', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>

                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List"
                                       name="applicants[]" <?php if (in_array('List', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="applicants[]" <?php if (in_array('List_all', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Remove"
                                       name="applicants[]" <?php if (in_array('Remove', explode(',', $result['applicants']))) {
                                    echo 'checked';
                                } ?>><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('quiz'); ?></label>&ensp;<br>
                            <label>
                                <input type="checkbox" value="Attempt"
                                       name="quiz[]" <?php if (in_array('Attempt', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('attempt'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Add"
                                       name="quiz[]" <?php if (in_array('Add', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('add'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Edit"
                                       name="quiz[]" <?php if (in_array('Edit', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('edit'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="View"
                                       name="quiz[]" <?php if (in_array('View', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>

                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List"
                                       name="quiz[]" <?php if (in_array('List', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="quiz[]" <?php if (in_array('List_all', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;

                            <label>
                                <input type="checkbox" value="Remove"
                                       name="quiz[]" <?php if (in_array('Remove', explode(',', $result['quiz']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;

                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('result'); ?></label>&ensp;<br>


                            <label>
                                <input type="checkbox" value="View"
                                       name="result[]" <?php if (in_array('View', explode(',', $result['results']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>

                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List"
                                       name="result[]" <?php if (in_array('List', explode(',', $result['results']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="result[]" <?php if (in_array('List_all', explode(',', $result['results']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;

                            <label>
                                <input type="checkbox" value="Remove"
                                       name="result[]" <?php if (in_array('Remove', explode(',', $result['results']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('questions'); ?></label>&ensp;<br>

                            <label>
                                <input type="checkbox" value="Add"
                                       name="questions[]" <?php if (in_array('Add', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('add'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Edit"
                                       name="questions[]" <?php if (in_array('Edit', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('edit'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="View"
                                       name="questions[]" <?php if (in_array('View', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>

                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="list"
                                       name="questions[]" <?php if (in_array('list', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="questions[]" <?php if (in_array('List_all', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;

                            <label>
                                <input type="checkbox" value="Remove"
                                       name="questions[]" <?php if (in_array('Remove', explode(',', $result['questions']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('study_material'); ?></label>&ensp;
                            <br>

                            <label>
                                <input type="checkbox" value="Add"
                                       name="study_material[]" <?php if (in_array('Add', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('add'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="Edit"
                                       name="study_material[]" <?php if (in_array('Edit', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('edit'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="View"
                                       name="study_material[]" <?php if (in_array('View', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('view'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List"
                                       name="study_material[]" <?php if (in_array('List', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list'); ?>
                            </label>&ensp;
                            <label>
                                <input type="checkbox" value="List_all"
                                       name="study_material[]" <?php if (in_array('List_all', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('list_all'); ?>
                            </label>&ensp;

                            <label>
                                <input type="checkbox" value="Remove"
                                       name="study_material[]" <?php if (in_array('Remove', explode(',', $result['study_material']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('remove'); ?>
                            </label>&ensp;

                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold"><?php echo $this->lang->line('setting'); ?></label>&ensp;<br>
                            <label>
                                <input type="checkbox" value="All"
                                       name="setting" <?php if (in_array('All', explode(',', $result['setting']))) {
                                    echo 'checked';
                                } ?> ><?php echo $this->lang->line('all'); ?>
                        </div>


                        <button class="btn btn-primary"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
