<h1>Alta de Alumnos</h1>
<div>
  <form action="index.php" method="post">
    <label>Codigo Carnet: </label><input type="number" name="cod_carne" required width="100px">
    <br>
    <br>
    1er Nombre: <input type="text" name="primernombre" required width="100px">
    2do Nombre: <input type="text" name="segundonombre" required>
    3er Nombre: <input type="text" name="tercernombre">
    <br>
    <br>
    1er Apellido: <input type="text" name="primer_apellido" required>
    2do Apellido: <input type="text" name="segundo_apellido" required>
    Apellido Casada: <input type="text" name="apellidoCasado">
    <br>
    <br>
    Edad: <input type="text" name="edad" required>
    Fecha Nac: <input type="text" name="fecha_nac" required>
    <br>
    <br>
    Sexo: <input type="text" name="sexo" required>
    Estado Civil: <select name="estado_civil">
      <option value="casado">Casado</option>
      <option value="Soltero">Soltero</option>
      <option value="Unido">Unido</option>
      </select>
    <br>
    <br>
  Dirección: <input type="text" name="direccion" required>
  Celular: <input type="text" name="celular" required>
  E-mail: <input type="mail" name="email" required>
  <br><br>
  <input type="submit" name="Ingresar" value="Ingresar Alumno">
  </form>
</div>
