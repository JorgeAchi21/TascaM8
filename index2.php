<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica POO</title>


    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</head>
<body>
<?php $total = 0; ?>

<h1>CRUD POO:</h1>
Lectura de datos...<br>
<?php 
    //-----------Lectura de todos los datos
    require_once 'tareas.php';
    $task = new Task;

    $tasks = $task -> list();
    
    echo "Error:";
    var_dump($tasks);
    echo '<br>';

?>

Edit registro:<br>
<?php 
    //-----------Edit registro
    if (isset($_GET['id'])){
        echo "si existen datos update.<br>";

        $id = $_GET['id'];

        echo "id: ". $id;

        $task1 = new Task;

        $tasksE = $task1 -> show($id);
        /*
        foreach($tasks1 as $i){
            $e_id= $task1['id'];
            $e_nombre = $task1['nom'];
            $e_cantidad = $task1['quantitat'];
            $e_precio = $task1['preu'];
        }
        */
        echo '<br>Datos edicion taskE: ';
        var_dump ($tasksE);
        $e_id = $tasksE[0]['id'];
        $e_nombre = $tasksE[0]['nombre'];
        $e_cantidad = $tasksE[0]['cantidad'];
        $e_precio = $tasksE[0]['precio'];
        
        echo $e_nombre . "<br>";
   
    } else {
        echo "sin datos update.<br>";
    } 
    //datos estaticos de prueba.
    /*
    $id = 38 ;
    $nombre = "xjosex";
    $cantidad = 99;
    $precio = 10.2;
    */
?>

<br>
<h2>Mostrando los datos de la BBDD:</h2>
<table>
    <tr>
        <td>Id #</td>
        <td>Nom. Producto:</td>
        <td>Cantidad:</td>
        <td>Precio:</td>
        <td>SubTot:</td>
        <td>Editar:</td>
        <td>Borrar:</td>
    </tr>

    <?php foreach($tasks as $task): ?>
    <tr>

        <td><?php echo $task['id'] ?></td>
        <td><?php echo $task['nombre'] ?></td>
        <td><?php echo $task['cantidad'] ?></td>
        <td><?php echo $task['precio'] ?></td>
        <?php $subTotal = $task['precio'] *  $task['cantidad'] ?>
        <td style="text-align:right;"><?php echo $subTotal ?></td>

        <td><a href="editRequest.php?id=<?php echo $task['id'] ?>"><ion-icon name="create-outline"></ion-icon></a></td>

        <td><a href="deleteRequest.php?id=<?php echo $task['id'] ?>"><ion-icon name="trash-outline"></ion-icon></a></td>
    </tr>
    <?php $total = $total + $subTotal; ?>
    <?php endforeach; ?>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align:right; font-weight: bold; ">  Total = <?php echo $total; ?> 
            </td>
        </tr>
   </tfoot>
</table>

<?php

if  ( !isset($e_id) ) {
    echo "<t1> Añadir </t1><br>";
} else {
    echo "<t1> Update </t1><br>";
}
?>

<?php
if (!isset($e_id) ): 
?>
<h2>Añadir producto:</h2><br>

<form action="createRequest.php" method = "GET" name="datos">
    <div>
        <label for="nom">Nombre:</label>
        <input type="text" name="nom" value="" placeholder="entra tu nombre...">
    </div>
    <div>
        <label for="cant">Cantidad:</label>
        <input type="text" name="cant" value="" placeholder="cantidad...">
    <div>
        <label for="prec">Precio:</label>
        <input type="text" name="prec" value="" placeholder="valor...">
    </div>
    <div>
        <input type="submit" value="Enviar datos">
    </div>
</form>
<?php
endif
?>

<?php
if (isset($e_id) ): 
?>
regresar a <a href="index.php"> añadir </a>

<h2>Update datos:<?php echo $e_id ?></h2>
<form action="editRequest1.php" method = "GET" name="edit">
    <input type="hidden" name="id" value="<?php echo $e_id ?>">

    <div>
        <label for="nom">Nombre:</label>
        <input type="text" name="nom" value="<?php echo $e_nombre ?>" placeholder="entra tu nombre...">
    </div>
    <div>
        <label for="cant">Cantidad:</label>
        <input type="text" name="cant" value="<?php echo $e_cantidad ?>" placeholder="cantidad...">
    <div>
        <label for="prec">Precio:</label>
        <input type="text" name="prec" value="<?php echo $e_precio ?>" placeholder="valor...">
    </div>
    <div>
        <input type="submit" value="Actualizar datos">
    </div>
</form>
<?php
endif
?>

</body>
</html>


