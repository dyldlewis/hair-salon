<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
    return $app['twig']->render('index.html.twig');
    });

    // $app->get("/cuisines", function() use ($app) {
    //     return $app['twig']->render('index.html.twig', array('cuisines' => Cuisines::getAll()));
    // });


    return $app;
?>
