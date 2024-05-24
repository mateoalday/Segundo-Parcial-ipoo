<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBaloncesto.php");

// Crear instancias de Categoría
$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'Juveniles');
$catMenores = new Categoria(3, 'Menores');

// Crear instancias de Equipos
$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",2,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",8,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

// Crear instancia de Torneo
$torneo = new Torneo(100000);

// Paso 3: Ingresar partidos al torneo y visualizar la respuesta
echo "Ingresando partidos al torneo:\n";

$partidoA = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'fotbool');
echo "Resultado del partido A: " . $partidoA . "\n";

$partidoB = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basket');
echo "Resultado del partido B: " . $partidoB . "\n";

$partidoC = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basket');
echo "Resultado del partido C: " . $partidoC . "\n";

// Paso 4: Visualizar la cantidad de equipos del torneo
echo "Cantidad de equipos en el torneo: " . count($torneo->getPartidos()) . "\n";

// Paso 5: Determinar los ganadores y visualizar el resultado
echo "Determinando ganadores:\n";

$ganadoresBasquet = $torneo->darGanadores('basket');
echo "Ganadores en baloncesto:\n";
foreach ($ganadoresBasquet as $equipo) {
    echo $equipo->getNombre() . "\n";
}

$ganadoresFutbol = $torneo->darGanadores('fotbool');
echo "Ganadores en fútbol:\n";
foreach ($ganadoresFutbol as $equipo) {
    echo $equipo->getNombre() . "\n";
}

echo "Datos del Torneo:\n";
echo $torneo;
?>