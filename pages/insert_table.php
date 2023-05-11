<?php
    session_start();
    // conexão com o Banco de Dados
    require_once ('../services/connect.php');

    // Recebe os dados do formulário
    $id = $_POST['id'];
    $name = $_POST['_name'];
    $rooms = $_POST['rooms'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $phone = $_POST['phone'];
    $value = $_POST['_value'];

    // Obtem o valor do ID
    $sql = "SELECT COUNT(*) as count FROM reservas";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $id = $data['count'] + 1;

    // Insere os dados na tabela
    $sql = "INSERT INTO reservas (id, _name, rooms, checkin, checkout, phone, _value) VALUES ('$id', '$name', '$rooms', '$checkin', '$checkout', '$phone', '$value')";
    $result = mysqli_query($conn, $sql);

    // Verifica se a inserção foi bem sucedida
    if ($result) {
        $_SESSION['alert'] = '<script>alert("Inserido(a) com suceso!")</script>';
        header('Location: reserves.php');
    } else {
        $_SESSION['alert'] = '<script>alert("Ocorreu um erro aoinserir na tabela.")</script>';
        header('Location: reserves.php');
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
?>
