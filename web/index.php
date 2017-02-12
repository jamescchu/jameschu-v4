<?php
require dirname(__FILE__) . '/../vendor/autoload.php';
$app = new \Slim\Slim();

$app->container->singleton('template', function () {
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/../src/View');
    $twig = new Twig_Environment($loader, array(
        'debug' => true
        //'cache' => dirname(__FILE__) . '/../cache',
    ));
    return $twig;
});

// routes
$app->get('/', [new \App\Controller\SiteController($app), 'index'])->setName('home');
$app->get('/about', [new \App\Controller\SiteController($app), 'about'])->setName('about');
$app->run();
