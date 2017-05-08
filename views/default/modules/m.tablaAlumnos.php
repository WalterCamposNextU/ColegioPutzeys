  <div class="tablaAl"></div>
    <table border="0" cellspacing="2" cellpadding="0" class="tabla"width="100%">
      <td>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Tercer Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Apellido Casada</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>F.Nacimiento</th>
        <th>Est. Civil</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>E-mail</th>
      </td>
      <td>
        <?php foreach ($tsArray as $data): ?>
        <tr>
            <td><?php echo $data['cod_carne'];?></td>
            <td><?php echo $data['primer_nombre'];?></td>
            <td><?php echo $data['segundo_nombre'];?></td>
            <td><?php echo $data['tercer_nombre'];?></td>
            <td><?php echo $data['primer_apellido'];?></td>
            <td><?php echo $data['segundo_apellido'];?></td>
            <td><?php echo $data['apellido_casada'] ?></td>
            <td><?php echo $data['edad'];?></td>
            <td><?php echo $data['sexo'] ?></td>
            <td><?php echo $data['fecha_nac'] ?></td>
            <td><?php echo $data['estado_civil'] ?></td>
            <td><?php echo $data['direccion'] ?></td>
            <td><?php echo $data['celular'] ?></td>
            <td><?php echo $data['email'] ?></td>
        </tr>
      </td>
<?php endforeach; ?>
    </table>
