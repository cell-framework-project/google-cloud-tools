<?php

namespace Core\ApplicationService;

interface JobServiceInterace{

  public function run(array $parameters):void;

}