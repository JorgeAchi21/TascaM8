<?php
//---------- Añadir un registro

require_once('tareas.php');

$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

var_dump($nombre);
var_dump($cantidad);
var_dump($precio);

$request = [
    "nombre" => $nombre,
    "cantidad" => intval($cantidad),
    "precio" => floatval($precio)
];

$task = new Task();

$result = $task->create($request);
//echo '<br> resultado: '. $result.'<br>';

if ($result){
    header("Location: index.php");
} else {
    echo 'Error en bbdd create';
}
?>


<br>
<h2>Regresar:</h2>
<a href="index.php">ir a inicio</a>