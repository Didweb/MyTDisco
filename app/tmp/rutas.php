<?php

 class rutas 
 { 

 private $data = array (
  'Index' => 
  array (
    'url' => '',
    'controller' => 'Index::index',
    'permiso' => 0,
  ),
  'IndexIdioma' => 
  array (
    'url' => 'home/{lang:locale}',
    'controller' => 'Index::index',
    'permiso' => 0,
  ),
  'ruta_uno' => 
  array (
    'url' => 'pato/dos/{lang:locale}/{pagina:int}',
    'controller' => 'Index::index2',
    'permiso' => 1,
  ),
  'Gestor_editar' => 
  array (
    'url' => 'gestor/editar/{tabla:string}/{id:int}',
    'controller' => 'Gestor::editar',
    'permiso' => 1,
  ),
  'Gestor_editar_idioma' => 
  array (
    'url' => 'gestor/editar-idioma/{tabla:string}/{id:int}/{idiomareg:string}',
    'controller' => 'Gestor::editaridioma',
    'permiso' => 1,
  ),
  'Gestor_editar_idioma_accion' => 
  array (
    'url' => 'gestor/editar-idioma-accion/{tabla:string}/{id:int}/{idiomareg:string}',
    'controller' => 'Gestor::editaridiomaccion',
    'permiso' => 1,
  ),
  'Gestor_editar_accion' => 
  array (
    'url' => 'gestor/editar-accion/{tabla:string}/{id:int}',
    'controller' => 'Gestor::editaraccion',
    'permiso' => 1,
  ),
  'Gestor_buscador' => 
  array (
    'url' => 'gestor/buscador/reultado',
    'controller' => 'Gestor::buscador',
    'permiso' => 1,
  ),
  'Gestor_listado' => 
  array (
    'url' => 'gestor/listado/{tabla:string}/{campo_orden:string}/{pagina:int}/{orden:string}',
    'controller' => 'Gestor::listado',
    'permiso' => 1,
  ),
  'Gestor_index' => 
  array (
    'url' => 'gestor/{lang:locale}/index',
    'controller' => 'Gestor::indexgestor',
    'permiso' => 1,
  ),
  'Gestor_index_cambio_idioma' => 
  array (
    'url' => 'gestor/{lang:locale}',
    'controller' => 'Gestor::indexgestor',
    'permiso' => 1,
  ),
  'Gestor_index_cambio_idioma2' => 
  array (
    'url' => 'gestor',
    'controller' => 'Gestor::indexgestor',
    'permiso' => 1,
  ),
  'ruta_dos' => 
  array (
    'url' => 'POLKAXY/{apellido:string}',
    'controller' => 'Index::indexpolka',
    'permiso' => 0,
  ),
  'ruta_tres' => 
  array (
    'url' => 'pluma',
    'controller' => 'Pluma::po',
    'permiso' => 0,
  ),
  'ruta_cuatro' => 
  array (
    'url' => 'pupa',
    'controller' => 'Pupa::pa',
    'permiso' => 0,
  ),
  'login2' => 
  array (
    'url' => 'checking',
    'controller' => 'Seguridad::check',
    'permiso' => 0,
  ),
  'checkout' => 
  array (
    'url' => 'checkout',
    'controller' => 'Seguridad::checkout',
    'permiso' => 0,
  ),
); 

 public function getRutas()
{ 
 return $this->data; 
} 

} 

?>