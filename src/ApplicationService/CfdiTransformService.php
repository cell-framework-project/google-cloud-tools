<?php

namespace App\ApplicationService;

use Core\ApplicationService\JobServiceInterace;
use Core\Infrastructure\Files\CfdiTransformer;
use Core\Infrastructure\Files\FileManagerInterface;

class CfdiTransformService implements JobServiceInterace{

  protected $fm;
  protected $cfdiTransformer;

  public function __construct(FileManagerInterface $fm,CfdiTransformer $cfdiTransformer){
    
    $this->fm = $fm;
    $this->xmlCfdiRepository = $this->fm->getRepository('xml-cfdi','xml_cfdi','xml');
    $this->jsonCfdiRepository = $this->fm->getRepository('json-cfdi','json_cfdi','json');

  }

  public function run(array $parameters): void{
    
  }

}


