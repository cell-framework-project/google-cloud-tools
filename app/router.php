<?php

//main
$app->get('/files', App\Controllers\FileController::class.':index');
$app->get('/files/billing', App\Controllers\FileController::class.':billing');

