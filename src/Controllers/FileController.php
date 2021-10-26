<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;

use Core\Infrastructure\Files\FileObject;

final class FileController{

  public function __construct(ContainerInterface $container){
  
    $this->container = $container;
    $this->fm = $this->container['fm'];
    $this->repository = $this->fm->getRepository('xml-repo','xml','xml');

  }

  public function index(RequestInterface $request, $response){

    header('Content-Type: application/json');

    echo(json_encode($this->repository->list()));

  }

  public function billing(RequestInterface $request, $response){



  }



}