<?php

class PartidoFutbol extends Partido {
    private $categoria;

    public function construct($idPartido, $fecha, $equipo1, $cantGolesE1, $equipo2, $cantGolesE2) {
        parent::__construct($idPartido, $fecha, $equipo1, $cantGolesE1, $equipo2, $cantGolesE2);
    }
    
    // Métodos GET
    public function getCategoria() {
        return $this->categoria;
    }

    // Métodos SET
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function coeficientePartido() {
        // Coeficientes por categoría en partidos de fútbol
        $categoria = $this->getCategoria();
        switch ($categoria) {
            case 'Menores':
                $coeficienteBase = 0.13;
                break;
            case 'Juveniles':
                $coeficienteBase = 0.19;
                break;
            case 'Mayores':
                $coeficienteBase = 0.27;
                break;
            default:
                $coeficienteBase = $this->getCoefBase();
        }

        // Calcular coeficiente del partido según la cantidad de goles y jugadores
        $coeficiente = $coeficienteBase * ($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores());

        return $coeficiente;
    }
    public function __toString() {
        $cadena = parent::__toString();
        return $cadena;
    }
}
