<?php

namespace Core\Infrastructure\Files;

class FileManager implements FileManagerInterface{

  protected static $instance;
  protected $rootDir;

  public function __construct(string $rootDir){
    $this->rootDir = $rootDir;
  }

  public static function instanciate(string $rootDir):self{
    if(!isset(self::$instance)){
      self::$instance = new self($rootDir);
    }
    return self::$instance;
  }

  public function getRepository(string $label,string $folder,string $extension):FileRepository{
    return FileRepository::instanciate($label,$this->rootDir,$folder,$extension);
  }

}