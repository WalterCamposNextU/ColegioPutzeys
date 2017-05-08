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
		$query = $this->consulta("SELECT * FROM  alumnos");
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
	function ConsultaAlumnosCarne($cod_carne){
		$this->conectar();
		$query = $this->consulta("SELECT * FROM alumnos where cod_carne = '$cod_carne'");
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
	function IngresoExp($fe_de_edad,$certificado_sexto,$fotocopia_dpi,$diploma_sexto,$cert_matr_primero_bas,$cert_matr_segundo_bas,$cert_matr_tercero_bas,$dipl_ciclo_bas,$cert_meca,$foto_titulo,$fe_de_edad_titulo,$const_cod_personal,$id_alumno)
	{
		//conexion a la base de datos
		$this->conectar();///hace la instancia a db class y ejecuta su function
		//$query = $this->consulta("SELECT * FROM universitario WHERE carrera='$carrera' ORDER BY rand() LIMIT  $limit;");
		$query = $this->consulta("insert into expediente(fe_de_edad,certificado_sexto,fotocopia_dpi,diploma_sexto,cert_matr_primero_bas,cert_matr_segundo_bas,cert_matr_tercero_bas,dipl_ciclo_bas,cert_meca,foto_titulo,fe_de_edad_titulo,const_cod_personal,id_alumno) values ('$fe_de_edad','$certificado_sexto','$fotocopia_dpi','$diploma_sexto','$cert_matr_primero_bas','$cert_matr_segundo_bas','$cert_matr_tercero_bas','$dipl_ciclo_bas','$cert_meca','$foto_titulo','$fe_de_edad_titulo','$const_cod_personal','$id_alumno')");
 	    $this->disconnect();
	}
	function ConsultaExp($cod_carne){
		$this->conectar();
		$query = $this->consulta("SELECT primer_nombre,primer_apellido,fe_de_edad,certificado_sexto,fotocopia_dpi,diploma_sexto,cert_matr_primero_bas,cert_matr_segundo_bas,cert_matr_tercero_bas,dipl_ciclo_bas,cert_meca,foto_titulo,fe_de_edad_titulo,const_cod_personal,id_alumno FROM expediente,alumnos where cod_carne = id_alumno and id_alumno='$cod_carne'");
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
