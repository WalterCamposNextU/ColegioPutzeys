<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once "db.class.php";

class alumnos extends database {

	/* REALIZA UNA CONSULTA A LA BASE DE DATOS EN BUSCA DE  REGISTROS UNIVERSITARIOS DADOS COMO
	     PARAMETROS LA "CARRERA" Y LA "CANTIDAD" DE REGISTROS A MOSTRAR
		 INPUT:
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT:
		 $data | Array con los registros obtenidos, si no existen datos, su valor es una cadena vacia
	 */
	function ConsultaAlumnos()
	{
		//conexion a la base de datos
		$this->conectar();///hace la instancia a db class y ejecuta su function
		//$query = $this->consulta("SELECT * FROM universitario WHERE carrera='$carrera' ORDER BY rand() LIMIT  $limit;");
		$query = $this->consulta("SELECT * FROM  alumno");
 	    $this->disconnect();
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) )
					$data[] = $tsArray;

				return $data;
		}else
		{
			return '';
		}
	}


}
?>
