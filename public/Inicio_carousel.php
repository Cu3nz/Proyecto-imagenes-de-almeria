<?php
use App\ApiProvider\Provider;

require_once __DIR__ . "/../vendor/autoload.php";

$listadoImagenes = Provider::traerImagenes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<div id="carouselDarkVariant" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        foreach ($listadoImagenes as $key => $img) {
            $isActive = $key === 0 ? 'active' : '';
            echo "<li data-target='#carouselDarkVariant' data-slide-to='$key' class='$isActive'></li>";
        }
        ?>
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
        <?php
        foreach ($listadoImagenes as $key => $img) {
            $isActive = $key === 0 ? 'active' : '';
            echo <<<HTML
            <div class="carousel-item $isActive">
                <img width="10%" src="{$img->webformatURL}" class="d-block w-100" alt="Motorbike Smoke">
                <div class="carousel-caption">
                    <h3>Usuario: {$img->user}</h3>
                    <p style="color:#fff">Numero de likes: {$img->likes}</p>
                </div>
            </div>
HTML;
        }
        ?>
    </div>

<style>


.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: red; /* Cambiar el fondo a rojo */
    color: white; /* Cambiar el color del ícono a blanco */
}


</style>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#carouselDarkVariant" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselDarkVariant" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
