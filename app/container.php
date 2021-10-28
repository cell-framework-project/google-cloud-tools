<?php

use Core\Infrastructure\Files\FileManager;
use Core\Infrastructure\Files\CfdiTransformer;
use Core\Infrastructure\Files\JsonFunnel;

use Slim\Container;

//mandamos llamar ficheros de configuracion
require_once ROOT_DIR.'/config/config.php';

//agregamos configuracion al contenedor
$container = new Container(
  $app_config
);

$container['fm'] = function(Container $container){
  return FileManager::instanciate(ROOT_DIR.'/files');
};

$container['cfdi-transformer'] = function(Container $container){
  return new CfdiTransformer(ROOT_DIR.'/files');
};

$container['json-funnel'] = function(Container $container){
  return new JsonFunnel(ROOT_DIR.'/files');
};

$container['xml-repository'] = function(Container $container){
  return new JsonFunnel(ROOT_DIR.'/files');
};

//regresamos el fichero con container completo
return $container;