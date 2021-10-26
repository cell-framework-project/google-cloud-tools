<?php

namespace Core\Storage;
use Core\Storage\StorageFileInterface;

interface StorageBucketInterface{

  public function getStorageFiles():array;
  public function getStorageFile(string $name):StorageFileInterface;
  public function list():array;

}