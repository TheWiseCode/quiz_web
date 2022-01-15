<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>

    <div class="row">
        <form method="post" action="<?php echo site_url('user/add_new_group'); ?>">

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
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('group_name'); ?></label>
                            <input type="text" required name="group_name" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('description'); ?></label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold"><?php echo "Fecha Inicio"; ?></label>
                            <input type="date" name="subscription_expired_init" id="subscription_expired_init"
                                   class="form-control"
                                   placeholder="<?php echo $this->lang->line('subscription_expired'); ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold"><?php echo "Fecha Finalizacion"; ?></label>
                            <input type="date" name="subscription_expired_end" id="subscription_expired_end"
                                   onChange="workingDaysBetweenDates();" class="form-control"
                                   placeholder="<?php echo $this->lang->line('subscription_expired'); ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail"
                                   class="font-weight-bold"><?php echo $this->lang->line('valid_for_days'); ?></label>
                            <input type="text" required name="valid_for_days" class="form-control" value=0 disabled
                                   id="valid_for_days">
                        </div>


                        <button class="btn btn-primary" type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>
    workingDaysBetweenDates();
</script>
