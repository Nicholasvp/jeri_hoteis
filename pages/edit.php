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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<form class="m-5"action="update_table.php" method="POST" style="display: flex; gap:12px;" id="myForm">
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
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" id="update" name="update" value="Alterar">
        
    </form>
</body>
</html>