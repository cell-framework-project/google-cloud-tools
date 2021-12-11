<?php

$app->get('/cfdi/cfdi-convert', App\Controllers\CfdiConvertController::class.':convert');
$app->get('/cfdi/cfdi-fuse', App\Controllers\CfdiFuseController::class.':fuse');






