<div class="container">
    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">

        <div class="col-md-12">
            <br>
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <div id="message"></div>

            <a href="<?php echo site_url('user/add_new_career'); ?>" class="btn btn-success"><?php echo $this->lang->line('add_new1'); ?></a>

            <table class="table table-bordered">
                <tr>
                    <th><?php echo $this->lang->line('career_name'); ?></th>
                    <th><?php echo $this->lang->line('code'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                <?php
                if (count($career_list) == 0) {
                    ?>
                    <tr>
                        <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>


                    <?php
                }

                foreach ($career_list as $key => $val) {
                    ?>
                    <tr>
                        <td> <?php echo $val['name']; ?></td>
                        <td>
                            <?php echo $val['code_career']; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('user/edit_career/' . $val['id']); ?>">
                                <i class="fas fa-edit"  style="color:#3472f7;"></i>
                            </a>
                            
                        </td>
                    </tr>

                    <?php
                }
                ?>

            </table>


        </div>

    </div>


</div>
