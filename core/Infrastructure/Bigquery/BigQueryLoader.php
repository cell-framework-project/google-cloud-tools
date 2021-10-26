<?php

namespace Core\BigQuery;

use Google\Cloud\BigQuery\BigQueryClient;

class BigQueryLoader{

  public function __construct(BigQueryClient $bigQueryClient){
    $this->bigQueryClient = $bigQueryClient;
  }

  

}


