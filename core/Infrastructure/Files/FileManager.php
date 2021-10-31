<?php

namespace Core\Infrastructure\Files;

class FileManager{

  protected static $instance;
  protected $rootDir;

  public function __construct(string $rootDir,string $configDir){
    $this->rootDir = $rootDir;
  }

  public static function instanciate(string $rootDir,string $configDir):self{

    if(!isset(self::$instance)){
      self::$instance = new self($rootDir,$configDir);
    }

    return self::$instance;

  }

  public function getRepository(string $label,string $folder,string $extension):FileRepository{
    return FileRepository::instanciate($label,$this->rootDir,$folder,$extension);
  }

}