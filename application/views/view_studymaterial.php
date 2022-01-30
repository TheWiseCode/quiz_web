<div class="container">
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card panel-default">
                <div class="card-header" style="padding:10px;">
                    <h3 class="font-weight-bold"><?php echo $title . ' : ' . $result['title']; ?></h3>
                </div>
                <div class="card-body" style="padding:10px;">
                    <?php echo $result['study_description']; ?>
                    <br>
                    <?php
                    if ($result['attachment'] != '') {
                        $filenameee = explode('.', $result['attachment']);
                        $ext = $filenameee[count($filenameee) - 1];
                        ?>
                        <hr>
                        <?php
                        if ($ext == 'mp4' || $ext == 'ogg') {
                            ?>
                            <video width="320" height="240" controls>
                                <source src="<?php echo base_url('upload/' . $result['attachment']); ?>"
                                        type="video/mp4">
                                <source src="<?php echo base_url('upload/' . $result['attachment']); ?>"
                                        type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        <?php } else { ?>
                            <a href="<?php echo base_url('upload/' . $result['attachment']); ?>"
                               target="study_material">
                                <?php echo $this->lang->line('download'); ?><?php echo $this->lang->line('attachment'); ?></a>

                        <?php } ?>
                        <?php
                    }
                    ?>
                </div>
                <div class="card-footer" style="padding:10px;">
                    <span class="font-weight-bold"><?php echo $this->lang->line('category'); ?></span>: <?php echo $result['category_name']; ?>
                </div>
                <div class="card-footer" style="padding:10px;">
                    <span class="font-weight-bold"><?php echo $this->lang->line('group_name'); ?></span>: <br>
                    <?php
                    $gidz = explode(',', $result['gids']);
                    foreach ($groups as $group) { ?>
                        <?php
                        if (in_array($group['gid'], $gidz)) {
                            echo $group['group_name'];
                            echo ", ";
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <a href="<?php echo site_url('study_material/'); ?>" style="width: 100%;"
                   class="btn btn-primary"><?php echo $this->lang->line('back'); ?></a>
            </div>
        </div>
    </div>
</div>