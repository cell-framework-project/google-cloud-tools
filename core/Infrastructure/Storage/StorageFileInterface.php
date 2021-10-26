<?php

namespace Core\Storage;

interface StorageFileInterface{

  public function name():string;
  public function info():array;
  public function downloadToFile(string $path):void;

}