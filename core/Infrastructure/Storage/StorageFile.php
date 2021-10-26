<?php

namespace Core\Storage;

use Google\Cloud\Storage\StorageObject;
use Core\Storage\StorageFileInterface;

class StorageFile implements StorageFileInterface{

  protected $object=null;

  public function __construct(StorageObject $object){
    $this->object = $object;
  }

  public function name():string{
    return $this->object->name();
  }

  public function info():array{
    return $this->object->info();
  }

  public function downloadToFile(string $path):void{
    $this->object->downloadToFile($path);
  }

}