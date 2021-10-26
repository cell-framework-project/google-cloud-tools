<?php

namespace Core\Storage;

use Core\Storage\StorageBucket;
use Google\Cloud\Storage\StorageClient;

use Core\Storage\StorageBucketInterface;

class StorageManager implements StorageManagerInterface{

  //nested storage client
  protected $storage=null;

  //singleton instance
  protected static $instance=null;

  //constructor
  public function __construct(array $config){

    $this->storage = new StorageClient($config);

  }

  //singleton function
  public static function instanciate(array $config):self{

    if(!isset(self::$instance)){
      self::$instance = new self($config);
    }

    return self::$instance;

  }

  //get one storage bucket
  public function getBucket(string $name):StorageBucketInterface{

    return StorageBucket::instanciate($name,$this->storage->bucket($name));

  }

  //list all buckets
  public function list():array{
    $bucketIterator = $this->storage->buckets();
    $buckets = [];

    foreach ($bucketIterator as $bucket) {
      $buckets[] = $bucket->name();
    }

    return $buckets;

  }

}