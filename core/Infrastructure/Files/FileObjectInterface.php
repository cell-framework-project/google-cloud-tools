<?php

namespace Core\Infrastructure\Files;

interface FileObjectInterface{
  public function folder():string;
  public function content():string;
  public function name():string;
  public function extension():string;
}