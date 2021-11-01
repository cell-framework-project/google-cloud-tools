<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;

use Core\Infrastructure\Files\FileObject;

final class CfdiTransformController{

  public function __construct(ContainerInterface $container){
  
    $this->container = $container;
    $this->cfdiTransformService = $this->container['cfdi-transform-service'];

  }

  public function transform(RequestInterface $request, $response){

    $this->cfdiTransformService->run([]);

    echo('cool');

  }

}