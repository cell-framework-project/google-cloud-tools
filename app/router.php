<?php



$app->get('/cfdi/cfdi-transform', App\Controllers\CfdiTransformController::class.':transform');
$app->get('/cfdi/cfdi-fuse', App\Controllers\CfdiFuseController::class.':fuse');






