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


[1]:  Inicio_Documentacion.md
