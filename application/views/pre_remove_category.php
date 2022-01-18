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

            <form method="post" action="<?php echo site_url('qbank/remove_category/' . $cid); ?>">

                <div class="form-group">
                    <?php echo $this->lang->line('remove_category_message'); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-md-6">
                            <select name="mcid" class="form-control">
                                <?php
                                foreach ($category_list as $gk => $val) {
                                    if ($cid != $val['cid']) {
                                        ?>
                                        <option value="<?php echo $val['cid']; ?>"><?php echo $val['category_name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                </div>


                <button class="btn btn-danger" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                <a href="<?php echo site_url('qbank/category_list'); ?>"
                   class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>

                </td>
                </tr>
                </table>
            </form>
        </div>

    </div>


</div>
