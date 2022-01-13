<div class="container">


    <h3><?php echo $title; ?></h3>
    <div class="row">

        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('user/index/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line(
                        'search'
                    ); ?>...">
                    <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line(
                'search'
            ); ?></button>
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


                        <td>

                            <a href="<?php echo site_url(
                                'user2/view_user/' . $val['uid']
                            ); ?>"><i class="fa fa-eye" title="View Profile"></i></a>

                            <a href="<?php echo site_url(
                                'user/edit_user/' . $val['uid']
                            ); ?>"><img src="<?php echo base_url('images/edit.png'); ?>"></a>
                            <a href="javascript:remove_entry('user/remove_user/<?php echo $val['uid']; ?>');"><img
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


    <br><br><br><br>
    <div class="card">
        <div class="card-heading"><?php echo $this->lang->line('import_users'); ?></div>

        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="<?php echo site_url(
                'user/import'
            ); ?>">

                <select name="gid" required>
                    <option value=""><?php echo 'Seleccionar Grupo'; ?></option>


                    <?php foreach ($group_list as $key => $val) { ?>

                        <option value="<?php echo $val['gid']; ?>" <?php if ($val['gid'] == $gid) {
                            echo 'selected';
                        } ?> ><?php echo $val['group_name']; ?></option>
                    <?php } ?>
                </select>


                <?php echo $this->lang->line('upload_excel'); ?>
                <input type="hidden" name="size" value="3500000">
                <input type="file" name="xlsfile" style="width:150px;float:left;margin-left:10px;">
                <div style="clear:both;margin-bottom:15px;"></div>
                <input type="submit" value="Import" style="margin-top:5px;" class="btn btn-default">

                <a href="<?php echo base_url(); ?>sample/ejemplo lista de estudiantes.xls"
                   target="new"><?php echo $this->lang->line('click_here'); ?></a> <?php echo $this->lang->line('upload_excel_info'); ?>

            </form>

        </div>


    </div>