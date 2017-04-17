  <div class="tablaAl"></div>
    <table border="0" cellspacing="2" cellpadding="0" class="tabla"width="100%">
      <td>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>E-mail</th>
      </td>
      <td>
        <?php foreach ($tsArray as $data): ?>
        <tr>
            <td><?php echo $data['cod_carne'];?></td>
            <td><?php echo $data['primer_nombre'];?></td>
            <td><?php echo $data['segundo_nombre'];?></td>
            <td><?php echo $data['primer_apellido'];?></td>
            <td><?php echo $data['segundo_apellido'];?></td>
            <td><?php echo $data['edad'];?></td>
            <td><?php echo $data['tel_trabajo'] ?></td>
            <td><?php echo $data['email'] ?></td>
        </tr>
      </td>
<?php endforeach; ?>
    </table>
