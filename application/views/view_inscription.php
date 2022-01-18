<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


</style>
</head>
<body>

<table>
  <tr>
    <th></th>
    <th></th>
    <th>
    <img src="<?php echo base_url().'photo/users/photo.jpeg' ?>" align="right" width="150" height="150">
    </th>
  </tr>
  <tr>
    <td>Datos Personales</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Codigo</td>
    <td><?php echo $result['cod_student']?></td>
    <td></td>
  </tr>
  <tr>
    <td>Nombres:</td>
    <td><?php echo $result['first_name']?></td>
    <td></td>
  </tr>
  <tr>
    <td>Apellidos:</td>
    <td><?php echo $result['last_name']?></td>
    <td></td>
  </tr>
  <tr>
    <td>CI:</td>
    <td><?php echo $result['ci']?></td>
    <td></td>
  </tr>
  
  <tr>
    <td>Domicilio:</td>
    <td><?php echo $result['address']?></td>
    <td></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td><?php echo $result['contact_no']?></td>
    <td></td>
  </tr>
  <tr>
    <td>Correo:</td>
    <td><?php echo $result['email']?></td>
    <td></td>
  </tr>
  <tr>
    <td>Correo:</td>
    <td><?php echo $result['email']?></td>
    <td></td>
  </tr>
</table>

</body>
</html>


