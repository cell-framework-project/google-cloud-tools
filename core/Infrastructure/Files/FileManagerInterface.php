<?php

namespace Core\Infrastructure\Files;

use Core\Infrastructure\Files\FileRepositoryInterface;

interface FileManagerInterface{

  public function getRepository(string $label,string $folder,string $extension):FileRepositoryInterface;

}