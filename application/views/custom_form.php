<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>

    <div class="row">
        <form method="post" action="<?php echo site_url('user/edit_user_fill_custom/' . $uid . '/' . $rid); ?>">

            <div class="col-md-8">
                <br>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">


                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>




                        <?php
                        foreach ($custom_form as $fk => $fval) {

                            ?>
                            <div class="form-group">
                                <label for="inputEmail"><?php echo $fval['field_title']; ?></label>
                                <input type="<?php echo $fval['field_type']; ?>"
                                       name="custom[<?php echo $fval['field_id']; ?>]" class="form-control"
                                       value="<?php echo $fval['field_value']; ?>" <?php echo $fval['field_validate']; ?> >
                            </div>

                            <?php
                        }
                        ?>


                        <button class="btn btn-primary"
                                type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>


            </div>
        </form>
    </div>


</div>
<script>

</script>
