<?php
/*
CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
*/
class database {

 private $conn_string;

    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
	public function conectar()
	{
      $host = "localhost";
      $port = "5432";
      $datab = "ANALISISDESISTEMAS";
      $user = "UMG"; //usuario de postgres
      $pass = "INGENIERIA"; //password de usuario de postgres

      $conn_string = "host=". $host . " port=" . $port . " dbname= " . $datab . " user=" . $user . " password=" . $pass;

      $dbconn = pg_connect($conn_string) or die;

      // validar la conexión
      if(!$dbconn) {
        echo "Error al conectar a la Base de datos\n";
        exit;
      }
      else {
        //echo "Coneccion Exitosa.";
      }
      }
	 /* METODO PARA REALIZAR UNA CONSULTA
		INPUT:
		$sql | codigo sql para ejecutar  la consulta
		OUTPUT: $result
	*/
  public function consulta($sql)
 {
    $resultado = pg_query($sql);
    if(!$resultado){
      echo "Error no hay resultados";
     exit;
    }
    return $resultado;
 }

	/*METODO PARA CONTAR EL NUMERO DE RESULTADOS
		INPUT: $result
		OUTPUT:  cantidad de registros encontrados
	*/
	function numero_de_filas($result){
		if(!is_resource($result)) return false;
		return pg_numrows($result);
	}

	/*METODO PARA CREAR ARRAY DESDE UNA CONSULTA
		INPUT: $result
		OUTPUT: array con los resultados de una consulta
	*/
	function fetch_assoc($result){
		if(!is_resource($result)) return false;
			return pg_fetch_assoc($result);
	}

     /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */
	public function disconnect()
	{
		pg_close();
	}

}
?>
