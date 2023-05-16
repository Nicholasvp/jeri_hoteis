<?php
    session_start();
    // conexão com o Banco de Dados
    require_once ('../services/connect.php');
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM reservas WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $sqlRemove = "DELETE FROM reservas WHERE id=$id";
            $resultRemove = mysqli_query($conn, $sqlRemove);
        }       
    }
    header('Location: reserves.php')
?>