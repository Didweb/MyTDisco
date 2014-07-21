Configurar Gestor
=================

[Inicio Documentación][1] 

# Cómo funciona

Para poder crear nuestro se han de configurar algunos parámetros.

Estos parámetros se encuentran en le archivo de configuración: `config/gestor.yml`.

- 1: Las tablas que se han de listar en el CRUD.
- 2: Los campos que saldrán en el listado.
- 3: Los campos que son valores dependientes otras tablas, como por ejemplo una categoría.
- 4: Los campos que saldrán en los formularios así como el tipo de dato.
- 5: Los campos que precisan una traducción.
- 6: Idiomas del gestor.

Las configuraciones se crean en el  archivo `config/gestor.yml`.

## Configuración 1: Tablas del CRUD

```

Gestor:
    tablas: productos,categorias,subcategorias

```

Se ha de definir el parámetro `tablas` con el nombre de las tablas separadas por comas `,` .

Esto hace que se cree un menú en el gestor para poder acceder alas acciones del CRUD de cada tabla.



## Configuración 2: Campos para el listado

```

Campos:
    productos: id,nombre,idcategorias
    categorias: id,nombre,idsubcategorias 
    subcategorias: id,nombre


```
Dentro de `Campos` especificamos el nombre de cada tabla y luego los campos que deben salir en el listado, separados por comas `,`.


## Configuración 3: Definir campos dependientes

Con campos dependientes me refiero aquellos campos de los cuales depende otra tabla por ejemplo dentro de `productos` podemos tener un campo llamado `idcategoria` el cual depende de la tabla categorías.

Se especifica de la siguiente forma:

``` 

dependientes: productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre 


```
dentro de `dependientes` ponemos los campos separados por `@` y dentro de cada tramo se especifican los siguientes parámetros:

En el ejemplo anterior tenemos productos.idcategorias:categorias|id|nombre**@**categorias.idsubcategorias:subcategorias|id|nombre dos grupos:

El primero:

```
productos.idcategorias:categorias|id|nombre

```
... nos dice que en la **tabla** : `productos`, tenemos un **campo**: `idcategoria`, Separado por con `:` viene otras características, donde tenemos **la tabla padre** (  de donde dependen los datos): `categorias`, el **campo identificativo**: id y el **campo que debe msotrar**: `nombre`



## Configuración 4: Campos para el formulario

Dentro de `Campos` encontramos esto ...

```
    tab_productos: id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|normal|string
    tab_categorias: id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int
    tab_subcategorias: id|oculto|int,nombre|nomral|string

```

Donde se especifica los campos y el tipo,  que han de salir en los formularios, en este ejemplo:

Tenemos `tab_productos` se ha de especificar el nombre d ela tabla con el prefijo `tab_`, Separado por comas `,` tenemos los campos y dentro diferentes especificaciones, por eejemplo en el primer tramo de `tab_productos` tenemos:

```

id|oculto|int


```

Separado por `|` se define id = Nombre del campo, oculto =  tipo de input en este caso sera oculto y int = tipo de dato.

Así que tenemos:


```

NOMBRE_CAMPO|TIPO_DE_INPUT|TIPO_DE_DATO

```

De momento existen las siguientes opciones:

**TIPO_DE_INPUT**: 
- oculto: esto creao un input de tipo `hidden`.
- normal: crea uno d etipo normal o `text`.
- depe: creara un `select` con los datos proporcionados en la configuración de `dependientes`


**TIPO_DE_DATO**:
- int: es un integer, numero entero.
- string: para cadenas de texto, alfanuméricas.

Estas definiciones se irán ampliando según las necesidades.




## Configuración 5: Campos que precisan traducción

Tendría este aspecto:

```

    trad_productos: nombre,des
    trad_categorias: nombre
    trad_subcategorias: nombre


```

Se definen con el prefijo `trad_` y a continuación el nombre de la tabla y serados por comas `,` se colocan los nombres de campos que precisan una traducción.



##  Aspecto del archivo `config/Gestor.yml`
Este es el aspecto del archivo: 

```

Gestor:
    tablas: productos,categorias,subcategorias
    n_listados: 1

Campos:
    productos: id,nombre,idcategorias
    categorias: id,nombre,idsubcategorias 
    subcategorias: id,nombre
    dependientes: productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre  

    tab_productos: id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|normal|string
    tab_categorias: id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int
    tab_subcategorias: id|oculto|int,nombre|nomral|string
    
    trad_productos: nombre,des
    trad_categorias: nombre
    trad_subcategorias: nombre


```




## Configuración 6: Idiomas del gestor


El gestor esta inicialmente con 3 idiomas : Español, Català e Inglès.

Si se quiere añadir un idioma más se a de especificar en el archivo `config/Config.yml` y el parámetro `idiomas_gestor: es,ca,en` añadir otro idioma separado por comas `,`. 
Entonces se habrán de crear los diccionarios en `src/locale`, primero la carpeta que corresponda y duplicar los diccionarios del gestor que son `comungestor_xx.yml` y `formpass_xx.yml`.



[1]:  Inicio_Documentacion.md
