<?php

namespace Core\Infrastructure\Files;

interface FileManagerInterface{

  public function getRepository(string $label,string $folder,string $extension):FileRepository;

}