<div class="container">


    <h3><?php echo $title; ?></h3>


    <div class="row">
        <form method="post" action="<?php echo site_url('user/add_new_career'); ?>">

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
                            <label for="inputEmail"><?php echo $this->lang->line('career_name'); ?></label>
                            <input type="text" required name="career_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail"><?php echo $this->lang->line('code'); ?></label>
                            <input type="text" required name="code_career" class="form-control">
                        </div>

                        <button class="btn btn-default"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>
    workingDaysBetweenDates();
</script>
