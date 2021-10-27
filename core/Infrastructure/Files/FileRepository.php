<?php

namespace Core\Infrastructure\Files;

class FileRepository{

  protected static $instances=[];
  protected $extension;
  protected $folder;
  protected $root;
  protected $list=[];

  public function __construct(string $root,string $folder, string $extension){

    $this->root = $root;
    $this->folder = $folder;
    $this->extension = $extension;
    $this->preloadList();

  }

  public static function instanciate(string $label, string $root,string $folder,string $extension):self{

    if(!isset(self::$instances[$label])){
      self::$instances[$label] = new self($root, $folder, $extension);
    }
    return self::$instances[$label];

  }

  public function exists(string $name):bool{
    return in_array($name,$this->list);
  }

  public function find(string $name):?FileObjectInterface{

    if($this->exists($name)){
      return new FileObject($this->root,$this->folder,$name,$this->extension,null);
    }
    else{
      return null;
    }

  }

  public function findAll():array{
    
    $files=[];

    foreach ($this->list as $name) {
      $files[] = $this->find($name);
    }

    return $files;

  }

  protected function preloadList():void{

    $uncleanList = scandir($this->root.'/'.$this->folder);
    $cleanList = [];

    foreach ($uncleanList as $file) {
      if($file!=='.'&&$file!=='..'){
        $cleanList[]=$file;
      }
    }

    foreach ($cleanList as $file) {

      $fileNameParts = explode('.',$file);
      $extension = $fileNameParts[count($fileNameParts)-1];

      $name='';

      for ($i=0; $i <count($fileNameParts)-1 ; $i++) { 
        $name .= $fileNameParts[$i];
      }

      if($extension===$this->extension){
        $this->list[] = $name;
      }

    }

  }

  public function list():array{
    return $this->list;
  }

}