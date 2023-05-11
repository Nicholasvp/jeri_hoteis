<?php
    session_start();
    // conexão com o Banco de Dados
    require_once ('../services/connect.php');

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM reservas WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){

                $id = $user_data['id'];
                $name = $user_data['_name'];
                $rooms = $user_data['rooms'];
                $checkin = $user_data['checkin'];
                $checkout = $user_data['checkout'];
                $phone = $user_data['phone'];
                $value = $user_data['_value'];
        
                
        }
        }
       
    }
    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
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
<form action="update_table.php" method="POST" style="display: flex; gap:12px;" id="myForm">
        <div class="input" style="display: grid">
            <label for="name">Nome</label>
            <input type="text" id="_name" name="_name" placeholder="Insira aqui" value="<?php echo $name ?>">
        </div>
        <div class="input" style="display: grid">
            <label for="number">Quartos</label>
            <input type="number" id="rooms" name="rooms" placeholder="Insira aqui" value="<?php echo $rooms ?>">
        </div>
        <div class="input" style="display: grid">
            <label for="checkin">Check-in</label>
            <input type="date" id="checkin" name="checkin" value="<?php echo $checkin ?>">
        </div>
        <div class="input" style="display: grid">
            <label for="checkout">Check-out</label>
            <input type="date" id="checkout" name="checkout" value="<?php echo $checkout ?>">
        </div>
        <div class="input" style="display: grid">
            <label for="phone">Contato</label>
            <input type="tel" id="phone" name="phone" placeholder="Insira aqui" value="<?php echo $phone ?>">
        </div>
        <div class="input" style="display: grid">
            <label for="value">Valor</label>
            <input type="number" id="_value" name="_value" placeholder="Insira aqui" value="<?php echo $value ?>">
        </div>
        <input type="submit" id="update" name="update" value="Alterar">
        
    </form>
</body>
</html>