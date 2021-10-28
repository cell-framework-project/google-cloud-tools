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
    $this->cfdiTransformer = $this->container['cfdi-transformer'];
    $this->jsonFunnel = $this->container['json-funnel'];
    $this->xmlRepository = $this->fm->getRepository('xml-repo','xml','xml');

  }

  public function index(RequestInterface $request, $response){

    header('Content-Type: application/json');

    echo(json_encode($this->xmlRepository->list()));

  }

  public function billing(RequestInterface $request, $response){

    //header('Content-Type: application/json');
    
    $xmlCfdi = $this->xmlRepository->find('cfdi_1');
    $jsonCfdi = $this->cfdiTransformer->transform($xmlCfdi,'json');

    echo($jsonCfdi->content());

  }

  public function billingArray(RequestInterface $request, $response){

    header('Content-Type: application/json');
    
    $xmlCfdis = $this->xmlRepository->findAll();

    $jsonCfdis=[];

    foreach ($xmlCfdis as $xmlCfdi) {
      $jsonCfdi = $this->cfdiTransformer->transform($xmlCfdi,'json');
      $jsonCfdis[]=$jsonCfdi;
    }

    $jsonCfdiTable = $this->jsonFunnel->union($jsonCfdis,'json_table','json_all_in_one');

    echo($jsonCfdiTable->content());
  
  }



}