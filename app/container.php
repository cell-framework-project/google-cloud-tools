<?php

use App\ApplicationService\CfdiConvertService;
use App\ApplicationService\JsonCfdiFuseService;
use Core\Infrastructure\Files\FileManager;
use Core\Infrastructure\Files\CfdiConverter;
use Core\Infrastructure\Files\JsonFunnel;

use Slim\Container;

//mandamos llamar ficheros de configuracion
require_once ROOT_DIR.'/config/config.php';

//agregamos configuracion al contenedor
$container = new Container(
  $app_config
);

//infraestructuras
$container['fm'] = function(Container $container){
  return FileManager::instanciate(ROOT_DIR.'/files');
};

$container['cfdi-converter'] = function(Container $container){
  return CfdiConverter::instanciate(ROOT_DIR.'/files');
};

$container['json-funnel'] = function(Container $container){
  return JsonFunnel::instanciate(ROOT_DIR.'/files');
};

//servicios de aplicación
$container['cfdi-transform-service'] = function(Container $container){
  return new CfdiConvertService($container['fm'],$container['cfdi-converter']);
};

$container['cfdi-fuse-service'] = function(Container $container){
  return new JsonCfdiFuseService($container['fm'],$container['json-funnel']);
};

//regresamos el fichero con container completo
return $container;