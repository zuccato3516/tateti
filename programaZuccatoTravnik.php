<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Travnik Armitano, Valeria Aylin. FAI 3522 . Diplomatura Universitaria en diseño web. mail: valeria.travnik@est.fi.uncoma.edu.ar - usuario github: AylinTravnik */
/* Zuccato, Stefano. FAI 3517 - Diplomatura Universitaria en Diseño Web mail: stefano.zuccato@est.fi.uncoma.edu.ar - usuario github: zuccato3517 */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/*
function cargarJuegos(){

echo "Elija la cantidad de juegos que desea ingresar: ";
$cantidadJuegos = trim(fgets(STDIN));

for ($numeroJuego=0; $numeroJuego<$cantidadJuegos; $numeroJuego++) {
   echo "¿Que jugador jugo con X?";
   $juegosActuales[$numeroJuego]["X"] = trim(fgets(STDIN));
   echo "¿Que jugador jugo con O?";
   $juegosActuales[$numeroJuego]["O"] = trim(fgets(STDIN));
   echo "¿Como concluyo el juego? (Ganador/Empate)";
   $juegosActuales[$numeroJuego]["resultado"] = trim(fgets(STDIN));
   echo "¿que puntaje obtuvo X?";
   $juegosActuales[$numeroJuego]["Ptos X"] = trim(fgets(STDIN));
   echo "¿que puntaje obtuvo O?";
   $juegosActuales[$numeroJuego]["Ptos O"] = trim(fgets(STDIN));
};
*/

/*
function seleccionarOpcion () {
   echo  "1) Jugar al tateti \n";
   echo  "2) Mostrar un juego \n ";
   echo  "3) Mostrar el primer juego ganador \n";
   echo  "4) Mostrar porcentaje de Juegos ganados \n";
   echo  "5) Mostrar resumen de Jugador \n";
   echo  "6) Mostrar listado de juegos Ordenado por jugador O \n";
   echo  "7) salir \n";
   echo  "Seleccione una opcion del menu: \n";
   $minimo = 1 ;
   $maximo = 7 ; 
   $opcionSeleccionada = solicitarNumeroEntre($minimo, $maximo);
   return $opcionSeleccionada;
};
*/


/*
function primerJuegoGanado ($arregloJuegos, $ganadorBuscado){
$largoArreglo = count ($arregloJuegos);
$posicionArreglo = 0;
$ganadorPartida = "";

if ($ganadorBuscado == $arregloJuegos[$posicionArreglo]["X"] && ($arregloJuegos[$posicionArreglo]["Puntos X"] > $arregloJuegos[$posicionArreglo]["Puntos Y"])) {
    $ganadorPartida = $arregloJuegos[$posicionArreglo]["X"];
} elseif ($ganadorBuscado == $arregloJuegos[$posicionArreglo]["Y"] && ($arregloJuegos[$posicionArreglo]["Puntos Y"] > $arregloJuegos[$posicionArreglo]["Puntos X"])) {
    $ganadorPartida = $arregloJuegos[$posicionArreglo]["Y"];
};

while ($posicionArreglo < $largoArreglo && $ganadorBuscado <> $ganadorPartida) {
    $posicionArreglo= $posicionArreglo +1; 
};

return $arregloJuegos[$posicionArreglo];

};
*/

function elijaSimbolo () {
    $simboloElegido= "";
    echo "seleccione un Simbolo para jugar (X-O)";
    $simboloElegido = strtoupper(trim(fgets(STDIN)));
        if ($simboloElegido == 0){
           $simboloElegido = "O";}
        else {
          echo "Por favor seleccione un Simbolo correcto: " ;};
        };



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$juegos = array();

//Inicialización de variables:
$juegos[0]["jugadorCruz"] = "Juan";
$juegos[0]["jugadorCirculo"] = "Luis";
$juegos[0]["puntosCruz"] = 5;
$juegos[0]["puntosCirculo"] = 0;

$juegos[1]["jugadorCruz"] = "Luis";
$juegos[1]["jugadorCirculo"] = "Maria";
$juegos[1]["puntosCruz"] = 1;
$juegos[1]["puntosCirculo"] = 1;

$juegos[2]["jugadorCruz"] = "Ana";
$juegos[2]["jugadorCirculo"] = "Juan";
$juegos[2]["puntosCruz"] = 3;
$juegos[2]["puntosCirculo"] = 0;

$juegos[3]["jugadorCruz"] = "Juan";
$juegos[3]["jugadorCirculo"] = "Maria";
$juegos[3]["puntosCruz"] = 0;
$juegos[3]["puntosCirculo"] = 4;

$juegos[4]["jugadorCruz"] = "Maria";
$juegos[4]["jugadorCirculo"] = "Luis";
$juegos[4]["puntosCruz"] = 3;
$juegos[4]["puntosCirculo"] = 0;

$juegos[5]["jugadorCruz"] = "Luis";
$juegos[5]["jugadorCirculo"] = "Ana";
$juegos[5]["puntosCruz"] = 3;
$juegos[5]["puntosCirculo"] = 0;

$juegos[6]["jugadorCruz"] = "Juan";
$juegos[6]["jugadorCirculo"] = "Luis";
$juegos[6]["puntosCruz"] = 1;
$juegos[6]["puntosCirculo"] = 1;

$juegos[7]["jugadorCruz"] = "Ana";
$juegos[7]["jugadorCirculo"] = "Maria";
$juegos[7]["puntosCruz"] = 0;
$juegos[7]["puntosCirculo"] = 5;

$juegos[8]["jugadorCruz"] = "Juan";
$juegos[8]["jugadorCirculo"] = "Luis";
$juegos[8]["puntosCruz"] = 5;
$juegos[8]["puntosCirculo"] = 0;

$juegos[9]["jugadorCruz"] = "Maria";
$juegos[9]["jugadorCirculo"] = "Juan";
$juegos[9]["puntosCruz"] = 3;
$juegos[9]["puntosCirculo"] = 0;

$juegos[10]["jugadorCruz"] = "Maria";
$juegos[10]["jugadorCirculo"] = "Ana";
$juegos[10]["puntosCruz"] = 3;
$juegos[10]["puntosCirculo"] = 0;

//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/*Proceso:
echo "El historial de partidos esta vacio, inicie un historial:";
  $historialJuegos = cargarJuegos();

  $menu = seleccionarOpcion();
  
  switch ($opcionSeleccionada) {
    case 1:
        $juego = jugar();
        /add all data to array/
        break;
    case 2:
        echo "Seleccione el N° de juego que desea visualizar: ";
        $juegoAVisualizar =trim(fgets(STDIN));
       / $juegos[$juegoAVisualizar];/
        echo "Juego TATETI:." .$juegoAVisualizar.  "($juegos[$juegoAVisualizar] [)". "\n";
        echo "Jugador X: <nombre> obtuvo <puntaje> puntos\n";
        echo "Jugador 0: <nombre> obtuvo <puntaje> puntos\n";
        break;
    case 3:
        echo "i es igual a 2";
        break;
}; */