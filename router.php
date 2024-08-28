<?php
//URI So the router knows what's up.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//Stored the routes into $config instead. Seemed like a better idea than seperate files all containing a tiny bit of code.
//Parenthesis are there because otherwise I can't call the specific element in the array.

// TODO: zet routes in apart "routes.php" bestand, omdat deze niet in een configuratiebestand horen
// (zet alleen systeem afhanekelijke parameters in config.php)
$routes = (require 'config.php')['routes'];

function routeToController($uri, $routes){
    //Check if the requested url exists in $siteLinks. If so link to the controller file, otherwise abort.
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort(){
    require "views/404.php";

    die();
}

routeToController($uri, $routes);
?>