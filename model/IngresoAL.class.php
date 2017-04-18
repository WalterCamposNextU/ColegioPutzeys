<?php
require_once "db.class.php";

/**
 *
 */
class Ingreso extends database
{

  function ingresarAlumnos()
  {
    $this->conectar();//se accede a bd.class para obtener coneccion a pg
    $query = $this->IngresarJornada("SELECT * FROM  alumno");
  }
}

 ?>
