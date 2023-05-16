<?php
    session_start();
    // Conexão com o Banco de Dados
    require_once ('../services/connect.php');

    if (!empty($_POST['update'])) {
        // Recebe os dados do formulário
        $id = $_POST['id'];
        $name = $_POST['_name'];
        $rooms = $_POST['rooms'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $phone = $_POST['phone'];
        $value = $_POST['_value'];

        $sql = "UPDATE reservas SET _name='$name', rooms='$rooms', checkin='$checkin', checkout='$checkout', phone='$phone', _value='$value' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        // Verifica se a atualização foi bem sucedida
        if ($result) {
            $_SESSION['alert'] = '<script>alert("Alterado(a) com sucesso!")</script>';
            header('Location: reserves.php');
            exit();
        } else {
            $_SESSION['alert'] = '<script>alert("Ocorreu um erro ao alterar")</script>';
            header('Location: reserves.php');
            exit();
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
?>
