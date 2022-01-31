<div class="">
    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <h3 class="font-weight-bold text-center"><?php echo $title; ?></h3>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <form method="post" action="<?php echo site_url('user/edit_group/' . $gid); ?>">
                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?>
                <div class="form-group">
                    <label for="group_name"
                           class="font-weight-bold"><?php echo $this->lang->line('group_name'); ?></label>
                    <input type="text" required name="group_name" class="form-control"
                           value="<?php echo $group['group_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="description"
                           class="font-weight-bold"><?php echo $this->lang->line('description'); ?></label>
                    <textarea name="description"
                              class="form-control">   <?php echo $group['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="subscription_expired_init" class="font-weight-bold"><?php echo "Fecha Inicio"; ?></label>
                    <input type="date" name="subscription_expired_init" id="subscription_expired_init"
                           class="form-control" onchange="workingDaysBetweenDates();"
                           value="<?php echo $group['date_init']; ?>">
                </div>
                <div class="form-group">
                    <label for="subscription_expired_end"
                           class="font-weight-bold"><?php echo "Fecha Finalizacion"; ?></label>
                    <input type="date" name="subscription_expired_end" id="subscription_expired_end"
                           onChange="workingDaysBetweenDates();" class="form-control"
                           value="<?php echo $group['date_end']; ?>">
                </div>
                <div class="form-group" hidden>
                    <label for="inputEmail"><?php echo $this->lang->line('valid_for_days'); ?></label>
                    <input type="text" required name="valid_for_days" class="form-control" value=0
                           id="valid_for_days">
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
            </form>
        </div>
    </div>
</div>
