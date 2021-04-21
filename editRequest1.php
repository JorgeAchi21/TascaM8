<?php
require_once('tareas.php');

$id = $_GET['id'];
$nombre = $_GET ['nombre'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

//echo "Datos recibidos:";
//var_dump($nombre);
//echo "<br>";

$request = [
    "id" => $id, 
    "nombre" => $nombre,
    "cantidad" => intval($cantidad),
    "precio" => floatval($precio)
];

/*
echo '<div>';
echo 'Datos registro a eliminar: ';
var_dump($request);
echo '</div>';*/

$task = new Task();

$result = $task->update($request);

//echo 'resultado: '. $result.'<br><br>';
if ($result){
    header("Location: index.php");
} else {
    echo 'Error en bbdd insert';
}
?>

<br>
<h2>Regresar a inicio: index.php</h2>
<a href="index.php">ir a inicio</a>