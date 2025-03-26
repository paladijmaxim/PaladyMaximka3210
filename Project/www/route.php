<?php

    return [
        "~article/create$~" => [src\Controllers\ArticleController::class, 'create'],
        "~article$~" => [src\Controllers\ArticleController::class, 'store'],
        "~article/(\d+)$~" => [src\Controllers\ArticleController::class, 'show'],
         "~article/(\d+)/edit~" => [src\Controllers\ArticleController::class, 'edit'],
         "~article/(\d+)/update~" => [src\Controllers\ArticleController::class, 'update'],
         "~article/(\d+)/delete~" => [src\Controllers\ArticleController::class, 'delete'],
        "~^$~" => [src\Controllers\ArticleController::class, 'index'],
        "~^hello/(.*)$~" =>[src\Controllers\MainController::class, 'sayHello'],
        "~^bye/(.*)$~" =>[src\Controllers\MainController::class, 'sayBye'],
        "~^comment/(\d+)/edit$~" => [CommentController::class, 'edit'],
        "~^comment/(\d+)/update$~" => [CommentController::class, 'update'],
        '#^article/(\d+)/comment$#' => ['src\Controllers\CommentController', 'store'],
    ];