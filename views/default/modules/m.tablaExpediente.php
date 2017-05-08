  <div class="tablaAl"></div>
  <table border="0" cellspacing="2" cellpadding="0" class="tabla"width="100%">
    <td>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fe de Edad Original y Copias</th>
      <th>Cert 6to</th>
      <th>Fotocopia DPI</th>
      <th>Diploma 6to</th>
      <th>Cert. Matricula 1ro Basico</th>
      <th>Cert. Matricula 2do Basico</th>
      <th>Cert. Matricula 3ro Basico</th>
      <th>Diploma Basicos</th>
      <th>Cert. Mecanografia</th>
      <th>Fotocopia Titulo</th>
      <th>Fe de Edad</th>
      <th>Constancia Cod. Personal</th>
    </td>
    <td>
      <?php foreach ($tsArray as $data): ?>
      <tr>
        <td><?php echo $data['id_alumno'];?></td>
        <td><?php echo $data['primer_nombre'];?></td>
        <td><?php echo $data['primer_apellido'];?></td>
          <td><?php echo $data['fe_de_edad'];?></td>
          <td><?php echo $data['certificado_sexto'];?></td>
          <td><?php echo $data['fotocopia_dpi'];?></td>
          <td><?php echo $data['diploma_sexto'];?></td>
          <td><?php echo $data['cert_matr_primero_bas'];?></td>
          <td><?php echo $data['cert_matr_segundo_bas'];?></td>
          <td><?php echo $data['cert_matr_tercero_bas'] ?></td>
          <td><?php echo $data['dipl_ciclo_bas'];?></td>
          <td><?php echo $data['cert_meca'] ?></td>
          <td><?php echo $data['foto_titulo'] ?></td>
          <td><?php echo $data['fe_de_edad_titulo'] ?></td>
          <td><?php echo $data['const_cod_personal'] ?></td>
      </tr>
    </td>
<?php endforeach; ?>
  </table>
