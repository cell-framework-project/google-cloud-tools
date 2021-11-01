<?php

namespace App\ApplicationService;

use Core\ApplicationService\JobServiceInterace;
use Core\Infrastructure\Files\FileManagerInterface;
use Core\Infrastructure\Files\JsonFunnel;

class JsonCfdiFuseService implements JobServiceInterace{

  protected $jsonCfdiRepository;
  protected $jsonCfdiTableRepository;
  protected $jsonFunnel;

  public function __construct(FileManagerInterface $fm,JsonFunnel $jsonFunnel){
    
    $this->jsonCfdiRepository = $fm->getRepository('json-cfdi','json_cfdi','json');
    $this->jsonCfdiTableRepository = $fm->getRepository('json-cfdi-table','json_cfdi_table','json');
    $this->jsonFunnel = $jsonFunnel;

  }

  public function run(array $parameters): void{
    
    $jsonCfdis = $this->jsonCfdiRepository->findAll();

    $jsonCfdiTable = $this->jsonFunnel->fuse($jsonCfdis,'json_cfdi_table','json_cfdi_aio');

    print_r($jsonCfdiTable);

    
  }

}


