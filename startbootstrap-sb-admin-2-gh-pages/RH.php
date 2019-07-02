<!DOCTYPE html>
<html lang="pt-br">

<head>

  <?php
  include('connection.php');
  session_start();
  if(!isset($_SESSION['user'])){
    var_dump($_SESSION);
    //header('location:login.php');
  }
  $user = $_SESSION['user'];
   ?>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RH</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <style type="text/css">
    .container-logo {
      width: 45px;
    }

    .logomarca {
      width: 45px;
    }
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow navbar-inverse">
          <a class="container-logo container-fluid" href="home.php"><img src="img/engbranco.png"
              class="logomarca"></a>
          <!-- Topbar Navbar -->
          <div class="container-fluid">
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter">
                    <?php
                    $query = 'select count(*) as cont from reclamacao where id_reclamado ='.$user['id_usuario']." AND YEAR(dia_ocorrido) >= ".date('Y');
                    $result = mysqli_query($con, $query);
                    if($result != null){
                      while ($row = mysqli_fetch_array($result)) {
                        echo $row['cont'];
                      }
                    }
                     ?>
                     +</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Notificação
                  </h6>
                  <?php
                $query = "select id_reclamado, tipo, DAY(dia_ocorrido) as dia, MONTH(dia_ocorrido) as mes, YEAR(dia_ocorrido) as ano from reclamacao where id_reclamado =".$user['id_usuario']." AND YEAR(dia_ocorrido) >= ".date('Y');
                $result = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_array($result)) {
                    $mes = "";
                		switch($row['mes']){
                			case"1":  $mes = "Janeiro";     break;
                			case"2":  $mes = "Fevereiro"; 	break;
                			case"3":  $mes = "Março";   	break;
                			case"4":  $mes = "Abril"; 	 	break;
                			case"5":  $mes = "Maio";  		break;
                			case"6":  $mes = "Junho";   	break;
                			case"7":  $mes = "Julho";       break;
                			case"8":  $mes = "Agosto";      break;
                			case"9":  $mes = "Setembro"; 	break;
                			case"10": $mes = "Outubro"; 	break;
                			case"11": $mes = "Novembro";   	break;
                			case"12": $mes = "Dezembro";  	break;
                    }


                    echo '<a class="dropdown-item d-flex align-items-center" href="#">';
                      echo '<div class="mr-3">';
                        echo '<div class="icon-circle bg-primary">';
                          echo '<i class="fas fa-file-alt text-white"></i>';
                        echo '</div>';
                      echo '</div>';
                      echo '<div>';
                        echo '<div class="small text-gray-500">'.$row['dia'].' de '.$mes.', '.$row['ano'].'   </div>';
                        echo '<span class="font-weight-bold">'.$row['tipo'].'</span>';
                      echo '</div>';
                    echo '</a>';
                  }
                   ?>

                </div>
              </li>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-white small">
                    <?php
                        echo "<span class="."mr-2 d-none d-lg-inline text-white small>".$user['nome']."</span>";
                    ?>
                  </span>
                  <img class="img-profile rounded-circle" src="img/atari.png" width="40px">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="mudar.php">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Mudar senha
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sair
                  </a>
                </div>
              </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Escalonamento dos Membros</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Cargo</th>
                      <th>Núcleo</th>
                      <th>Horas Semanais</th>
                      <th>Denúncias</th>
                      <th>Advertências</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $query = "SELECT u.id_usuario, u.nome, u.cargo, u.nucleo, u.cpf, COUNT(d.denunciado) AS denuncias FROM usuario u JOIN denuncia d ON(u.id_usuario = d.denunciado) GROUP BY u.id_usuario union all SELECT u.id_usuario, u.nome, u.cargo, u.nucleo, u.cpf, 0 AS denuncias FROM usuario u JOIN denuncia d WHERE u.id_usuario NOT IN (SELECT denunciado FROM denuncia) GROUP BY u.id_usuario";
                      $result = mysqli_query($con, $query);

                      while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                          echo '<form method="post" action="reclamacao.php">';
                            echo "<td>".$row['nome']."</td>";
                            echo "<td>".$row['cargo']."</td>";
                            echo "<td>".$row['nucleo']."</td>";
                            echo "<td>".$row['cpf']."</td>";
                            echo "<td>".$row['denuncias']."</td>";
                            echo "<td>";
                              echo '<select name="opcao">';
                                echo '<option value=""></option>';
                                echo '<option value="Falta">Falta</option>';
                                echo '<option value="Horario">Poucas horas</option>';
                                echo '';
                              echo '</select>';
                              echo '&nbsp&nbsp&nbsp<input type="date" placeholder="Data" required="" name="date" value="'.date('Y-m-d').'">';
                              echo '&nbsp&nbsp&nbsp<input type="submit" value="Enviar"/>';
                              echo '<input type="hidden" name="id" value="'.$row['id_usuario'].'">';
                            echo "</form>";
                          echo "</td>";
                        echo "</tr>";
                      }
                       ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Desafio Trainee 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione sair para ficar offline</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="http://www.cimatecjr.com.br/">Sair</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
