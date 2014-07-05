Sistema Locle
=============

[Inicio Documentación][1] 

# Configuración

Se configura en el archivo `config/config.yml`.

Se ha de definir una linea parecida a esta:

```
idiomas: es,ca,en,fr,it

```

Donde se colocan todos los idiomas soportados por la aplicación. Sigue na nomenclatura ISO **ISO 639-1**.

Siempre se ha de definir como mínimo un idioma.



## Lógica

El sistema busca el idioma en el sistema del usuario, siempre y cuando este no venga mediante el GET y si no esta en la variable de SESSION.

Criterios para recoger por el usuario, si este tiene un idioma soportado lo muestra, en el caso de no tener idioma definido (puede ser un robot) o el idioma no esta soportado en la aplicación se da el idioma por defecto.

El idioma pro defecto es siempre el primero definido en el parámetro de `idioma` dentro de `config/config.yml`.



## Funcionamiento

Dentro de `app/Bootstrap.php` se hace el control de idioma en esta parte del código:

```
		if(isset($peticion->parametros_get['lang'])) {
			$parametro_get_lang = $peticion->parametros_get['lang']; 
			} else {
			$parametro_get_lang = '';	
			}
		
		/* Concretamos el idioma del usurio. 
		 * Mostramos uno soportado si el suyo no lo soporta la app.
		 * */
		$idioma = $peticion->getIdiomaLang($parametro_get_lang, $constantes->getIdiomas());

```

Se define el idioma por defecto o bien el del usuario si el sistema lo soporta este se envía al **Controlador** como parámetro en la siguiente línea:

```

		/* Inicializamos el controlador correspondiente a la url. */
		$carga = new $nomControlador($constantes, $peticion->redirect, $peticion->parametros_get, $idioma);
		$carga->$nomMetodo();

```

En el último parámetro con el nombre `$idioma`.



## URLs y el idioma

Las urls se forman en el archivo `config/rutas.yml` si queremos poner el parámetro del idioma dentro de la url para diferenciarla de otros idiomas, se ha de colocar 
de la siguiente manera:

```

ruta_uno:
    url: pato/dos/{lang:locale}/{pagina:int}
    controller: Index::index2

```


En este ejemplo se ve como se define en la parte de la url que dice `{lang:locale}` se ha de nombrar como lang y luego especificar el tipo de parámetro que estamos dando en este caso se ha de llamar `locale`.

Este mecanismo hace que detecte el idioma por GET y además diferenciar las URLs para el tema SEO.



## Idioma, Controladores y Vista

Para utilizar el sistema en las vistas y los controladores se hace de la siguiente manera.

Dentro del directorio `src/locale` se crean tantas carpetas como idiomas necesarios con el nombre del idioma según **ISO 639-1**, ejemplo `es` para español, `ca` para catalán, etc.

Dentro de cada idioma existirán los distintos diccionarios que se pueden crear tantos como queramos, organizados por paginas, por temas, etc.

Los diccionarios han de tener el nombre en minúsculas seguido d eun guión bajo y el código de idioma que corresponda, ejemplo: `nombre_es.yml` en formato `yml`. Siempre ha de existir una copia para cada idioma con los mismos parámetros y sus traducciones.


### Cómo funciona el locale y la vista

Dentro de `app` tenemos `AppLocale.php` este se encarga de almacenar el idioma y preparar el objeto. Dentro de `app/Bootstrap.php`,  este objeto se inyecta en el controlador en el último parámetro llamado `$locale`:

```

		$locale = new AppLocale($idioma);
		
		/* Inicializamos el controlador correspondiente a la url. */
		$carga = new $nomControlador($constantes, $peticion->redirect, $peticion->parametros_get, $idioma,$locale);
		$carga->$nomMetodo();

```

Dentro del controlador podemos llamar al método que se encarga de traernos el diccionario que corresponda. De esta forma:

```

$traducciones = $this->locale->trad('comun');

```

En este caso nos traerá el diccionario llamado `comun` y el idioma el que corresponda.

Lo pasamos a la vista como un parámetro y lo podemos visualizar en la plantilla de la siguiente manera:

En el controlador...

```
		$traducciones = $this->locale->trad('comun');
		
		$twig = $this->cargaTwig('src/templates/fijas');	
		echo $twig->render('pato-dos.html', array( 'trad' => $traducciones ));

```


En la vista ...

```

Traducciones: <b>{{ trad.Saludo }}</b>

```

Donde `Saludo` es el nombre del parámetro de traducción que se indico en el archivo `yml`.




### Cache de idiomas

La lectura del archivo `yml` se realiza en el caso de que este tenga cambios. Si tiene cambios o es nuevo, el sisetma crea el objeto necesario para llamar alas traducciones.



[1]:  Inicio_Documentacion.md
