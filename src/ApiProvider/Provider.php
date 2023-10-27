<?php 

namespace App\ApiProvider; //? Nombre de espacio donde esta actualmente el archivo Provider.php

use App\Models\Imagen;

class Provider{

    //todo Definimos un array para meter todas las imagenes de almeria

    private static array $listadoImagenes;

    //todo Definimos la url de la api, que va a ser constante , por lo tanto no va a poder cambiar su valor una vez se defina. 

    private const URL_API = "https://pixabay.com/api/?key=40183563-6179a798dcf4b873856283976&q=almeria"; //? Definimos la url de la api 


    //todo Hacemos un metodo estatico que nos va a traer todas las imagenes que hay almacenadas en el fichero json (el json esta en la URL_API)

    public static function traerImagenes():array{

        $datosImagenes = file_get_contents(self::URL_API); //? file_get_contents lee el contenido del fichero json que almacena la URL_API y lo devuelve en forma de string a la variable $datosImagenes. 
        //die($datosImagenes); //* Esto muestra en la pagina de Inicio.php el json que hay en la url

        $datosImagenerFormateados = json_decode($datosImagenes); //? Decodifica el json que esta almacenada en la variable $datosImagenes y la convierte en una estructura de datos PHP que se almacenara en $datosImagenerFormateados. 
        //*Esto permite que tu código acceda y manipule fácilmente los datos contenidos en la respuesta JSON.Una vez hecho esto vamos a poder trabajar con los datos en forma de objetos arrays (en este caso) etc..
        //var_dump($datosImagenerFormateados); //! Esto muestra en la pagina de Inicio.php todos los datos que contiene el json en forma de array.

        self::$listadoImagenes = []; //? Definimos un array vacia, ponemos selft porque el array es estatica, por lo tanto pertenece a la clase y para acceder al array utilizamos el operador ::


        //! Importante
         //todo tenemos que ver la propiedad que nos interesa en el json en este caso me interesa "hits" ya que, es el array que contiene la informacion sobre cada imagen (URL, nº likes, usuario, tags etc... ) mirar la imagen que hay en la carpeta meInteresa_hits.png ; 
    
         //? Hacemos un var_dump() de $datosImagenerFormateados -> hits para ver si me devuelve la informacion que contiene el array hits 
         //var_dump($datosImagenerFormateados -> hits); //* Nos devuelve la informacion que contiene el array de hits ( url de la imagen, cometarios, user, likes, tags etc...), por lo tanto podemos hacer el foreach
         //die();
        
         //todo Utilizamos el foreach para recorrer los elementos del campo "HITS" (del json, el cual tiene el array que almacena la url de la imagen, cometarios, user, likes, tags etc...) y  que  se almacena en la variable $datosImagenerFormateados, para cada elemento se crea una instancia de la clase Imagen.
            //! La instancia de Imagen se crea con los siguientes valores
            //* - $imagen->webformatURL: Representa la URL de la foto en sí.
            //* - $imagen->user: Representa el usuario que ha subido la imagen.
            //* - $imagen->likes: Representa el número de likes que tiene la imagen.
           
            foreach ($datosImagenerFormateados -> hits as $imagen) { //? --> hits porque es el array que tiene la informacion que a mi me interesa recoger.
                $img = new Imagen(
                    $imagen -> webformatURL,
                    $imagen -> user,
                    $imagen -> likes
                );
                //todo La instancia de Imagen recién creada en $img se almacena en el array $listadoImagenes. (Si son 20 instancias, el array tendra 20 instancia de Imagen).
                self::$listadoImagenes[] = $img;

             //var_dump($img); //? Nos devuelve el array de  cada instancia de la imagen con los 3 datos, mirar imagen que esta en la carpeta var_dum($img).png;
             //die(); //? Si descomentamos el die, solo nos devuelve un resultado
            }
            return self::$listadoImagenes; //? Devolvemos lo que contiene el array.

    }
}
