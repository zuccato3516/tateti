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

return $juegosActuales;

};

$juegos = $juegos + cargarJuegos();


/*
for ($numeroJuego=0; $numeroJuego<$cantidadJuegos; $numeroJuego++) {
    echo $juegos[$numeroJuego]["ganador"];
    echo $juegos[$numeroJuego]["perdedor"];
    echo $juegos[$numeroJuego]["puntaje"];
};


*/




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