<?php
include_once"PartidoFutbol.php";
include_once"PartidoBaloncesto";
class Torneo {
    private $partidos;
    private $importePremio;

    public function __construct($importePremio) {
        $this->partidos = [];
        $this->importePremio = $importePremio;
    }

    public function agregarPartido($partido) {
        $this->partidos[] = $partido;
    }

    public function getPartidos() {
        return $this->partidos;
    }

    public function setImportePremio($importePremio) {
        $this->importePremio = $importePremio;
    }

    public function getImportePremio() {
        return $this->importePremio;
    }

    
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) {
        if ($OBJEquipo1->getObjCategoria()->getIdCategoria() !== $OBJEquipo2->getObjCategoria()->getIdCategoria() ||
            $OBJEquipo1->getCantJugadores() !== $OBJEquipo2->getCantJugadores()) {
            echo "Los equipos no cumplen con los requisitos para jugar un partido en el torneo.";
            return null;
        }

        $partido = null;
        if ($tipoPartido === 'fotbool') {
            $partido = new PartidoFutbol(uniqid(), $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
        } elseif ($tipoPartido === 'basket') {
            $partido = new PartidoBaloncesto(uniqid(), $fecha, $OBJEquipo1, 80, $OBJEquipo2, 120, 7);
        } else {
            echo "Tipo de partido no válido. Debe ser 'futbol' o 'basquetbol'.";
            return null;
        }

        $this->partidos[] = $partido;

        return $partido;
    }


    public function darGanadores($deporte) {
        $ganadores = [];

        foreach ($this->partidos as $partido) {
            if ($partido instanceof PartidoFutbol && $deporte === 'fotbool') {
                $ganador = $this->determinarGanadorFutbol($partido);
                if ($ganador) {
                    $ganadores[] = $ganador;
                }
            } elseif ($partido instanceof PartidoBaloncesto && $deporte === 'basket') {
                $ganador = $this->determinarGanadorBasquet($partido);
                if ($ganador) {
                 
                    $ganadores[] = $ganador;
                }
            }
        }

        return $ganadores;
    }

    function determinarGanadorFutbol($partido) {
        $ganador = null;
        if ($partido->getCantGolesE1() > $partido->getCantGolesE2()) {
            $ganador = $partido->getObjEquipo1();
        } elseif ($partido->getCantGolesE2() > $partido->getCantGolesE1()) {
            $ganador = $partido->getObjEquipo2();
        }
        return $ganador;
    }
    
    function determinarGanadorBasquet($partido) {
        $ganador = null;
        if ($partido->getCantGolesE1() > $partido->getCantGolesE2()) {
            $ganador = $partido->getObjEquipo1();
        } elseif ($partido->getCantGolesE2() > $partido->getCantGolesE1()) {
            $ganador = $partido->getObjEquipo2();
        }
        return $ganador;
    }
    
    public function __toString() {
        return "Importe Premio: $" . $this->getImportePremio();
    }
    

}