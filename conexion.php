<?php

$link = 'mysql:host=localhost;dbname=colores';
$user = 'root';
$pass = '';

try{
    $enlace = new PDO($link, $user, $pass);

    /*foreach($enlace->query('SELECT * FROM `color` ') as $fila) {
        print_r($fila);
    }
    */

    //echo ('conectado');

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


// $mbd = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseña);
