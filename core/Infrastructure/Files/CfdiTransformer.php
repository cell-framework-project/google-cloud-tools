<?php

namespace Core\Infrastructure\Files;

use Core\Infrastructure\Files\FileObjectInterface;
use PhpCfdi\CfdiToJson\JsonConverter;

final class CfdiTransformer{

  protected $root;
  protected static $instance=null;

  public static function instanciate(string $root):self{

    if(!isset(self::$instance)){
      self::$instance = new self($root);
    }

    return self::$instance;

  }

  public function __construct(string $root){
    $this->root = $root;
  }

  public function transform(FileObjectInterface $fileObject,$folder):FileObjectInterface{

    $xmlContent = $fileObject->content();
    $jsonContent = JsonConverter::convertToJson($xmlContent);
    return new FileObject($this->root,$folder,$fileObject->name(),'json',$jsonContent);

  }
  
}