<?php

/* Slim PHP micro framework */
require 'php/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/* NotORM - PHP library for simple working with data in the database */
require_once 'php/libs/NotORM/NotORM.php';

/* PHPMailer - A full-featured email creation and transfer class for PHP */
require_once 'php/libs/PHPMailer/PHPMailerAutoload.php';

/* configurations */
require_once 'config.php';

// Instancia de Slim para manejar el micro framework
$app = new Slim\Slim($slim_config);

// Conexion con la BD
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = new NotORM($pdo);

$app->get('/', function() use($pdo, $db) {
    //echo 'programando con el microframework Slim';
// echo '<pre>';
    var_dump($db);

});

$app->get('/usuario', function() use($app, $db){
//  echo 'Hola ' . $nombre;
// $app->render('index.php', compact('nombre'));
	$tres_dias = mktime(date("h")+72, date("i"), date("s"), date("m")  , date("d"), date("Y"));
    echo date("d-m-Y h:i:s", $tres_dias);
    $usuarios = $db->usuario();
// echo '<pre></pre>';
})->name('/mundo/');

require_once 'routes.php';
$app->run();
?>