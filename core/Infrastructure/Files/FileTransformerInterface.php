<?php

namespace Core\Infrastructure\Files;

use Core\Infrastructure\Files\FileObjectInterface;

interface FileTransformerInterface{

  public function transform(FileObjectInterface $fileObject):FileObjectInterface;
  
}