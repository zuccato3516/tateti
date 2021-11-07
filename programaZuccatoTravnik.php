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
$juegos = array();

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
 

function primerJuegoGanado ($vaATenerQueSerJuegos, $vaATenerQueSerUnNombre){
$largoArreglo = count ($vaATenerQueSerJuegos);
$posicionArreglo = 0;
while ($posicionArreglo <= $largoArreglo /*&& $vaATenerQueSerUnNombre <>$comosellamelavariable && $meterotracondcion*/  ) {
    $posicionArreglo= $posicionArreglo +1; 
}

}


function elijaSimbolo () {
    $simboloElegido= "";
    echo "seleccione un Simbolo para jugar (X-O)";
    $simboloElegido = trim(fgets(STDIN));
    while ($simboloElegido <> "X" || $simboloElegido<> "O"){
        strtoupper($simboloElegido);
        if ($simboloElegido == 0){
           $simboloElegido = "O";}
         elseif ($simboloElegido == "O" ){
           return $simboloElegido;}
        elseif ($simboloElegido == "X")  {
           return $simboloElegido;}
        else {
          echo "Por favor seleccione un Simbolo correcto: " ;};
    


        };
};
};
elijaSimbolo();

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/