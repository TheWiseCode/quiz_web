<!DOCTYPE html>
<html><head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head><body>

<TABLE FRAME="border" RULES="none" style="border-collapse: collapse ; width: 50%; ">
    <tr>
        <td style="background-color:#333;color: #fff; text-align: center;left;font-size:10px ;">
            COMITÉ REGIONAL DE INTEGRACION DOCENTE<br>ASISTENCIAL E INVESTIGACIÓN
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%; height: 4.5cm;">
                <tr>
                    <td style="text-align: left;font-size:12px;">
                        <b>Nombre:</b> <?php echo ' ' . $result['first_name'] . ' ' . $result['last_name']; ?>
                        <br><br>
                        <b>Especialidad:</b>

                        <?php
                        foreach ($speciality_list as $key => $vals) {
                            ?>

                            <?php
                            if ($vals['id'] == $result['id_speciality']) {
                                echo '  ' . $vals['name'];
                            }
                            ?>
                            <?php
                        }
                        ?>
                        <br><br>
                        <b>Departamento:</b> SANTA CRUZ
                        <br><br>
                        <b>Codigo CD:</b>
                        <?php echo ' ' . $result['cod_student'] ?>
                        <br><br>


                        <img src="<?php echo base_url('photo/default/logo_cf.jpeg') ?>" align="left" width="50"
                             height="50">
                    </td>
                    <td style="text-align: right;font-size:15px;">
                        <img src="<?php echo base_url($result['photo']) ?>" align="left"
                             width="100" height="100">
                        <br><br>
                        <b>CI:</b> <?php echo $result['ci'] . ' ' . $result['exp']; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body></html>