<?php 

use App\ApiProvider\Provider; //? Estamos importando la clase Provider desde App\ApiProvider al fichero actual.

require_once __DIR__ . "/../vendor/autoload.php"; //? Incluimos el archivo autoload que nos genera el composer en el fichero actual. __DIR__ es una constante mágica en PHP que representa el directorio actual del archivo en el que se encuentra, se utiliza para obtener la ubicación absoluta del directorio actual del archivo que contiene esta línea de código. 

$listadoImagenes = Provider::traerImagenes(); //* Llamamos al metodo estatico traerImagenes que esta en la clase Provider (dentro de la carpeta ApiProvider).

//todo Comprobacion de que listadoImagenes contiene las imagenes, el user y los likes, por lo tanto ha procesado bien las fotos.
//var_dump($listadoImagenes); //? Devuelve el array que contiene todas las instancias que se han creado en el foreach con la imagen el user y los likes.


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto imagenes de almeria</title>
    <script src="https://cdn.tailwindcss.com"></script> <!--//! Tailwin-->
</head>
<body bgcolor="#000" text="#fff">
    
<div class="container p-12 mx-auto">
    <?php
     //? webformatURL --> Que es la foto en si
    //? user --> Que es el usuario que ha subido la imagen
    //? likes --> Numero de likes que tiene la imagen
    foreach ($listadoImagenes as $img) {
        echo <<<TXT
        <div class=" w-1/2 mx-auto mb-4  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class=" mx-auto mt-4 h-96 rounded-t-lg" src="{$img ->webformatURL}" alt="" />
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Usuario: {$img->user}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"></p>
                <div class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Likes: {$img -> likes}
                </div>
            </div>
        </div>
TXT;
    }
    ?>





</body>
</html>