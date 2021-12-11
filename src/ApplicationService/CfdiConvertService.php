<?php

namespace App\ApplicationService;

use Core\ApplicationService\JobServiceInterace;
use Core\Infrastructure\Files\CfdiConverter;
use Core\Infrastructure\Files\FileManagerInterface;

class CfdiConvertService implements JobServiceInterace{

  protected $fm;
  protected $cfdiTransformer;
  protected $xmlCfdiRepository;
  protected $jsonCfdiRepository;

  public function __construct(FileManagerInterface $fm,CfdiConverter $cfdiTransformer){
    
    $this->fm = $fm;
    $this->xmlCfdiRepository = $this->fm->getRepository('xml-cfdi','xml_cfdi','xml');
    $this->jsonCfdiRepository = $this->fm->getRepository('json-cfdi','json_cfdi','json');
    $this->cfdiTransformer = $cfdiTransformer;

  }

  public function run(array $parameters): void{

    $xmlCfdis = $this->xmlCfdiRepository->findAll();

    foreach ($xmlCfdis as $xmlCfdi) {

      $jsonCfdi = $this->cfdiTransformer->convert($xmlCfdi,'json_cfdi');
      $this->jsonCfdiRepository->save($jsonCfdi);

    }

  }

}


