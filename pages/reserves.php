<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
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

    echo '<h1 class="m-5">Bem-vindo!</h1>
    <table class="table m-5 w-75">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quartos</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Telefone</th>
                <th>Valor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>';
    
    // Dados da Tabela
    while ($row = mysqli_fetch_assoc($result)) {
        echo"
        <tr>
            <td id='id'>" . $row['id'] ."</td>
            <td id='_name'>" . $row['_name'] ."</td>
            <td id='rooms'>" . $row['rooms'] . "</td>
            <td id='checkin'>" . $row['checkin'] . "</td>
            <td id='checkout'>" . $row['checkout'] . "</td>
            <td id='phone'>" . $row['phone'] . "</td>
            <td id='_value'>" . $row['_value'] . "</td>
            <td>
                <a class='p-2' href='edit.php?id={$row['id']}'><img src='../assets/pencil.svg'></a>
                <a class='p-2' href='remove.php?id={$row['id']}'><img src='../assets/trash.svg'></a>
            </td>
        </tr>";
    }

    echo '</tbody></table>';

    
    
    
?>
<body>
    <form class="p-5" action="insert_table.php" method="POST" style="display: flex; gap:12px;" id="myForm">
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
        <a class="btn btn-primary" id="logout" href="log_out.php">Log out</a>
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