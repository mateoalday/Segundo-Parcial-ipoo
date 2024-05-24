<?php

class PartidoBaloncesto extends Partido {
    private $infracciones;

    public function construct($idPartido, $fecha, $equipo1, $golesE1, $equipo2, $golesE2, $infracciones) {
        parent::__construct($idPartido, $fecha, $equipo1, $golesE1, $equipo2, $golesE2);
        $this->infracciones = $infracciones;
    }

    public function toString() {
        $cadena = parent:: __toString ();
        $cadena .= "Infracciones: " . $this->infracciones . "\n";
        return $cadena;
    }

    public function coeficientePartido() {
     
        echo "Coeficiente partido Basket";
        return $this->getCoefBase() * ($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores()) * $this->infracciones;
    }
}