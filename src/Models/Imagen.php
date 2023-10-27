<?php 

namespace App\Models; //? Nombre de espacio, donde esta actualmente el archivo Imagen.php

class Imagen{
    //todo Creamos el constructor con todos los atributos o variables que vamos a necesitar para hacer el proyecto en este caso: 
    //* webformatURL --> Que es la foto en si
    //* user --> Que es el usuario que ha subido la imagen
    //* likes --> Numero de likes que tiene la imagen
    public function __construct(

        public string $webformatURL, //! Almacena la url de la imagen
        public string $user, //! Almacena el nick (nombre) del usuario
        public int $likes //! Almacena el numero de likes que tiene la foto
    ){}
}
