<?php

class ControladorEscenario
{
    public function __construct($configuracion)
    {
        $this->configuracion = $configuracion;
    }

    /**
	*	Devuelve una vista HTML con la lista de escenarios
	*/
	function index(){
		//Control de acceso y de roles
		//Llamar al modelo y pedirle los datos
		require_once($this->configuracion['path_modelos'].'escenario.php');
		$modelo = new Escenario();
		$datos = $modelo->getAll();
		//Ajustar el formato de los datos a lo que quiere la vista
		require_once($this->configuracion['path_vistas'].'vistalistaescenarios.php');
		$vista = new VistaListaClientes($this->configuracion);
		$vista->mostrar($datos);
	}

	function create(){
		//que lo hago asi?
	}
}
