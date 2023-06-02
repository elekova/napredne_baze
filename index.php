<?php

// Definiramo globalno vidljive constante:
// __SITE_PATH = putanja na disku servera do index.php
// __SITE_URL  = URL do index.php
define( '__SITE_PATH', realpath( dirname( __FILE__ ) ) );
define( '__SITE_URL', dirname( $_SERVER['PHP_SELF'] ) );

// Zapo�nemo/nastavimo session
session_start();

// Inicijaliziraj aplikaciju (u�itava bazne klase, autoload klasa iz modela).
require_once 'app/init.php';

// Stvori zajedni�ki registry podataka u aplikaciji.
$registry = new Registry();

// Stvori novi router, spremi ga u registry.
$registry->router = new Router($registry);

// Javi routeru putanju gdje su spremljeni svi controlleri.
$registry->router->setPath( __SITE_PATH . '/controller' );

// Stvori novi template za prikaz view-a.
$registry->template = new Template($registry);

// U�itaj controller pomo�u routera.
$registry->router->loader();

?>