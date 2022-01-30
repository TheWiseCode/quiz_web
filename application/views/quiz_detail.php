<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>
            <form method="post" id="quiz_detail"
                  action="<?php echo site_url('quiz/validate_quiz/' . $quiz['quid']); ?>">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold"><?php echo $title; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 font-weight-bold">
                                <?php echo $this->lang->line('quiz_name'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <?php echo $quiz['quiz_name']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 font-weight-bold">
                                <?php echo $this->lang->line('description'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <?php echo $quiz['description']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 font-weight-bold">
                                <?php echo $this->lang->line('start_date'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <?php echo date('d/m/Y H:i:s', $quiz['start_date']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 font-weight-bold">
                                <?php echo $this->lang->line('end_date'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <?php echo date('d/m/Y H:i:s', $quiz['end_date']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 font-weight-bold">
                                <?php echo $this->lang->line('duration'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <?php echo $quiz['duration']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 font-weight-bold">
                                <?php echo $this->lang->line('maximum_attempts'); ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <?php echo $quiz['maximum_attempts']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success"
                                type="submit"><?php echo $this->lang->line('start_quiz'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>