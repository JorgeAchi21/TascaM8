<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <title>GESTOR DE PRODUCTOS</title>
  </head>

  <body>
  <?php 
    //-----------Lectura de todos los datos
    require_once 'tareas.php';
    $task = new Task;

    $tasks = $task -> list();
    
    /*
    echo "Datos pasados: ";
    var_dump($tasks);
    echo '<br>';
    */
  ?>

<?php 
    //-----------Editar registro
    if (isset($_GET['id'])){
        //echo "Si existen datos update.<br>";

        $id = $_GET['id'];
        //echo "id: ". $id;

        $task1 = new Task;

        $tasksE = $task1 -> show($id);
        /*
        foreach($tasks1 as $i){
            $e_id= $task1['id'];
            $e_nombre = $task1['nom'];
            $e_cantidad = $task1['quantitat'];
            $e_precio = $task1['preu'];
        }
        
        echo '<br>Datos edicion taskE: ';
        var_dump ($tasksE);
        */

        $e_id = $tasksE[0]['id'];
        $e_nombre = $tasksE[0]['nombre'];
        $e_cantidad = $tasksE[0]['cantidad'];
        $e_precio = $tasksE[0]['precio'];
        
        //echo $e_nombre . "<br>";
   
    } else {
        // solo mostrar datos
        // echo "sin datos update.<br>";
    } 

?>
  <h1 class="display-4">INFORMACION DE PRODUCTOS:</h1>

  <div class="container mt-5">
    <div class="row">
        <div class="col-md-8">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom. Producto:</th>
                  <th scope="col">Cantidad:</th>
                  <th scope="col">Precio:</th>
                  <th scope="col">SubTotal:</th>
                  <th scope="col">#</th>
                  <th scope="col">#</th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0; ?>
                <?php foreach($tasks as $task): ?>
                <tr>
                  <th scope="row"> <?php echo $task['id'] ?> </th>
                  <td> <?php echo $task['nombre'] ?> </td>
                  <td> <?php echo $task['cantidad'] ?> </td>
                  <td> <?php echo $task['precio'] ?> </td>
                  <?php $subTotal = $task['precio'] *  $task['cantidad'] ?>
                  <td> <?php echo $subTotal ?> </td>
                  <td> <a href="editRequest.php?id=<?php echo $task['id'] ?>"><ion-icon name="create-outline"></ion-icon></a> </td>
                  <td> <a href="deleteRequest.php?id=<?php echo $task['id'] ?>"><ion-icon name="trash-outline"></ion-icon></a> </td>
                </tr>
                <?php $total = $total + $subTotal; ?>
                <?php endforeach; ?>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right; font-weight: bold; ">  
                      <h3><span class="badge badge-primary"> Total =  <?php echo $total; ?> </span> </h3>
                    </td>
                  </tr>
                </tfoot>
              </tbody>
            </table>
        </div>
        <div class="col-md-4">

        <?php
        if (!isset($e_id) ): 
        ?>
        <div class="alert alert-secondary" role="alert"> Añadir producto: </div>
        
        <form action="createRequest.php" method="GET" name="datos">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre del producto...">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" max="100" placeholder="cantidad...">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" min="1" max="100" step="0.01" placeholder="precio unitario...">
            </div>
            <button type="submit" class="btn btn-primary">Añadir...</button>
          </form>

          <?php
          endif
          ?>
        
          <?php
          if (isset($e_id) ): 
          ?>
          <div class="alert alert-secondary" role="alert"> Editar producto: <?php echo $e_id ?> </div>

          <form action="editRequest1.php" method="GET" name="edit">
              <input type="hidden" name="id" value="<?php echo $e_id ?>">
              <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $e_nombre ?>" placeholder="nombre del producto...">
              </div>
              <div class="form-group">
                  <label for="cantidad">Cantidad:</label>
                  <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" max="100" value="<?php echo $e_cantidad ?>" placeholder="cantidad...">
              </div>
              <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="number" class="form-control" id="precio" name="precio" min="1" max="100" step="0.01" value="<?php echo $e_precio ?>" placeholder="precio unitario...">
              </div>
              <button type="submit" class="btn btn-primary">Modificar...</button>
              <br>
              <div>regresar a <a href="index.php"> añadir registro</a></div>
              
            </form>
            <?php
            endif
            ?>

        </div>
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>