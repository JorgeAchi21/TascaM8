<?php
require_once 'dbAccess.php';

class Task {
    //========================================================================================================
    //====================================================Listar todos reg
    function list(){

    $connection = new Connection;
    $mysql = $connection->create();
    
    $sql = "SELECT * FROM compra;";
    /*
    echo "<br>";
    echo $sql;
    echo "<br>";
    */

    $result = $mysql->query($sql);

    $tasks = $result->fetch_all(MYSQLI_ASSOC);

    //Cerrar conexion
    $connection->close($mysql);

    return $tasks;
    }

    //========================================================================================================
    //====================================================Crear reg/añadir reg
    function create($request){

    $connection = new Connection;

    $mysql = $connection->create();
    $sql = "INSERT INTO compra (nombre, cantidad, precio) VALUES ('{$request['nombre']}', {$request['cantidad']} , {$request['precio']} );";
    /*
    echo "<br>";
    echo $sql;
    echo "<br>";
    */

    $result = $mysql->query($sql);
    if ($result === TRUE) {

        echo "Registro insertado correctamente.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close($mysql);

    return $result;
    
    }

    //========================================================================================================
    //====================================================Mostrar 1 reg x update
    function show($id){

        $connection = new Connection;

        $mysql = $connection->create();

        $sqlE = "SELECT * FROM compra WHERE id = {$id};";
        /*
        echo "<br>";
        echo $sqlE;
        echo "<br>";
        */

        $result = $mysql->query($sqlE);

        $tasksR = $result->fetch_all(MYSQLI_ASSOC);
        /*
        echo "<br>retorno...";
        var_dump($tasksR);
        */
        
        $connection->close($mysql);

        return $tasksR;
    }

    //========================================================================================================
    //====================================================Actualizar 1 reg con id
    function update($request){

        $connection = new Connection;
        $mysql = $connection->create();
    
        $sql = "UPDATE compra SET nombre ='{$request['nombre']}', cantidad={$request['cantidad']}, precio={$request['precio']} WHERE id = {$request['id']};";
        /*
        echo "<br>";
        echo $sql;
        echo "<br>";
        */
        $result = $mysql->query($sql);
    
        if ($result === TRUE) {
            echo "<br>Registro actualizado correctamente.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close($mysql);

        return $result;

    }

    //========================================================================================================
    //====================================================Borrar 1 reg x id
    function delete($id){

        $connection = new Connection;

        $mysql = $connection->create();

        $sql = "DELETE FROM compra WHERE id =  $id ";
        /*
        echo "<br>";
        echo $sql;
        echo "<br>";
        */

        $result = $mysql->query($sql);
        if ($result === TRUE) {
    
            echo "Registro eliminado correctamente.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close($mysql);
    
        return $result;
    }
}

?>