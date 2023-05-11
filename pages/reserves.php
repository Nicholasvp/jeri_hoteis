<?php
    // Inicia a sessão
    session_start();

    // Verifica se o usuário está autenticado
    if (!isset($_SESSION['username'])) {
        // Redireciona o usuário para a página de login
        header('Location: index.php');
        exit;
    }
    

    // conexão com o Banco de Dados
    require_once ('../services/connect.php');

    // selecionar a tabela
    $sql = "SELECT * FROM reservas";
    $result = mysqli_query($conn, $sql);

    echo '<h1>Bem-vindo!</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quartos</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Telefone</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>';
    
    // Dados da Tabela
    while ($row = mysqli_fetch_assoc($result)) {
        echo"
        <tr>
            <td id='_name'>" . $row['id'] ."</td>
            <td id='_name'>" . $row['_name'] ."</td>
            <td id='rooms'>" . $row['rooms'] . "</td>
            <td id='checkin'>" . $row['checkin'] . "</td>
            <td id='checkout'>" . $row['checkout'] . "</td>
            <td id='phone'>" . $row['phone'] . "</td>
            <td id='_value'>" . $row['_value'] . "</td>
            <td id='_value'>" . $row['_value'] . "</td>
            <td>
                <a href='edit.php?id={$row['id']}'><img src='../assets/pencil.svg'></a>
            </td>
        </tr>";
    }

    echo '</tbody></table>';

    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert_table.php" method="POST" style="display: flex; gap:12px;" id="myForm">
        <div class="input" style="display: grid">
            <label for="name">Nome</label>
            <input type="text" id="_name" name="_name" placeholder="Insira aqui">
        </div>
        <div class="input" style="display: grid">
            <label for="number">Quartos</label>
            <input type="number" id="rooms" name="rooms" placeholder="Insira aqui">
        </div>
        <div class="input" style="display: grid">
            <label for="checkin">Check-in</label>
            <input type="date" id="checkin" name="checkin">
        </div>
        <div class="input" style="display: grid">
            <label for="checkout">Check-out</label>
            <input type="date" id="checkout" name="checkout">
        </div>
        <div class="input" style="display: grid">
            <label for="phone">Contato</label>
            <input type="tel" id="phone" name="phone" placeholder="Insira aqui">
        </div>
        <div class="input" style="display: grid">
            <label for="value">Valor</label>
            <input type="number" id="_value" name="_value" placeholder="Insira aqui">
        </div>
        <input type="submit" value="Adicionar">
        <a href="log_out.php">Log out</a>
    </form>
    
    
</body>
</html>





<?php
// Chamar Alerta
    if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
?>