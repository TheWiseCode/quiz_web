<?php
$uid = $this->session->userdata('logged_in')['uid'];
?>
<style>
    label {
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="row mb-3">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3 class="font-weight-bold"><?php echo $title; ?></h3>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="float-right" style="padding-bottom: 1%;">
                <a href="<?php echo site_url('applicant/create'); ?>"
                   class="btn btn-labeled btn-primary">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span><?php echo $this->lang->line('add_applicant'); ?>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <?php if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } ?>
            <table class="table table-bordered table-responsive-md" id="table_uapplicants">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th><?php echo $this->lang->line('email'); ?></th>
                    <th><?php echo 'Nombre Completo'; ?></th>
                    <th><?php echo 'Telefono'; ?> </th>
                    <th><?php echo 'Codigo de postulante'; ?> </th>
                    <th><?php echo $this->lang->line('specialty'); ?> </th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['uid']; ?></td>
                        <td><?php echo $val['email'] . ' ' . $val['wp_user']; ?></td>
                        <td><?php echo $val['first_name'] . ' '; ?><?php echo $val['last_name']; ?></td>
                        <td><?php echo $val['contact_no']; ?></td>
                        <td><?php echo $val['cod_student']; ?> </td>
                        <td>
                            <?php
                            //echo $val['id_speciality'];
                            foreach ($speciality_list as $key => $vals) {
                                if ($vals['id'] == $val['id_speciality']) {
                                    echo $vals['name'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url(
                                'applicant/edit/' . $val['uid']
                            ); ?>"><i class="fa fa-edit" style="color:#3472f7;"></i></a>

                            <a href="javascript:remove_entry('applicant/remove/<?php echo $val['uid']; ?>',
                                '<?php echo $this->lang->line('warning_remove') ?>');">
                                <i class="fa fa-trash" style="color:#3472f7;"></i>
                            </a>
                            <a hidden href="<?php echo site_url(
                                'user2/view_user/' . $val['uid']
                            ); ?>"><i class="fa fa-eye" title="View Profile"></i></a>
                            <a title="Descargar Ficha Inscripcion" href="<?php echo site_url(
                                'user/view_inscription/' . $val['uid']
                            ); ?>"><i class="fa fa-download" style="color:rgb(40,206,61);"></i></a>
                            <a title="Descargar Carnet Inscripcion" href="<?php echo site_url(
                                'user/view_carnet/' . $val['uid']
                            ); ?>"><i class="fa fa-id-card" style="color:#f73434;"></i></a>
                            <a title="Verificar postulante" href="#"
                               onclick="launchBiometricReader('<?php echo $val['cod_student']; ?>')"
                            ><i class="fa fa-fingerprint" style="color:#000000;"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let value = "Mostrar "
        value += "<select class='custom-select custom-select-sm form-control form-control-sm'>";
        value += "<option value='10'>10</option>" + "<option value='25'>25</option>" + "<option value='50'>50</option>" + "<option value='100'>100</option>" + "<option value='-1'>Todos</option>";
        value += "</select>";
        value += " registros por pagina";
        let table = $("#table_uapplicants").DataTable({
            responsive: false,
            autoWidth: false,
            "language": {
                "lengthMenu": value,
                "zeroRecords":
                    "No pudimos encontrar nada, lo siento",
                "info":
                    "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty":
                    "Sin registros disponibles",
                "infoFiltered":
                    "(filtrado de _MAX_ registros totales)",
                "search":
                    "Buscar:",
                "paginate":
                    {
                        "next":
                            "Siguiente",
                        "previous":
                            "Anterior"
                    }
            }
        });
        table.responsive.recalc();
    });

    function launchBiometricReader(cod_cd) {
        let uid = '<?php echo $uid?>';
        window.open('testus:' + cod_cd + ',' + uid + ',' + '0');
    }
</script>