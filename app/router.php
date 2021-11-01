<?php

//main
$app->get('/files', App\Controllers\FileController::class.':index');
$app->get('/files/billing', App\Controllers\FileController::class.':billing');
$app->get('/files/billing-array', App\Controllers\FileController::class.':billingArray');
$app->get('/cfdi-transform', App\Controllers\CfdiTransformController::class.':transform');





