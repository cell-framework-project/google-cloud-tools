<?php

//main
$app->get('/files', App\Controllers\FileController::class.':index');
$app->get('/files/debug', App\Controllers\FileController::class.':debug');
