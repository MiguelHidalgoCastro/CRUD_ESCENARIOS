<?php
class VistaCrearEscenario
{
    function __construct($configuracion)
    {
        $this->configuracion = $configuracion;
    }

    function mostrar($datos)
    {
        $dom = new DOMDocument();
        @$dom->loadHTMLFile($this->configuracion['path_html'] . 'plantilla.html');
        //solo estoy cargando la plantilla aqui
        // los dos archivos de las vistas están en el mismo sitio
        // tienen el mismo scope pero no coge el css
        echo $dom->saveHTML();
    }
}
