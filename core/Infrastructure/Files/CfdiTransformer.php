<?php

namespace Core\Infrastructure\Files;

use Core\Infrastructure\Files\FileObjectInterface;
use PhpCfdi\CfdiToJson\JsonConverter;

final class CfdiTransformer{

  protected $newFolder;
  protected $currentFolder;
  protected $root;

  public function __construct(string $root, string $folder){

    $this->root = $root;
    $this->folder = $folder;

  }

  public function transform(FileObjectInterface $fileObject):FileObjectInterface{

    $xmlContent = $fileObject->content();
    $jsonContent = JsonConverter::convertToJson($xmlContent);
    return new FileObject($this->root,$this->folder,$fileObject->name(),'json',$jsonContent);

  }
  
}