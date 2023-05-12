<?php
    session_start();
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once ('../services/connect.php');
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM admin WHERE user = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        // Verifica se o nome de usuário e a senha estão corretos
        if(mysqli_num_rows($result) == 1) {
          $_SESSION['username'] = $username;
          echo "<script>window.location.href='reserves.php'</script>";;
          
      } else {
          echo '<script>alert("Usuário ou senha incorreto");</script>';
      }
    }
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
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
                <img src="../assets/logo.svg" alt="" style="width: 30px">
              <h2 class="fw-bold mb-2 text-uppercase">Jeri Hoteis</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <form action="" method="POST">
              <div class="form-outline form-white mb-4">
                <input type="text" id="user" name="user" class="form-control form-control-lg mb-2" />
                <label class="form-label" for="user">User</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg mb-2" />
                <label class="form-label" for="password">Password</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>