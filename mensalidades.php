<?php
require_once './php/db.php';

session_start();
$id = $_REQUEST['ID'];

$sql = "SELECT * FROM Mensalidades WHERE User_ID=".$id;
$result = $PDO->query($sql);
$rows = $result->fetchAll();
?>


<link rel="icon" href="./img/gymLogo.jpg">
<title>Gym Star</title>
<link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/backoffice.css">
<link rel="stylesheet" href="./css/login_form.css">
<link rel="stylesheet" href="./css/scrolltop.css">
<link rel="stylesheet" href="./css/Footer-with-map.css">

<!--begin: navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top nav1">
  <div class="row navrow">
    <div class="col-md-4">
      <i class="fa fa-mobile" aria-hidden="true"> 914477527 </i>
    </div>
    <div class="col-md-4">
      <i class="fa fa-envelope-o" aria-hidden="true"> gymstar@gmail.com </i>
    </div>
    <div class="col-md-4">
      <i class="fa fa-map-marker" aria-hidden="true"> Avenida António Gomes Pereira, Tebosa </i>
    </div>
  </div>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img class="logo" src="./img/gymLogo.jpg" alt="Brand Logo">
      </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">Sobre</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atividades<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./calendario_view_cliente/index.php">Calendário de atividades</a></li>
            <li><a href="gallery.html">Galeria</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Serviços<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Personal Training</a></li>
            <li><a href="#">Máquinas</a></li>
            <li><a onclick="window.open('https://www.enetural.com/pt/artigos/planos-alimentares_102/')">Planos Alimentares</a></li>
            <li><a href="trainPlan.html">Planos de treino</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?echo $_SESSION['nome'];?></a>
          <ul class="dropdown-menu">
            <li><a href="user_profile.php">Perfil</a></li>
            <li><a href="mensalidades.php">Mensalidades</a></li>
            <li><a href="./calendario_view_user">Inscrição Aulas</a></li>
            <li><a href="./php/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--end: navbar-->
<!--scroll up button-->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<!--begin: page-content-->
<div class="container users">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2><b>Mensalidades</b></h2>
            </div>
         </div>
      </div>
      <table class="table table-striped table-hover">
         <thead>
            <tr align="center">
               <th>
                  <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label>
                  </span>
               </th>
               <th>ID</th>
               <th>Descrição</th>
               <th>Data Limite Pagamento</th>
               <th>Valor</th>
               <th>Status</th>
               <th>ID User</th>
            </tr>
         </thead>
         <?

         foreach ($rows as $row) {
           $subquery = 'SELECT * FROM Mensalidades WHERE User_ID="'.$id.'"'; //tirar duvidas
           $subresult = $PDO->query($subquery);
           $query = $subresult->fetch();
         ?>

         <tbody>
            <tr>
               <td>
                  <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                  </span>
               </td>
               <td><?echo $row['ID'];?></td>
               <td><?echo $row['Descrição'];?></td>
               <td><?echo $row['Data'];?></td>
               <td><?echo $row['Valor'];?> €</td>
               <td><?echo $row['Status'];?></td>
               <td><?echo $row['User_ID'];?></td>
            </tr>
         </tbody>
         <?
         }
         ?>
      </table>
</div>
</div>
<!--end: page-content-->
<section>
  <footer id="myFooter">
      <div class="container">
          <div class="row">
              <div class="col-sm-3">
                  <h5>Get started</h5>
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Inscrição</a></li>
                  </ul>
              </div>
              <div class="col-sm-3">
                  <h5>Sobre nós</h5>
                  <ul>
                      <li><a href="#">Sobre</a></li>
                      <li><a href="#">Calendário de atividades</a></li>
                      <li><a href="#">Galeria</a></li>
                  </ul>
              </div>
              <div class="col-sm-3">
                  <h5>Legal</h5>
                  <ul>
                      <li><a href="#">Termos de serviço</a></li>
                      <li><a href="#">Termos de uso</a></li>
                      <li><a href="#">Política de Privacidade</a></li>
                      <li><a href="login_backoffice.html">Zona de Administrador</a></li>
                  </ul>
              </div>
          </div>
          <!-- Here we use the Google Embed API to show Google Maps. -->
          <!-- In order for this to work in your project you will need to generate a unique API key.  -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11957.136624516745!2d-8.4835555!3d41.4764389!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xacf0f471fa4d7de4!2sGym+Star!5e0!3m2!1spt-PT!2spt!4v1515170836206" width="100%" height="240" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="social-networks">
          <a onclick="window.open('https://www.instagram.com/gymstarteam/')" class="instagram"><i class="fa fa-instagram"></i></a>
          <a onclick="window.open('https://www.facebook.com/Gym-Star-1556629417711206/')" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>

      </div>
      <div class="footer-copyright">
          <p>© 2017-2018 All rights reserved to Gym Star </p>
      </div>
  </footer>
</section>

<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script src="js/scrolltop.js"></script>
<script type="text/javascript" src="./js/Form.js"></script>
<script type="text/javascript" src="./js/login_form.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
