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
/*Inicializa la estructura de datos con ejemplos de juegos
* @param array &$arregloJuegos
* @param string $juegador1
* @param string $jugaror2
* @param int $puntaje1
* @param int $puntaje2
*  return array
*/
function cargarJuegos(&$arregloJuegos, $jugador1,$jugador2,$puntaje1,$puntaje2) {
    $i = count($arregloJuegos);
    $arregloJuegos[($i)]["jugadorCruz"] = $jugador1;
    $arregloJuegos[($i)]["jugadorCirculo"] = $jugador2;
    $arregloJuegos[($i)]["puntosCruz"] = $puntaje1;
    $arregloJuegos[($i)]["puntosCirculo"] = $puntaje2;

    return $arregloJuegos;
};


/*Modifica la estructura de datos al agregarse un nuevo juego
* @param array $arreglojuegos
* return array
*/
function agregarJuego($arregloJuegos) {
    $juego = jugar();
    cargarJuegos($arregloJuegos,$juego["jugadorCruz"],$juego["jugadorCirculo"],$juego["puntosCruz"],$juego["puntosCirculo"]);
    return $arregloJuegos;
}

/*Muestra el menu de opciones, Solicita una opcion VALIDA
* (llama a funcion solicitarNumerosEntre para validar)
*return Int
*/
function seleccionarOpcion () {
   echo  "\n";
   echo  "1) Jugar al tateti \n";
   echo  "2) Mostrar un juego \n";
   echo  "3) Mostrar el primer juego ganador \n";
   echo  "4) Mostrar porcentaje de Juegos ganados \n";
   echo  "5) Mostrar resumen de Jugador \n";
   echo  "6) Mostrar listado de juegos Ordenado por jugador O \n";
   echo  "7) Salir \n";
   echo  "Seleccione una opcion del menu: \n";
   $minimo = 1 ;
   $maximo = 7 ; 
   $opcionSeleccionada = solicitarNumeroEntre($minimo, $maximo);
   return $opcionSeleccionada;
};


/*Retorna el indice del primer juego ganado por un jugador
* @param array $arregloJuegos
* @param string $ganadorBuscado
* return int
*/
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
        $i = -1;
    }
    return $i;
}


/*Solicita al usuario un simbolo y retorna el simbolo elegido
*return string
*
*/
function elijaSimbolo () {
    $simboloElegido= "";
    echo "Seleccione el simbolo que desea utilizar (X-O)";
    $simboloElegido = trim(fgets(STDIN));
    $simboloElegido = strtoupper($simboloElegido);
    //el loop valida la entrada, corre hasta que el usuario ingrese el simbolo correcto
    while ($simboloElegido != "X" && $simboloElegido !="O"){
    
          echo "Por favor seleccione un Simbolo correcto: ";
          $simboloElegido = trim(fgets(STDIN));
        
          $simboloElegido = strtoupper($simboloElegido);
        };
    
    return $simboloElegido;

};

/*Muestra en pantalla los datos del juego ingresado
*@param array $arregloJuegos
*@param int &juegoNumero
*/
function visualizarUnJuego ($arregloJuegos,$juegoNumero){
$statusJuego = "";
    //Determina el resultado del juego ingresado
     if ($arregloJuegos[$juegoNumero]["puntosCruz"] == 1){
           $statusJuego = "empate";}
    elseif ( $arregloJuegos[$juegoNumero]["puntosCruz"] > $arregloJuegos[$juegoNumero]["puntosCirculo"] ){
           $statusJuego = "gano X";}
     else {
           $statusJuego = "gano O";}
     echo "******************************\n";
     echo "Juego TATETI: " .$juegoNumero."(".$statusJuego. ")". "\n";
     echo "Jugador X: ". strtoupper($arregloJuegos[$juegoNumero]["jugadorCruz"])." obtuvo " . $arregloJuegos[$juegoNumero]["puntosCruz"]. " puntos.\n";
     echo "Jugador 0: ". strtoupper($arregloJuegos[$juegoNumero]["jugadorCirculo"]). " obtuvo ". $arregloJuegos[$juegoNumero]["puntosCirculo"]. " puntos.\n";
     echo "******************************\n";
    };

/* Calcula cuantos de los juegos del array, tuvieron un ganador
*@param array $arregloJuegos
*return Int
*/
function juegosGanadosTotales ($arregloJuegos){
    $cantJuegosGanados = 0;
     foreach ($arregloJuegos as &$value) {
            if ($value["puntosCruz"] <> 1){
            $cantJuegosGanados = $cantJuegosGanados + 1;
            }
        }
        return $cantJuegosGanados;
    };

/*Determina cuantos juegos fueron ganados por el simbolo ingresado
 *@param array $arregloJuegos
 *@param string $simbolo
 *return int 
 */
function juegosGanadosPor ($arregloJuegos, $simbolo){
    $cantJuegosGanadosPor = 0;
        
    
        if  (strcmp($simbolo,"X")==0){
          foreach ($arregloJuegos as &$value) {
              if ($value["puntosCruz"] > 1){
              $cantJuegosGanadosPor = $cantJuegosGanadosPor + 1;
              }//recorre el Array buscando los X ganadores
            }    
        } 
        else {
          foreach ($arregloJuegos as &$value) {
              if ($value["puntosCirculo"] > 1){
              $cantJuegosGanadosPor = $cantJuegosGanadosPor + 1;
              }//recorre el array buscando los O ganadores
          }
        }
        
        return $cantJuegosGanadosPor;
        echo $cantJuegosGanadosPor;
        
    };

/*Genera el resumen de un jugador mostrando cuantos juegos gano, perdio y empato, y puntos totales
*@param array $arrayDeJuegos
*@param string $jugadorAResumir
*
*/
function resumenJugador($arrayDeJuegos, $jugadorAResumir) {
    $puntosTotales= 0;
    $juegosGanados= 0;
    $juegosEmpatados = 0;
    $juegosPerdidos = 0;
    //recorre el array buscando info del jugador
    foreach ($arrayDeJuegos as &$value) {
        if  (strcmp($value["jugadorCruz"],$jugadorAResumir)==0){  
            // recopila datos del jugador jugando como X
            if  ( $value["puntosCruz"]> 1){
                $juegosGanados = $juegosGanados + 1;
                $puntosTotales= $puntosTotales + $value["puntosCruz"];
            }
            elseif ( $value["puntosCruz"]== 1){
                $juegosEmpatados= $juegosEmpatados+1;
            } else {
                $juegosPerdidos = $juegosPerdidos + 1;
            }}
        elseif  (strcmp($value["jugadorCirculo"],$jugadorAResumir)==0){
            //recopila datos del jugador jugando como O
            if  ( $value["puntosCirculo"]> 1){
                $juegosGanados = $juegosGanados + 1;
                $puntosTotales= $puntosTotales + $value["puntosCirculo"];
            }
            elseif ( $value["puntosCirculo"]== 1){
                $juegosEmpatados= $juegosEmpatados+1;
            } else {
                $juegosPerdidos = $juegosPerdidos + 1;
            }}
        }
    echo "******************************\n";
    echo "Jugador: ".strtoupper($jugadorAResumir)."\n";
    echo "Ganó: ".$juegosGanados." juegos.\n";
    echo "Perdió: ".$juegosPerdidos." juegos.\n";
    echo "Empató: ".$juegosEmpatados." juegos.\n";
    echo "Total de puntos acumulados: ".$puntosTotales." puntos.\n";
    echo "******************************\n";
      }    


        
       
        
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



while (TRUE){
    print_r($juegos);
    $menu = seleccionarOpcion();
switch ($menu) {
    case 1:
        jugarJuego($juegos);
        //inmediatamente es necesario llamar a la funcion de guarda el juego en el array
        break;
    case 2:
        echo "Seleccione el N° de juego que desea visualizar: ";
        $juegoAVisualizar =trim(fgets(STDIN));
        visualizarUnJuego($juegos,$juegoAVisualizar); 
        break;
    case 3:
        echo "Ingrese el nombre de un Jugador para ver su primer juego ganado:";
        $primerJuegoDeJugador =trim(fgets(STDIN));
        $primerJuego = primerJuegoGanado($juegos,$primerJuegoDeJugador);
        visualizarUnJuego($juegos,$primerJuego);
        break;
    case 4:
        
        $porcentajeJuegos= 0;
        $simboloABuscar = elijaSimbolo();
        $juegosT =juegosGanadosTotales($juegos);
        $juegosSimbolo=  juegosGanadosPor($juegos, $simboloABuscar);
        $porcentajeJuegos= ($juegosSimbolo/$juegosT) *100;
        
        if ($simboloABuscar == "X"){
           
            echo " X gano el ". $porcentajeJuegos . " % de los juegos ganados" ;
        }
        else { 
            
            echo " O gano el ". $porcentajeJuegos . " % de los juegos ganados" ;
        }
        
         
          break;
    case 5:
          //Mostrar Resumen Jugador
          echo "Por favor seleccione el nombre del juegador";
          $nombreJugador = trim(fgets(STDIN));
          resumenJugador($juegos,$nombreJugador);

          break;
    case 6:
          //mostrar listado de juegos ordenado por jugador O
          // con UASORT Y PRINT_R
           break;  
    case 7: 
           exit();
    };
};    