<?php

namespace Core\Storage;

use Google\Cloud\Storage\Bucket;
use Core\Storage\StorageFile;
use Core\Storage\StorageBucketInterface;

class StorageBucket implements StorageBucketInterface{

  protected $bucket;
  protected static $instances=[];

  public function __construct(Bucket $bucket){
    $this->bucket = $bucket;
  }


  //singleton pool function (one for each key name)
  public static function instanciate(string $name,Bucket $bucket):self{

    if(!isset(self::$instances[$name])){
      self::$instances[$name] = new self($bucket);
    }

    return self::$instances[$name];

  }

  //list of storage file objects
  public function getStorageFiles():array{

    $objectIterator = $this->bucket->objects([]);
    $objects = [];

    foreach ($objectIterator as $object) {
      $objects[$object->name()] = $object;
    }

    return $objects;

  }

  //get one file
  public function getStorageFile(string $name):StorageFileInterface{

    return new StorageFile($this->bucket->object($name));

  }

  public function list():array{

    $objectIterator = $this->bucket->objects([]);
    $objects = [];

    foreach ($objectIterator as $object) {

      $objects[] = $object->name();

    }

    return $objects;

  }

}