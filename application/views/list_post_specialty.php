<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('user/list_post_speciality/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line(
                        'search'
                    ); ?>...">
                    <span class="input-group-append">
                        <button class="btn btn-default"
                                type="submit"><?php echo $this->lang->line('search'); ?></button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->


    <div class="row">
        <div class="col-md-12">
            <br>
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>

            <table class="table table-bordered">
                <tr style="background: #3472f7; color: white;">
                    <th>#</th>
                    <th><?php echo 'Nombre'; ?></th>
                    <th><?php echo 'Code CD'; ?></th>
                    <th><?php echo 'fecha de inscripción'; ?></th>
                  
                </tr>
                <?php
                if (count($result) == 0) { ?>
                    <tr>
                        <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>


                <?php }
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['full_name']; ?></td>
                        <td><?php echo $val['cod_student']; ?></td>
                        <td><?php echo $val['fecha_r']?></td>
                        
                    </tr>

                <?php }
                ?>
            </table>
        </div>

    </div>


    <?php if ($limit - $this->config->item('number_of_rows') >= 0) {
        $back = $limit - $this->config->item('number_of_rows');
    } else {
        $back = '0';
    } ?>

   

    <div class="card mt-3" hidden>
        <div class="card-header font-weight-bold"><?php echo $this->lang->line('import_users'); ?></div>

        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="<?php echo site_url(
                'user/import'
            ); ?>">
                <div class="row mb-2">
                    <input type="hidden" name="size" value="3500000">
                    <div class="col col-md-6">
                        <label for="xslfile"><?php echo $this->lang->line('upload_excel'); ?></label>
                        <input type="file" name="xlsfile" accept=".xls" class="form-control">
                    </div>
                    <div class="col col-md-6">
                        <label for="gid"><?php echo $this->lang->line('select_group'); ?>)</label>
                        <select name="gid" required class="form-control">
                            <option value=""><?php echo $this->lang->line('select_group'); ?></option>
                            <?php foreach ($group_list as $key => $val) { ?>
                                <option value="<?php echo $val['gid']; ?>" <?php if ($val['gid'] == $gid) {
                                    echo 'selected';
                                } ?> ><?php echo $val['group_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-3">
                        <input type="submit" value="<?php echo $this->lang->line('import') ?>"
                               class="btn btn-secondary form-control">
                    </div>
                    <div class="col col-md-9">
                        <div class="form-control">
                            <a href="<?php echo base_url(); ?>sample/ejemplo lista de estudiantes.xls"
                               target="new"><?php echo $this->lang->line('click_here'); ?></a> <?php echo $this->lang->line('upload_excel_info'); ?>
                        </div>
                    </div>
                </div>

            </form>

        </div>


    </div>