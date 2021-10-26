<?php

namespace Core\Infrastructure\Files;

interface FileRepositoryInterface{

  public function find(string $name):?FileObjectInterface;
  public function exists(string $name):bool;
  public function findAll():array;
  public function list():array;
  public function save(FileObjectInterface $fileObject):void;

}