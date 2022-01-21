<form enctype="multipart/form-data" id="form_new" method="post"
      action="<?php echo site_url('user/register_image/'); ?>">

    <div class="form-group">
        <label for="inputEmail"
               class="font-weight-bold"><?php echo $this->lang->line('cod_cd'); ?></label>
        <input type="text" name="code_student" class="form-control"
               placeholder="<?php echo $this->lang->line('cod_cd'); ?>" autofocus required>
    </div>
    <div class="col col-md-2">
        <div class="picture-container">
            <div aling="left;" class="picture">
                <img src="<?php echo base_url() . 'photo/users/photo.jpeg' ?>" align="left"
                     class="picture-src"
                     id="picturePreview" title="">
                <input type="file" id="picture" name="picture"
                       class="font-weight-bold">
            </div>
        </div>
    </div>
    <div class="col col-md-2">
        <button class="btn btn-primary"
                id="boton" type="submit"><?php echo $this->lang->line('submit'); ?></button>
    </div>

</form>