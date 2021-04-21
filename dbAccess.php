<?php
class Connection{
    private $host;
    private $user;
    private $pass;
    private $bbdd;

    function __construct(){
        $this-> host = '192.168.1.12';
        $this-> user = 'phpUser';
        $this-> pass = '12345';
        $this-> bbdd = 'M8POO';
    }

    function create(){
        $connection = new mysqli ( $this->host, $this->user, $this->pass, $this->bbdd);
        return $connection;
    }

    function close($connection){
        $connection->close();
    }
}


$conn = new Connection();
if ($conn -> create()) {
    //echo 'Conexion bbdd ok <br>';
} else {
    echo 'Problemas conexion bbdd <br>';

    $err_desc = 'Error: ' . $conn->connect_error ;
    $err_desc = $err_desc . "-" .mysql_errno() ;

    echo "<br>Error sql: ". $err_desc."<br>";
}

?>