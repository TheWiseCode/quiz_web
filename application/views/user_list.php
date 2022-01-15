<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">

    <h3 class="font-weight-bold"><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('user/index/'); ?>">
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
                <tr>
                    <th>#</th>
                    <th><?php echo $this->lang->line('email'); ?></th>
                    <th><?php echo 'Nombre '; ?><?php echo 'Completo'; ?></th>
                    <th><?php echo 'Telefono'; ?> </th>
                    <th><?php echo 'Codigo de Estudiante'; ?> </th>
                    <th><?php echo $this->lang->line('first_career'); ?> </th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
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
                        <td><?php echo $val['email'] . ' ' . $val['wp_user']; ?></td>
                        <td><?php echo $val['first_name'] . ' '; ?><?php echo $val['last_name']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>
                        <td><?php echo $val['cod_student']; ?> </td>
                        <td><?php echo $val['first_opt_univ_degree']; ?></td>
                        <td>
                            <a href="<?php echo site_url(
                                'user2/view_user/' . $val['uid']
                            ); ?>"><i class="fa fa-eye" title="View Profile"></i></a>

                            <a href="<?php echo site_url(
                                'user/edit_user/' . $val['uid']
                            ); ?>"><img src="<?php echo base_url('images/edit.png'); ?>"></a>
                            <a href="javascript:remove_entry('user/remove_user/<?php echo $val['uid']; ?>',
                            '<?php echo $this->lang->line('warning_remove') ?>');"><img
                                        src="<?php echo base_url('images/cross.png'); ?>"></a>

                        </td>
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

    <a href="<?php echo site_url(
        'user/index/' . $back
    ); ?>" class="btn btn-primary"><?php echo $this->lang->line('back'); ?></a>
    &nbsp;&nbsp;
    <?php $next = $limit + $this->config->item('number_of_rows'); ?>

    <a href="<?php echo site_url(
        'user/index/' . $next
    ); ?>" class="btn btn-primary"><?php echo $this->lang->line('next'); ?></a>

    <div class="card mt-3">
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
                        <input type="submit" value="<?php echo $this->lang->line('import')?>" class="btn btn-secondary form-control">
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