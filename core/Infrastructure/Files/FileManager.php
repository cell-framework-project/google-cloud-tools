<?php

namespace Core\Infrastructure\Files;

class FileManager{

  protected static $instance;
  protected $root;

  public function __construct(string $root){
    $this->root = $root;
  }

  public static function instanciate(string $root):self{

    if(!isset(self::$instance)){
      self::$instance = new self($root);
    }

    return self::$instance;

  }

  public function getRepository(string $label,string $folder,string $extension):FileRepository{

    return FileRepository::instanciate($label,$this->root,$folder,$extension);

  }

}