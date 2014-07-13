Sistema Seguridad
=================

[Inicio Documentación][2] 


Sistema para el control de accesos a zonas restringidas.

Actualmente no soporta usuarios desde base de datos, solo configurados desde un archivo de configuración. Esta planeado ampliar este servicio [MyTSeguridad][1]


### Criterios

Las páginas de acceso libre tiene un permiso de acceso `0` y las que tiene distintos permisos se asignan `1` o podra asignarse otros superiores a `0`.

La idea es que los usuarios se definan con una categoría de permisos de forma jerárquica, por ejemplo un usuario con acceso 2 podrá acceder a todas las páginas definidas con un acceso de 2 o inferior.

De esta manera los usuarios definidos con acceso 1 no podrán acceder a páginas o contenidos definidos con un número superior.

Si un usuario accede a una página definida con un permiso de acceso superior a `0` se le redirige a la página de acceso para que se identifique. Debe pasar el proceso de identificación para poder ver la página.

### Claves

Las claves se almacenan codificadas sh1.




### Definiendo usuarios

Se definen en el archivo `config/seguridad.yml`, este archivo se transforma en una clase para poder acceder a estos datos de forma más rápida, esta clase se almacena en `tmp/seguridad.php`.

El proceso de transformación se realiza de forma automática cada vez que se percibe un cambio en el archivo de configuración `config/seguridad.yml`.

El aspecto es el siguiente:

```

Seguridad:
    
    usuarios:
        edu: e3f96800b051602e7ac5542e01747eb09147a54b:1
        pepito: 5d212bd2fed57636c27d15965598817b1e45d3ca:1

```

Donde en este caso `edu` y `pepito` son los usuaios. la cadena larga hasta el símbolo `:` es la codificación de la clave. Después del símbolo `:` se puede ver el tipo de acceso asignado para cada usuario.


### Especificando acceso a páginas restringidas

Dentro del archivo de configuración de URLs `config/rutas.yml` podemos definir el tipo de acceso qeu va a tener esta URL, un ejemplo:

```

IndexIdioma:
    url: home/{lang:locale}
    controller: Index::index
    permiso: 0
      
ruta_uno:
    url: getsor/{lang:locale}/{pagina:int}
    controller: Index::index2
    permiso: 1


```

Es en el parámetro `permiso` donde se especifica el número de acceso. En este ejemplo las URLs `home/es`, `home/en`, etc. Pueden acceder todos los usuarios, no es necesario que estén identificados.
Las URLs  del tipo: `getsor/es/1`, `getsor/en/1`, `getsor/es/3`, etc. solo pueden ser vistas por usuarios identificados con el acceso `1` o superior


[1]: https://github.com/Didweb/MyTsegurata
[2]:  Inicio_Documentacion.md

