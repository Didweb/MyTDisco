ChangeLog MyT
============

### 3.1.7
2-8-2014 - Eduard Pinuaga

- Se crea el cargador de servicios, para poder utilizar servicios de forma más limpia.


### 3.1.6
1-8-2014 - Eduard Pinuaga

- Mejoras para qpoder acceder a fuentes de usuarios desde Base de datos. 


### 3.1.5
29-7-2014 - Eduard Pinuaga

- Creación de campo oculto slug, en la zona de gestor. 


### 3.1.4
24-7-2014 - Eduard Pinuaga

- Evitar error de $listado_fotos_txt variable no encontrada.
- Gitignore ignorar, archivos temporales app/tmp e imágenes src/images
- Error en idiomas cuando se añadieron parámetros en el config/gestor.yml
- Formularios anidados insertar, eliminra.
- Al eliminar registros elimina imágenes asociadas y formularios anidados, así como idiomas relacionados.



### 3.1.3
23-7-2014 - Eduard Pinuaga

- Tipos de campos para formularios: Textarea.
- Eliminar archivo innecesario src/tempaltes/backend/pato-dos.html.
- Campos de fecha con calendario.


### 3.1.2
23-7-2014 - Eduard Pinuaga

- Campos fecha creación oculto y fecha modificación oculto.


### 3.1.1
23-7-2014 - Eduard Pinuaga

- Activación en formularios campos de tipo select.



### 3.1.0
23-7-2014 - Eduard Pinuaga

- Se ha terminado el gestor y Framework MyT.
- Inicio proceso de pruebas con proyecto paralelo.
- Se pueden subir imágenes y redimensionarlas.
- CRUD de imágenes completo y CRUD básico de Gestor funcionando.
- Separación de idiomas aplicación y Gestor, el gestor tiene 3 idiomas por defecto.
- Css de CRUD terminados.




### 3.0.8
12-7-2014 - Eduard Pinuaga

- Se ha reordenado el bootstrap.php para que se llame a las constantes y demás funcionalidades desde el controlador extendiendo la clase `Controlador` para hacer de puente entre distintos servicios.
- Se ha instalado el servicio de Seguridad con elementos básicos.
- Se ha iniciado el proceso y reorganización de carpetas de los templates para empezar a estandarizar un poco su funcionamiento.

Se han realizado diverso commits y versiones entre esta y la 3.0.3 que se resume en esta anotación.

### 3.0.3
5-7-2014 - Eduard Pinuaga

- Recoger diccionarios del sistema locale.
- Actualizar documentación


### 3.0.2
5-7-2014 - Eduard Pinuaga

- Inicio la documentación de MyT Framework.


### 3.0.1
5-7-2014 - Eduard Pinuaga

- Esta creado el sistema de seguridad para el acceso de usuarios.
- Se ha limpiado el código.
- Sistema de Locale detección creado.

