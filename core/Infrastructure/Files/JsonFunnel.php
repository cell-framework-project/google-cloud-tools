<?php

namespace Core\Infrastructure\Files;

class JsonFunnel{

  protected $root;

  public function __construct(string $root){
    $this->root = $root;
  }

  public function union(array $fileObjects,string $folder, string $name):FileObjectInterface{

    $contents=[];

    foreach ($fileObjects as $fileObject) {
      $content = $fileObject->content();
      $contents[]=$content;
    }

    $jsonTable = '['.implode(',',$contents).']';
    return new FileObject($this->root,$folder,$name,'json',$jsonTable);

  }


}

