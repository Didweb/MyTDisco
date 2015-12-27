Documentación
=============

Esta documentación informa del funcionamiento y configuración del MyT Framework, en principio es para que no me olvide i pueda ir evolucionando el Framework y poder tener documentado el código.

# Índice

- [Configurar Gestor][3] : Como configurar el gestor par amontar el CRUD de las webs.
- [Locale][1] : Sistema de locale para detectar el idioma, se explica su funcionamiento y configuración.
- [Control Acceso][2] : Sistema para el control de acceso a zonas restringidas.
- [Recuperar Variables][4] : Como recoger variables tipo $_GET y constantes.

# Base de datos

Existe un fichero con 2 tablas en /app/docs/Docuemntacion/base.sql el cual contine 2 tablas *myt_imagen* y *myt_locale* las caules son necesarias para controlar el sistema d eimágenes y el locale para las aplicaciones multiidiomas.

Este archivo se ha de cargar en la base de datos.

[1]: Sistema_Locale.md
[2]: Sistema_seguridad.md
[3]: Sistema_Configurar_Gestor.md
[4]: Sistema_Gestion_Variables.md
