<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Senha</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <style>
    .erromudar {
      color: red;
      font-weight: bold;
    }

    .img-fluid {
      position: relative;
      left: 100px;
      top: 80px;
      height: 300px;
    }

    .h4 {
      font-weight: bold;
    }

    .card {
      border-radius: 70px;
    }
  </style>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="img/logo.png" class="img-fluid" alt="Responsive image">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Deseja mudar sua senha?</h1>
                  </div>
                  <form id="user" class="user" action="newpass.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Senha antiga" name="pass">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Nova senha" name="newPass">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Confirme a nova senha" name="newPass2">
                    </div>
                    <input type="submit" form="user" class="btn btn-primary btn-user btn-block" name="submit" value="Mudar"/>

                  </form>

                  <?php
                      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                      if(strpos($fullUrl, "error=oldpass") == true){
                        echo "<p class='erromudar' >Senha antiga esta errada</p>";
                      }
                      else if(strpos($fullUrl, "error=emptyinput") == true){
                        echo "<p class='erromudar' >Algum campo estava vazio</p>";
                      }
                      else if(strpos($fullUrl, "error=difnewpass") == true){
                        echo "<p class='erromudar' >Senhas novas estavam diferentes</p>";
                      }
                      else if(strpos($fullUrl, "error=errorconnection") == true){
                        echo "<p class='erromudar' >Erro ao conectar ao banco</p>";
                      }

                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
