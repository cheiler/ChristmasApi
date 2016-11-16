<?php

$config = new \Slim\Container();
$config['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($config) {
        return $config['response']->withStatus(500)
                             ->withHeader('Content-Type', 'text/html')
                             ->write('Something went wrong!');
    };
};

$config['notAllowedHandler'] = function ($config) {
    return function ($request, $response, $methods) use ($config) {
        return $config['response']
            ->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withHeader('Content-type', 'text/html')
            ->write('Method must be one of: ' . implode(', ', $methods));
    };
};

//Override the default Not Found Handler
$config['notFoundHandler'] = function ($config) {
    return function ($request, $response) use ($config) {
        return $config['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
    };
};