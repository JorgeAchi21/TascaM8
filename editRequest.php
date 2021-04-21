<?php
require_once('tareas.php');

$id = $_GET['id'];
//echo "<br>".$id;

$cad = "?id=".$id;
$cad1 = "Location: index.php" . $cad;

//echo "get: ". $cad1 . "<br>";

header($cad1);
exit;
/*
$cantidad = $_GET['candidad'];
$precio = $_GET['precio'];
echo "Datos recibidos:";
var_dump($id);

$request = [
    "nombre" => $nombre,
    "cantidad" => intval($cantidad),
    "precio" => floatval($precio)
];

echo '<div>';
echo 'Datos registro a eliminar: ';
var_dump($request);
echo '</div>';


$task = new Task();

$result = $task->update($request);

echo 'resultado: '. $result.'<br>';
if ($result){
    header("Location: index.php");
} else {
    echo 'Error en bbdd insert';
}
*/
?>

<br>
<h2>Regresar a inicio: index.php</h2>
<a href="index.php">ir a inicio</a>