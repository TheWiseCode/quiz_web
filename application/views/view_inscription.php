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

<table FRAME="vsides" RULES="none">
    <tr>

        <td colspan="4" style="text-align: center;"><b>Ficha de inscripción<b></td>


    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size:30px ; text-align: center;"><b>CRIDAIIC<b></td>
    </tr>

    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size:15px ; text-align: center;"><b>COMITÉ REGIONAL DE
                INTEGRACION DOCENTE<b></td>
    </tr>

    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size:15px ; text-align: center;"><b>ASISTENCIAL INVESTIGACIÓN E
                INTERACCIÓN COMUNITARIA<b></td>
    </tr>

    <tr>
        <th style="text-align: left;">
            <img src="<?php echo base_url() . '/photo/logo.jpeg' ?>" align="left" width="150" height="150">
        </th>
        <th></th>
        <th></th>
        <th style="text-align: right;">
            <img src="<?php echo base_url() . $result['photo'] ?>" align="right" width="150" height="150">
        </th>
    </tr>

    <tr>
        <td><b>Datos Personales<b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Codigo:<b></td>
        <td><?php echo $result['cod_student'] ?></td>
        <td><b>Especialidad:<b></td>
        <td>
            <?php
            foreach ($speciality_list as $key => $vals) {
                ?>

                <?php
                if ($vals['id'] == $result['id_speciality']) {
                    echo $vals['name'];
                }
                ?>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Nombres:<b></td>
        <td><?php echo $result['first_name'] ?></td>
        <td><b>Universidad:<b></td>
        <td>
            <?php
            foreach ($university_list as $key => $vals) {
                ?>

                <?php
                if ($vals['id'] == $result['id_university']) {
                    echo $vals['name'];
                }
                ?>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Apellidos:<b></td>
        <td><?php echo $result['last_name'] ?></td>
        <td><b>Otros<b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>CI:<b></td>
        <td><?php echo $result['ci'] ?></td>
        <td><b>Estado Civil:<b></td>
        <td><?php echo $result['civil_status']; ?><</td>
    </tr>

    <tr>
        <td><b>Domicilio:<b></td>
        <td><?php echo $result['address'] ?></td>
        <td><b>Fecha de inscripción:<b></td>
        <td><?php echo $result['registered_date']; ?> </td>
    </tr>
    <tr>
        <td><b>Celular:<b></td>
        <td><?php echo $result['contact_no'] ?></td>
        <td><b>Nacionalidad:<b></td>
        <td><?php echo $result['nationality']; ?></td>
    </tr>
    <tr>
        <td><b>Correo:<b></td>
        <td><?php echo $result['email'] ?></td>
        <td><b>Sexo:<b></td>
        <td><?php echo $result['sexo']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<TABLE FRAME="border" RULES="none" style="border-collapse: collapse ; width: 50%; high:30% ; ">
    <tr>
        <td style="background-color:#333;color: #fff; text-align: center;">COMITÉ REGIONAL DE INTEGRACION DOCENTE<br>
            ASISTENCIAL INVESTIGACIÓN E INTERACCIÓN COMUNITARIA
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" style="width: 100%">
                <tr>
                    <td style="text-align: left;font-size:15px ;">
                        Nombre: <?php echo ' ' . $result['first_name'] . ' ' . $result['last_name']; ?>
                        <br>
                        Especialidad:

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
                        <br>
                        Departamento:


                        <?php if ($result['exp'] == 'BE') {
                            echo '  ' . "Beni";
                        } ?>
                        <?php if ($result['exp'] == 'PD') {
                            echo '  ' . "Pando";
                        } ?>
                        <?php if ($result['exp'] == 'SC') {
                            echo '  ' . "Santa Cruz";
                        } ?>
                        <?php if ($result['exp'] == 'CBB') {
                            echo '  ' . "Cochabamba";
                        } ?>
                        <?php if ($result['exp'] == 'CH') {
                            echo '  ' . "Chuquisaca";
                        } ?>
                        <?php if ($result['exp'] == 'TJ') {
                            echo '  ' . "Tarija";
                        } ?>
                        <?php if ($result['exp'] == 'LP') {
                            echo '  ' . "La Paz";
                        } ?>
                        <?php if ($result['exp'] == 'OR') {
                            echo '  ' . "Oruro";
                        } ?>
                        <?php if ($result['exp'] == 'OR') {
                            echo '  ' . "Potosi";
                        } ?>
                        <br>
                        Codigo CD:

                        <?php echo ' ' . $result['cod_student'] ?>


                    </td>
                    <td style="text-align: right;"><img src="<?php echo base_url() . $result['photo'] ?>" align="left"
                                                        width="150" height="150"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" style="width: 100%">
                <tr>
                    <td style="text-align: left;"></td>
                    <td style="text-align: left;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: right;font-size:20px ;"> CI: <?php echo $result['ci'] ?></td>
    </tr>
</table>

</body></html>