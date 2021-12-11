<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;

use Core\Infrastructure\Files\FileObject;

final class CfdiConverController{

  public function __construct(ContainerInterface $container){
  
    $this->container = $container;
    $this->cfdiConvertService = $this->container['cfdi-convert-service'];

  }

  public function convert(RequestInterface $request, $response){

    $this->cfdiConvertService->run([]);
    return $response->withStatus(201);

  }

}