<?php

/**
 * app.js -> app.php
 * Loads all JavaScript resources
 */

define('__PRODUCTION__', false);

/*

 ACA IMPORTA MatthiasMullie\Minify 

 https://github.com/matthiasmullie/minify

*/

use MatthiasMullie\Minify;

header("Content-Type: application/javascript");

if (__PRODUCTION__) {
    header("Cache-Control: max-age=172800"); //Cache valido por 48hs
    // En caso de actualizacion, cambiar la version
} else {
    // Con esto evitamos el cache cuando es en dev stage
    header("Cache-Control: no-cache, no-store, must-revalidate");
}

$minifier = new Minify\JS();

$libs = [
    //"jquery-3.4.1.slim.min.js",    
];

foreach ($libs as $lib) {
    $minifier->add($lib);
}

echo $minifier->minify();
