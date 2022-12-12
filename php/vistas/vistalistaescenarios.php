<?php
class VistaListaEscenarios
{
    function __construct($configuracion)
    {
        $this->configuracion = $configuracion;
    }

    function mostrar($datos)
    {

        $dom = new DOMDocument();
        @$dom->loadHTMLFile($this->configuracion['path_html'] . 'plantilla.html');

        $div = $dom->getElementsByTagName("main")[0];

        $btnCrear = $dom->createElement('a'); // ahora es un link
        $btnCrear->setAttribute('href', './escenario/vercrear/'); //aqui tengo que ir a index
        $btnCrear->textContent = 'Crear Escenario';

        $tabla = $dom->createElement('table');

        //thead
        $thead = $dom->createElement('thead');
        //trhead
        $trh = $dom->createElement('tr');

        //th1
        $th1 = $dom->createElement('th');
        $th1->textContent = "#";
        $th1->setAttribute('scope', 'col');

        //th2
        $th2 = $dom->createElement('th');
        $th2->textContent = "Nombre";
        $th2->setAttribute('scope', 'col');

        $dom->appendChild($div);
        $div->appendChild($tabla);
        $tabla->appendChild($btnCrear);
        $tabla->appendChild($thead);
        $thead->appendChild($trh);
        $trh->appendChild($th1);
        $trh->appendChild($th2);


        //tbody
        $tbody = $dom->createElement('tbody');

        $tabla->appendChild($tbody);
        //While

        while ($fila =  $datos->fetch_object()) {

            $trb = $dom->createElement('tr');
            $thb = $dom->createElement('th');
            $atributotb = $dom->createAttribute("scope");
            $atributotb->value = "row";
            $thb->appendChild($atributotb);
            $thb->textContent = $fila->id;
            $td = $dom->createElement('td');
            $td->textContent = $fila->nombre;


            $tbody->appendChild($trb);
            $trb->appendChild($thb);
            $trb->appendChild($td);
        }

        echo $dom->saveHTML();
    }
}
