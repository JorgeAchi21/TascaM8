<?php
require_once('tareas.php');

$id = $_GET['id'];
/*
var_dump($id);

$request = [

    "nombre" => $nombre,
    "cantidad" => intval($cantidad),
    "precio" => floatval($precio)
];

echo '<div>';
echo 'Registro a eliminar: '.$id;
echo '</div>';
*/

$task = new Task();

$result = $task->delete($id);

echo 'resultado: '. $result.'<br>';
if ($result){
    header("Location: index.php");
} else {
    echo 'Error en bbdd insert';
}

?>

<br>
<h2>Regresar a inicio: index.php</h2>
<a href="index.php">ir a inicio</a>