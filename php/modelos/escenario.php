<?php

class Escenario extends ConfigDB
{
    public $id;
    public $nombre;
    

    public function getAll()
    {
        $conexion = $this->conexion;
        $datos = $conexion->query("SELECT * FROM escenarios"); //prepare cuando sea losotros con filtros
        //print_r($datos);
        return $datos;
    }

    public function get($id)
    {
        $conexion = $this->conexion;
        $prepare = $conexion->prepare("SELECT * FROM escenarios WHERE id=?");
        $prepare->bind_param('i', $id);
        $prepare->execute();
        $result = $prepare->get_result();
        return $result->fetch_assoc();
    }

    public function add() //el nombre lo añado cuando creo el objeto escenario
    {
        $conexion = $this->conexion;
        $prepare = $conexion->prepare("INSERT INTO escenarios(nombre) VALUES(?)");
        $prepare->bind_param('s', $this->nombre);
        $prepare->execute();
    }
    public function update() //el nombre lo añado cuando creo el objeto escenario
    {
        $conexion = $this->conexion;
        $prepare = $conexion->prepare("UPDATE escenarios SET nombre=? WHERE id=?");
        $prepare->bind_param('si', $this->nombre, $this->id);
        $prepare->execute();
    }
}
