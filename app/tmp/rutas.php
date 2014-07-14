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