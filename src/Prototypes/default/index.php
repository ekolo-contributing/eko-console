<?php
    $app = require __DIR__.'/bootstrap/app.php';

    use Ekolo\Framework\Bootstrap\Middleware;

    $pages = require './routes/pages.php';

    $app->middleware('errors', function (Middleware $middleware) {
        $middleware->getError();
    });
    
    $app->use('/', $pages);