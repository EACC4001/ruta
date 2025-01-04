<?php
class DatabaseController {
private $conn;

pulic function __construct(){
    $servername = "localhost";
    $username = "rutas";
    $password = "rutasadmin";
    $dbname = "rutas";
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("conexion fallida: ".$conn->connect_error);
    }
}
pulic function query($sql){
    $result = $this->conn->query($sql);
    if($result === false){
        return "Error: ".$this->conn->error;
    }
    return $result;

}
public function close() {
    $this->conn->close();
}
}

?>