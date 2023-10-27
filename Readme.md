# 📷 Pixabay Image Browser

## Descripción

Este proyecto es una herramienta de visualización basada en la API de [Pixabay](https://pixabay.com). A diferencia de los buscadores convencionales de películas, esta herramienta permite explorar y visualizar imágenes de cualquier categoría directamente desde Pixabay.

## Características Principales

- 🔍 Búsqueda directa de imágenes usando la API de Pixabay.
- 🖼️ Presentación en tarjetas al estilo de "películas populares".
- 📌 Cada tarjeta contiene:
  - La imagen en cuestión.
  - El nombre del autor.
  - La cantidad de "likes" que ha recibido.

## Modelo de Datos

Se ha diseñado un modelo llamado `Imagen` con las siguientes especificaciones:

- **imagen**: Representa la URL en formato web (`webformatURL` en la API).
- **autor**: Corresponde al usuario o creador de la imagen (`user` en la API).
- **likes**: Refleja el número de "likes" o "me gusta" que ha recibido la imagen (`likes` en la API).

## Clase Provider

Este proyecto cuenta con una clase `Provider` encargada de interactuar con la API de Pixabay y devolver un array con 20 objetos de imágenes.

## Uso de la Clase `Provider.php`

Para realizar una búsqueda, sigue estos pasos:

1. Abre la clase `Provider.php`.
2. Busca la constante `URL_API` y modifica la URL proporcionada.
3. Reemplaza `key` con tu clave de API personal.
4. Cambia `&q=lo_que_quieras_buscar` por el término o palabra clave que deseas buscar.

**Ejemplo de URL configurada:**

```php
private const URL_API = "https://pixabay.com/api/?key=TU_CLAVE_API&q=almeria";


