<?php

namespace Core\Infrastructure\Files;

use Core\Infrastructure\Files\FileObjectInterface;

class FileObject implements FileObjectInterface{

  protected $root='none';
  protected $folder;
  protected $name;
  protected $file;
  protected $content;
  protected $extension;

  public function __construct(string $root,string $folder, string $name, string $extension, string $content = null){

    $this->root = $root;
    $this->folder=$folder;
    $this->name = $name;
    $this->extension = $extension;

    if(isset($content)){
      $this->content = $content;
    }
    
  }

  public function content():string{

    if(!isset($this->content)){
      $this->content = file_get_contents($this->root.'/'.$this->folder.'/'.$this->name.'.'.$this->extension);
    }
    return $this->content;

  }

  public function name():string{
    return $this->name;
  }

  public function folder():string{
    return $this->folder;
  }

  public function extension():string{
    return $this->extension;
  }

}