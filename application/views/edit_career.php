<div class="container">


    <h3 class="font-weight-bold"><?php echo $title; ?></h3>


    <div class="row">
        <form method="post" action="<?php echo site_url('user/edit_career/' . $id); ?>">

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
                            <label for="inputEmail" class="font-weight-bold"><?php echo $this->lang->line('career_name'); ?></label>
                            <input type="text" required name="career_name" class="form-control"
                                   value="<?php echo $career['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold"><?php echo $this->lang->line('code'); ?></label>
                            <input type="text" required name="code_career" class="form-control"
                                value="<?php echo $career['code_career']; ?>">
                        </div>

                        <button class="btn btn-primary"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
