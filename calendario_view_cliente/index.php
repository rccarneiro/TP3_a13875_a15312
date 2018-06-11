<?php
session_start();
include("database.php");
if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = session_id();
}
$uid = $_SESSION['user'];  // set your user id settings
$datetime_string = date('c',time());

if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection,$_GET["start"]);
        $end = mysqli_real_escape_string($connection,$_GET["end"]);

        $result = mysqli_query($connection,"SELECT `id`, `start` ,`end` ,`title` FROM  `events` where (date(start) >= '$start' AND date(start) <= '$end') and uid='".$uid."'");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row;
        }
        echo json_encode($events);
        exit;
    }
}

?>

<meta charset="utf-8">
<link rel="icon" href="../img/gymLogo.jpg">
<title>Gym Star</title>
<link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/scrolltop.css">
<link rel="stylesheet" href="../css/Footer-with-map.css">

<link href="./css/fullcalendar.css" rel="stylesheet" />
<link href="./css/fullcalendar.print.css" rel="stylesheet" media="print" />

<body>
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
          <img class="logo" src="../img/gymLogo.jpg" alt="Brand Logo">
        </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="../index.html">Home</a></li>
          <li><a href="../about.html">Sobre</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atividades<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../calendario_view_cliente/index.php">Calendário de atividades</a></li>
              <li><a href="../gallery.html">Galeria</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Serviços<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Personal Training</a></li>
              <li><a href="#">Máquinas</a></li>
              <li><a onclick="window.open('https://www.enetural.com/pt/artigos/planos-alimentares_102/')">Planos Alimentares</a></li>
              <li><a href="../trainPlan.html">Planos de treino</a></li>
            </ul>
          </li>
          <li><a href="../members.html">Membros</a></li>
        </ul>
      </div>
    </div>
  </nav>

<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- add calander in this div -->
<div class="container calendario">
  <div class="row">
<div class="espaço" id="calendar"></div>


</div>
</div>


<!-- Modal -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Event Details</h4>
        </div>
        <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
        </div>
        <input type="hidden" id="eventID"/>
        <div class="modal-footer">
            <button class="btn" aria-hidden="true">Inscriver</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
        </div>
    </div>
</div>
</div>
<!--Modal-->


<div style='margin-left: auto;margin-right: auto;text-align: center;'>
</div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="./js/script_.js"></script>

<script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/scrolltop.js"></script>
<script src="./js/moment.min.js"></script>
<script src="./js/fullcalendar.js"></script>
  </body>
</html>
