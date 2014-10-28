Gestión de Variables
=================

[Inicio Documentación][1] 

# Cómo funciona

Actualmente se pueden recuperar variables del tipo $_GET y Constantes.

## Recuperar y configurar variables $_GET


Para definir las variables que llevarán una URL estas se han de definir en el archivo `config/rutas.yml` .

Ejemplos de definición de 3 rutas dentro del archivo `config/rutas.yml`:

```

OtroNombre:
    url: 
    controller: Index::index
    permiso: 1
    fuenteacceso: bbdd


UnNombre:
    url: blog/{slug:string}
    controller: Blog::listado
    permiso: 0
    fuenteacceso: sin


UnNombreMas:
    url: {slug:string}
    controller: Productos::detalleProducto
    permiso: 0
    fuenteacceso: sin

```

En estos ejemplos vemos como primero se define un nombre en este caso: `OtroNombre`, `UnNombre` y `UnNombreMas`. Cada grupo son parámetros para configurar las urls.

En esta configuración tenemos, tomamos como ejemplo la url llamada `UnNombre`:

- *url* = Define la construcción de la url en este caso tenemos un valor fijo llamado *blog* seguido de una barra y una variable en este caso llamada `slug` y con un atributo `string`.
- *controller* = Define el controlador que redirige, en este caso al `src/Controller/BlogController.php` y dentro del controlador el método `listado`.
- *permiso* = Aquí definimos si esta url debe estar restringida su acceso o es libre acceso, en este  acceso es 0 = libre acceso. Esto se detalla en  [Control Acceso][2].
- *fuenteacceso* = También esta relacionado con el acceso. Ver [Control Acceso][2].


## Definir tipos de atributos en la url.

Estos pueden ser `string`, `int` o `locale`.

El atributo `locale` lo especificamos en [Control Acceso][2]. Los otros nos servirán para definir el tipo de variable.

- `string` = Para variables de texto.
- `int`    = Para variables numéricos.


## Cómo recuperar una variable $_GET Dentro del controlador.

Una vez definidas con esta sintaxis: {NOMBRE:TIPO}, donde NOMBRE es el nombre que queramos asignar a la variable y TIPO el tipo de variable.

Dentro del controlador se ha de activar el selector de Gets y filtrarla.

Activar el selector se puede hacer en el __construct o la principio del método de esta forma....


```

$this->cargaGets();

```

Luego dentro del método (ejemplo anteriro con la url llamada `UnNombre`) ...

```

$slug = $this->parametros_get['slug'];

```

Todas las urls tiene un nombre por donde recuperarlas solamente en el caso de por ejemplo la url llamada `UnNombreMas` donde no se tiene ningún `/` y va directamente una variable. Solo en estos casos la variable no tiene nombre y se ha de llamar así.


```

$slug = $this->parametros_get[''];

```

Para urls con nombres fijos se escriben directamente por ejemplo url con nombre fijo.


```
ElnombreUrl:
    url: contacto
    controller: Index::contacto
    permiso: 0
    fuenteacceso: sin


```


[1]:  Inicio_Documentacion.md
[2]: Sistema_seguridad.md
