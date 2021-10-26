<?php

namespace Core\Storage;

interface StorageManagerInterface{

  public function getBucket(string $name):StorageBucketInterface;
  public function list():array;

}