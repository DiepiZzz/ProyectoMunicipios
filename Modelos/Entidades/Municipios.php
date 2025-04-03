<?php

class Municipio {
    private $id;
    private $nombre;
    private $departamento;
    private $pais;
    private $alcalde;
    private $gobernador;
    private $patronReligioso;
    private $numHabitantes;
    private $numCasas;
    private $numParques;
    private $numColegios;
    private $descripcion;
    private $usuarioId;

    public function __construct($id, $nombre, $departamento, $pais, $alcalde, $gobernador, $patronReligioso, $numHabitantes, $numCasas, $numParques, $numColegios, $descripcion, $usuarioId) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->departamento = $departamento;
        $this->pais = $pais;
        $this->alcalde = $alcalde;
        $this->gobernador = $gobernador;
        $this->patronReligioso = $patronReligioso;
        $this->numHabitantes = $numHabitantes;
        $this->numCasas = $numCasas;
        $this->numParques = $numParques;
        $this->numColegios = $numColegios;
        $this->descripcion = $descripcion;
        $this->usuarioId = $usuarioId;
    }
}

?>