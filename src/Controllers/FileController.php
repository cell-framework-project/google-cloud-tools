<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;

use Core\Infrastructure\Files\FileObject;

final class FileController{

  public function __construct(ContainerInterface $container){
  
    $this->container = $container;
    $this->jsonCfdiRepository = $this->container['json-cfdi-repository'];
    $this->xmlCfdiRepository = $this->container['xml-cfdi-repository'];
    $this->cfdiTransformer = $this->container['cfdi-transformer'];
    $this->jsonFunnel = $this->container['json-funnel'];

  }

  public function index(RequestInterface $request, $response){

    header('Content-Type: application/json');
    echo(json_encode($this->xmlCfdiRepository->list()));

  }

  public function billing(RequestInterface $request, $response){

    header('Content-Type: application/json');
    $xmlCfdi = $this->xmlCfdiRepository->find('cfdi_1');
    $jsonCfdi = $this->cfdiTransformer->transform($xmlCfdi,'json');
    echo($jsonCfdi->content());

  }

  public function billingArray(RequestInterface $request, $response){

    header('Content-Type: application/json');
    $xmlCfdis = $this->xmlCfdiRepository->findAll();
    $jsonCfdis=[];

    foreach ($xmlCfdis as $xmlCfdi) {
      $jsonCfdi = $this->cfdiTransformer->transform($xmlCfdi,'json_cfdi');
      $jsonCfdis[]=$jsonCfdi;
    }

    $jsonCfdiTable = $this->jsonFunnel->union($jsonCfdis,'json_table','json_all_in_one');
    echo($jsonCfdiTable->content());
  }

  public function debug(RequestInterface $request, $response){
    $className = FileObject::class;
    $classNameParts = explode('\\',$className);
    $classNameCamelCase = $classNameParts[count($classNameParts)-1];
  }

}