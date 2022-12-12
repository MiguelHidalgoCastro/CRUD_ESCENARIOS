<?php

/**
 * Controlador de Escenario
 */

class ControladorEscenario
{
	function __construct($configuracion)
	{
		$this->configuracion = $configuracion;
	}

	/**
	 *	Devuelve una vista HTML con la lista de escenarios
	 */
	function get($usuario, $pathParams, $queryParams)
	{

		//Control de acceso y de roles
		//Llamar al modelo y pedirle los datos
		require_once($this->configuracion['path_modelos'] . 'escenario.php');
		$modelo = new Escenario();
		$datos = $modelo->getAll();
		//Ajustar el formato de los datos a lo que quiere la vista
		if (!isset($pathParams[2])) {
			require_once($this->configuracion['path_vistas'] . 'vistalistaescenarios.php');
			$vista = new VistaListaEscenarios($this->configuracion);
			$vista->mostrar($datos);
		} else if ($pathParams[2] == 'vercrear') {
			require_once($this->configuracion['path_vistas'] . 'vistacrearescenario.php');
			$vista = new VistaCrearEscenario($this->configuracion);
			$vista->mostrar($datos);
		}
	}

	function post($usuario, $pathParams, $queryParams, $body)
	{
		// $_POST[] aqui tendría mis datos
	}
}
