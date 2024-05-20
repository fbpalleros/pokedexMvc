<?php

class Database
{

    private $conn;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }

}

//
//// En caso que la barra de busqueda tenga informacion
//$search = isset($_GET['search']) ? $_GET['search'] : '';
//$querySelect = "SELECT * FROM pokemon";
//$query = "";
//
//if (!empty($search)) {
//    $query = $querySelect . " WHERE nombre LIKE '%$search%' OR tipo LIKE '%$search%' OR numero_identificador LIKE '%$search%'";
//}else{
//    $query = $querySelect;
//}
//
//$result = mysqli_query($conn, $query);
//
//$noexiste = mysqli_num_rows($result) == 0;
//
//if ($noexiste){
//    $result = mysqli_query($conn, $querySelect);
//}
//
//
//if (!empty($search) && $noexiste){
//    echo '<div class="alert alert-danger d-flex justify-content-center fw-bold">';
//    echo 'Pokemon no encontrado';
//    echo '</div>';
//}
//

//
//
//
//// No olvides cerrar la conexión cuando termines
//mysqli_close($conn);