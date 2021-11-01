<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;

use Core\Infrastructure\Files\FileObject;

final class CfdiFuseController{

  public function __construct(ContainerInterface $container){
  
    $this->container = $container;
    $this->cfdiFuseService = $this->container['cfdi-fuse-service'];

  }

  public function fuse(RequestInterface $request, $response){

    $this->cfdiFuseService->run([]);
    
  }

}