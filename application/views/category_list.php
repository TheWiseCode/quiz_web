<div class="">
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

            <form method="post" action="<?php echo site_url('qbank/insert_category/'); ?>">

                <table class="table table-bordered">
                    <tr style="background: #3472f7; color: white;">
                        <th><?php echo $this->lang->line('category_name'); ?></th>
                        <th><?php echo $this->lang->line('action'); ?> </th>
                    </tr>
                    <?php
                    if (count($category_list) == 0) {
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                        </tr>
                        <?php
                    }

                    foreach ($category_list as $key => $val) {
                        ?>
                        <tr>
                            <td><input type="text" class="form-control" value="<?php echo $val['category_name']; ?>"
                                       onBlur="updatecategory(this.value,'<?php echo $val['cid']; ?>');"></td>
                            <td>
                                <a href="<?php echo site_url('qbank/pre_remove_category/' . $val['cid']); ?>">
                                    <i class="fas fa-trash" style="color:#3472f7;"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tr>
                        <td>

                            <input type="text" class="form-control" name="category_name" value=""
                                   placeholder="<?php echo $this->lang->line('category_name'); ?>" required></td>
                        <td>
                            <button class="btn btn-circle btn-primary"
                                    type="submit"><i class="fas fa-plus"></i></button>

                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>


</div>
