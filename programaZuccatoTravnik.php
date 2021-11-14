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

function cargarJuegos(&$arregloJuegos, $jugador1,$jugador2,$puntaje1,$puntaje2) {
    $i = count($arregloJuegos);
    $arregloJuegos[($i)]["jugadorCruz"] = $jugador1;
    $arregloJuegos[($i)]["jugadorCirculo"] = $jugador2;
    $arregloJuegos[($i)]["puntosCruz"] = $puntaje1;
    $arregloJuegos[($i)]["puntosCirculo"] = $puntaje2;

    return $arregloJuegos;
};

function jugarJuego() {
    $juego = jugar();
    cargarJuegos($juegos,$juego["jugadorCruz"],$juego["jugadorCirculo"],$juego["puntosCruz"],$juego["puntosCirculo"]);
}

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

function primerJuegoGanado(&$arregloJuegos, $ganadorBuscado) {
    $ganadorEncontrado = FALSE;
    $i = 0;
    while ($ganadorEncontrado == FALSE && $i<count($arregloJuegos)) {
        if (($arregloJuegos[$i]["jugadorCruz"] == $ganadorBuscado && $arregloJuegos[$i]["puntosCruz"]>$arregloJuegos[$i]["puntosCirculo"])||($arregloJuegos[$i]["jugadorCirculo"] == $ganadorBuscado && $arregloJuegos[$i]["puntosCirculo"]>$arregloJuegos[$i]["puntosCruz"])){
            $ganadorEncontrado = TRUE;
        };
        $i = $i +1;
    };
    if ($ganadorEncontrado == FALSE) {
        $i = 0;
    }
    return $i;
}

function elijaSimbolo () {
    $simboloElegido= "";
    echo "seleccione un Simbolo para jugar (X-O)";
    $simboloElegido = strtoupper(trim(fgets(STDIN)));
    while ($simboloElegido <> "X" ||"O"){
    
        if ($simboloElegido == 0){
           $simboloElegido = "O";}
        else {
          echo "Por favor seleccione un Simbolo correcto: " ;};
          $simboloElegido = strtoupper(trim(fgets(STDIN)));
        };
    };


    function visualizarUnJuego ($juegoNumero){
    $statusJuego = "";
        if ($juegos[$juegoNumero]["puntosCruz"] = 1)
           $statusJuego == "empate";
        elseif ( $juegos[$juegoNumero]["puntosCruz"] > $juegos[$juegoNumero]["puntosCirculo"] )
           $statusJuego == "gano X";
        else 
           $statusJuego == "gano O";
        echo "Juego TATETI:." .$juegoNumero."(".$statusJuego. ")". "\n";
        echo "Jugador X:". $juegos[$juegoNumero]["jugadorCruz"] ."obtuvo". $juegos[$juegoNumero]["puntosCruz"]. "puntos\n";
        echo "Jugador 0:". $juegos[$juegoNumero]["jugadorCirculo"]. "obtuvo". $juegos[$juegoNumero]["puntosCirculo"]. "puntos\n";

    };

    function juegosGanadosTotales ($juegosGanadosAContar){
        $totalDeJuegos = count ($juegosGanadosAContar);
        $posicionEnArreglo = 0;
        $cantJuegosGanados = 0;
        
        if ($ganadorBuscado == $arregloJuegos[$posicionArreglo]["X"] && ($arregloJuegos[$posicionArreglo]["Puntos X"] > $arregloJuegos[$posicionArreglo]["Puntos Y"])) {
            $ganadorPartida = $arregloJuegos[$posicionArreglo]["X"];
    };
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$juegos = array();



//Inicialización de variables:
cargarJuegos($juegos,"Juan","Luis",5,0);
cargarJuegos($juegos,"Luis","Maria",1,1);
cargarJuegos($juegos,"Ana","Juan",3,0);
cargarJuegos($juegos,"Juan","Maria",0,4);
cargarJuegos($juegos,"Maria","Luis",3,0);
cargarJuegos($juegos,"Luis","Ana",3,0);
cargarJuegos($juegos,"Juan","Luis",1,1);
cargarJuegos($juegos,"Ana","Maria",0,5);
cargarJuegos($juegos,"Juan","Luis",5,0);
cargarJuegos($juegos,"Maria","Juan",3,0);
cargarJuegos($juegos,"Maria","Ana",3,0);

//Proceso:




$historialJuegos = cargarJuegos();

$menu = seleccionarOpcion();

switch ($opcionSeleccionada) {
    case 1:
        $juego = jugar();
        //add all data to array
        //via function agregarJuego/
        break;
    case 2:
        echo "Seleccione el N° de juego que desea visualizar: ";
        $juegoAVisualizar =trim(fgets(STDIN));
        visualizarUnJuego($juegoAVisualizar); 
        break;
    case 3:
        echo "Ingrese el nombre de un Jugador para ver su primer juego ganado:";
        $primerJuegoDeJugador =trim(fgets(STDIN));
        primerJuegoGanado ($primerJuegoDeJugador);
        break;
    case 4: 
          //Mostrar porcentaje de juegos ganados
          // son dos funciones, una para det total juegos ganados y otra total ganados segun X o O
         
          break;
    case 5:
          //Mostrar Resumen Jugador
          break;
    case 6:
          //mostrar listado de juegos ordenado por jugador O
          // con UASORT Y PRINT_R
           break;  
    case 7: 
          // salir
           break;
  
    
        
        
  };