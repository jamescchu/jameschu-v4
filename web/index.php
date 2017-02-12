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
$app->get('/works/:slug', [new \App\Controller\SiteController($app), 'details'])->setName('details');
$app->get('/works/:slug/process', [new \App\Controller\SiteController($app), 'process'])->setName('process');
$app->run();
