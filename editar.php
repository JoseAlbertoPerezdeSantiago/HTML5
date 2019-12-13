<?php
include_once 'conexion.php';

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];

//echo $id,'<br>';
//echo $nombre, '<br>';
//echo $descripcion, '<br>';


$editar = 'UPDATE color SET nombre=?,descripcion=? WHERE id=?';
$sentecia_editar = $enlace->prepare($editar);
$sentecia_editar->execute(array($nombre,$descripcion,$id));

header('location:index.php');
