<?php

require 'app/model/universitario.class.php';
require 'app/model/alumnos.class.php';

class mvc_controller {

	/* METODO QUE RECIBE LA ORDEN DE BUSQUEDA, PREPARA LOS DATOS Y SE COMUNICA
	     CON EL MODELO  PARA REALIZAR LA CONSULTA
		INPUT
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT
		 HTML 	| el resultado obtenido del modelo es procesado y convertido en codigo html para que el VIEW pueda mostrarlo
	*/
    function buscar($carrera, $cantidad)
   {
		$universitario = new universitario();
		//carga la plantilla
		$pagina=$this->load_template('- Resultados de la busqueda -');
		//carga html del buscador
  	    $buscador = $this->load_page('app/views/default/modules/m.buscador.php');
	      //obtiene  los registros de la base de datos
		  ob_start();
		  //realiza consulta al modelo
		   $tsArray = $universitario->universitarios($carrera,$cantidad);
	   		if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos
						$titulo = 'Resultado de busqueda por "'.$carrera.'" ';
						//carga la tabla de la seccion de VIEW
			  			include 'app/views/default/modules/m.table_univ.php';
						$table = ob_get_clean();
						//realiza el parseado
						$pagina = $this->replace_content('/\#CONTENIDO\#/ms', $buscador.$table , $pagina);
	   		}else{//si no existen datos -> muestra mensaje de error
		   			$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador.'<h1>No existen resultados</h1>' , $pagina);
	   		}
		$this->view_page($pagina);
   }

   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
   OUTPUT
   HTML | codigo html de la pagina
   */
   function principal()
   {
		$pagina=$this->load_template('');
		$html = $this->load_page('app/views/default/modules/m.principal.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

   /* METODO QUE MUESTRA LA PAGINA HISTORIA DE BOLIVIA, ES UNA PAGINA ESTATICA
   OUTPUT
   HTML | codigo html de la pagina
   */
   function historia()
   {
		$pagina=$this->load_template('History of Bolivia');
		$html = $this->load_page('app/views/default/modules/m.historia.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$this->view_page($pagina);
   }

	/* METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
	INPUT
		$title | titulo en string del header
	OUTPIT
		$pagina | string que contiene toda el cocigo HTML de la plantilla
	*/
	function load_template($title='Sin Titulo'){
		$pagina = $this->load_page('app/views/default/page.php');
		$header = $this->load_page('app/views/default/sections/s.header.php');
		$pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);
		$pagina = $this->replace_content('/\#TITLE\#/ms' ,$title , $pagina);
		$menu_left = $this->load_page('app/views/default/sections/s.menuizquierda.php');
		$pagina = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left , $pagina);
		return $pagina;
	}

	/* METODO QUE MUESTRA EN PANTALLA EL FORMULARIO DE BUSQUEDA
	   HTML | codigo html de la pagina  con el buscador incluido
	*/
	function buscador(){
		$pagina=$this->load_template('Busqueda de registros');
		$buscador = $this->load_page('app/views/default/modules/m.buscador.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);
		$this->view_page($pagina);
	}
  /* METOD de carga de alumnos a pagina de busqueda
	*/


  function buscarAlpost()
 {
  $alumnos = new alumnos(); //se instancia la base de datos favor cambia en la universitario.class
  //carga la plantilla
  $pagina=$this->load_template('- Resultados de alumnos -');

    ob_start();
    //realiza consulta al modelo
     $tsArray = $alumnos->ConsultaAlumnos();
      if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos
          //carga la tabla de la seccion de VIEW
            include 'app/views/default/modules/m.tablaAlumnos.php';
          $table = ob_get_clean();
          //realiza el parseado
          $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $buscador.$table , $pagina);
      }else{//si no existen datos -> muestra mensaje de error
          $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador.'<h1>No existen resultados</h1>' , $pagina);
      }
  $this->view_page($pagina);
 }



	/* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
		INPUT
		$page | direccion de la pagina
		OUTPUT
		STRING | devuelve un string con el codigo html cargado
	*/
	private function load_page($page)
	{
		return file_get_contents($page);
	}

	/* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
		INPUT
		$html | codigo html
		OUTPUT
		HTML | codigo html
	*/
	private function view_page($html)
	{
		echo $html;
	}

	/* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
		INPUT
		$out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
		$pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
		OUTPUT
		HTML 	| cuando realiza el reemplazo devuelve el codigo completo de la pagina
	*/
	private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);
	}

	function alumnos()
	{
	$pagina=$this->load_template('Ingreso de Alumnos');
	$jornada = $this->load_page('app/views/default/modules/m.ingresoJornada.php');
	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$jornada, $pagina);//le asignamos a nuestra variable pagina y reemplazamos el contenido del buscador
	$this->view_page($pagina);//devuelve la vista de nuestra varible pagina

	}
	function ingresarAlumno($nombre,$mail,$codigocurso){
		//carga la plantilla
		$universitario = new universitario();
		$pagina=$this->load_template('- Resultados de la busqueda -');
		//carga html del buscador
		$jornada = $this->load_page('app/views/default/modules/m.ingresoJornada.php');
		ob_start();
    $tsArray = $universitario->IngresoAlumnos($nombre,$mail,$codigocurso);
		if($tsArray!=''){//si existen registros carga el modulo  en memoria y rellena con los datos
						$titulo = 'Resultado de busqueda por "'.$codigocurso.'" ';
						//carga la tabla de la seccion de VIEW
		$this->view_page($pagina);
   }

	}

}
?>
