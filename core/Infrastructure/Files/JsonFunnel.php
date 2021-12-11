<?php

namespace Core\Infrastructure\Files;

class JsonFunnel{

  protected $rootDir;

  protected static $instance=null;

  public static function instanciate(string $rootDir):self{

    if(!isset(self::$instance)){
      self::$instance = new self($rootDir);
    }
    return self::$instance;

  }

  public function __construct(string $rootDir){
    $this->rootDir = $rootDir;
  }

  public function fuse(array $fileObjects,string $folder, string $name):FileObjectInterface{

    $contents=[];

    foreach ($fileObjects as $fileObject) {
      $content = $fileObject->content();
      $contents[]=$content;
    }

    $jsonTable = '['.implode(',',$contents).']';
    return new FileObject($this->rootDir,$folder,$name,'json',$jsonTable);

  }


}

