<?php
    session_start();
 // Altera os dados na tabela
    require_once('../services/connect.php');

    if(isset($_POST['update']))
    {
        // Recebe os dados do formulário
        $id = $_POST['id'];
        $name = $_POST['_name'];
        $rooms = $_POST['rooms'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $phone = $_POST['phone'];
        $value = $_POST['_value'];

        $sql = "UPDATE `reservas` SET `_name`='$name',`rooms`='$rooms',`checkin`='$checkin',`checkout`='$checkout',`phone`='$phone',`_value`='$value' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        // Verifica se a inserção foi bem sucedida
        if ($result) {
            $_SESSION['alert'] = '<script>alert("Alterado(a) com suceso!")</script>';
            header('Location: reserves.php');
            } else {
                $_SESSION['alert'] = '<script>alert("Ocorreu um erro ao alterar")</script>';
                header('Location: reserves.php');
            }
    }

?>