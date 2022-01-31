<div class="container">
    <h3 class="font-weight-bold"><?php echo $this->lang->line('edit_account_type'); ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('account/update_account/' . $account_id); ?>">
            <div class="col-md-8">
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
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="users_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('users'); ?></label>
                                <div id="users_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="Add" id="user_c1" class="form-check-input"
                                               name="users[]" <?php if (in_array('Add', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c1">
                                            <?php echo $this->lang->line('add'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Edit" id="user_c2" class="form-check-input"
                                               name="users[]" <?php if (in_array('Edit', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c2">
                                            <?php echo $this->lang->line('edit'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="user_c3" class="form-check-input"
                                               name="users[]" <?php if (in_array('View', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c3">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="user_c4" class="form-check-input"
                                               name="users[]" <?php if (in_array('List', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c4">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="user_c5" class="form-check-input"
                                               name="users[]" <?php if (in_array('List_all', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c5">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Myaccount" id="user_c6" class="form-check-input"
                                               name="users[]" <?php if (in_array('Myaccount', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c6">
                                            <?php echo $this->lang->line('profile'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="user_c7" class="form-check-input"
                                               name="users[]" <?php if (in_array('Remove', explode(',', $result['users']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c7">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="appls_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('applicants'); ?></label>
                                <div id="appls_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="Add" id="appl_c1" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('Add', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="appl_c1">
                                            <?php echo $this->lang->line('add'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Edit" id="appl_c2" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('Edit', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c2">
                                            <?php echo $this->lang->line('edit'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="appl_c3" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('View', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c3">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="aapl_c4" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('List', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c4">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="appl_c5" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('List_all', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="appl_c5">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="appl_c6" class="form-check-input"
                                               name="applicants[]" <?php if (in_array('Remove', explode(',', $result['applicants']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="appl_c6">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="quiz_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('quiz'); ?></label>
                                <div id="quiz_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="Attempt" id="quiz_c0" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('Attempt', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="quiz_c0">
                                            <?php echo $this->lang->line('attempt'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Add" id="quiz_c1" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('Add', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="quiz_c1">
                                            <?php echo $this->lang->line('add'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Edit" id="quiz_c2" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('Edit', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c2">
                                            <?php echo $this->lang->line('edit'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="quiz_c3" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('View', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c3">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="aapl_c4" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('List', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c4">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="quiz_c5" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('List_all', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="appl_c5">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="quiz_c6" class="form-check-input"
                                               name="quiz[]" <?php if (in_array('Remove', explode(',', $result['quiz']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="quiz_c6">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="result_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('result'); ?></label>
                                <div id="result_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="result_c0" class="form-check-input"
                                               name="results[]" <?php if (in_array('View', explode(',', $result['results']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="quiz_c0">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="result_c1" class="form-check-input"
                                               name="results[]" <?php if (in_array('List', explode(',', $result['results']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="result_c1">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="result_c2" class="form-check-input"
                                               name="results[]" <?php if (in_array('List_all', explode(',', $result['results']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="result_c2">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="result_c3" class="form-check-input"
                                               name="results[]" <?php if (in_array('Remove', explode(',', $result['results']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="result_c3">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="ques_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('questions'); ?></label>
                                <div id="ques_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="Add" id="ques_c1" class="form-check-input"
                                               name="questions[]" <?php if (in_array('Add', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="ques_c1">
                                            <?php echo $this->lang->line('add'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Edit" id="ques_c2" class="form-check-input"
                                               name="questions[]" <?php if (in_array('Edit', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c2">
                                            <?php echo $this->lang->line('edit'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="ques_c3" class="form-check-input"
                                               name="questions[]" <?php if (in_array('View', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="ques_c3">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="ques_c4" class="form-check-input"
                                               name="questions[]" <?php if (in_array('List', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="ques_c4">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="ques_c5" class="form-check-input"
                                               name="questions[]" <?php if (in_array('List_all', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="ques_c5">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="ques_c6" class="form-check-input"
                                               name="questions[]" <?php if (in_array('Remove', explode(',', $result['questions']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="ques_c6">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="study_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('study_material'); ?></label>
                                <div id="study_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="Add" id="study_c1" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('Add', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="study_c1">
                                            <?php echo $this->lang->line('add'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Edit" id="study_c2" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('Edit', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c2">
                                            <?php echo $this->lang->line('edit'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="View" id="study_c3" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('View', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c3">
                                            <?php echo $this->lang->line('view'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List" id="aapl_c4" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('List', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="user_c4">
                                            <?php echo $this->lang->line('list'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="List_all" id="study_c5" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('List_all', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="study_c5">
                                            <?php echo $this->lang->line('list_all'); ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" value="Remove" id="study_c6" class="form-check-input"
                                               name="study_material[]" <?php if (in_array('Remove', explode(',', $result['study_material']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="study_c6">
                                            <?php echo $this->lang->line('remove'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <label for="setting_div"
                                       class="font-weight-bold"><?php echo $this->lang->line('setting'); ?></label>
                                <div id="setting_div">
                                    <div class="form-check">
                                        <input type="checkbox" value="All" id="setting_c1" class="form-check-input"
                                               name="setting" <?php if (in_array('All', explode(',', $result['setting']))) {
                                            echo 'checked';
                                        } ?> >
                                        <label class="form-check-label" for="setting_c1">
                                            <?php echo $this->lang->line('all'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm- 6 col-md-6 col-lg-6 mb-2">
                                    <button class="btn btn-success" tabindex="15"
                                            style="width: 100%;" id="pre_save"
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
