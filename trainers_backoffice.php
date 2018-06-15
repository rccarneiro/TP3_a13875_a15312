<?php
require_once "./php/db.php";

    $sql = "SELECT * FROM Treinadores";
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
           <li><a href="users_backoffice.php">Informação de Utilizadores</a></li>
           <li><a href="trainers_backoffice.php">Informação de Treinadores</a></li>
           <li><a href="./jquery_calendar_aulas/index.php">Calendário de Aulas</a></li>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
             <ul class="dropdown-menu">
               <li><a href="indexAdmin.php">Perfil</a></li>
               <li><a href="./php/logout_backoffice.php">Logout</a></li>
             </ul>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <!--tabela users-->
   <div class="container trainers">
      <div class="table-wrapper">
         <div class="table-title">
            <div class="row">
               <div class="col-sm-6">
                  <h2><b>Backoffice Treinadores</b></h2>
               </div>
               <div class="col-sm-6">
                  <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span>Adiconar Treinador</span></a>
               </div>
            </div>
         </div>
         <table class="table table-striped table-hover">
            <thead>
               <tr align="center">
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Contacto</th>
                  <th>Disponibilidade</th>
               </tr>
            </thead>
            <?
            foreach ($rows as $row) {
              /*$subquery = "SELECT * FROM Treinadores WHERE ID=".$row['ID'];
              $subresult = $PDO->query($subquery);
              $query = $subresult->fetch();*/

              $subqueryA = 'SELECT Treinadores.ID as id ,Treinadores.Nome as nome,Treinadores.Contacto, Disponibilidade.Descrição as descricao FROM Treinadores inner join Disponibilidade on Treinadores.Disponibilidade_ID =Disponibilidade.ID  WHERE Treinadores.ID='.$row['ID'];
              $subresultA = $PDO->query($subqueryA);
              $queryA = $subresultA->fetch();

            ?>
            <tbody>
               <tr>
                  <td><?echo $row['ID'];?></td>
                  <td><?echo $row['Nome'];?></td>
                  <td><?echo $row['Contacto'];?></td>
                  <td><?echo $queryA['descricao'];?></td>
                  <td>
                     <a href="./php/formTrainer.php?id=<?=$row['ID'];?>" class="edit" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Editar"></i></a>
                     <a href="./php/deleteTrainer.php?id=<?=$row['ID'];?>" class="delete" data-toggle="modal"><i class="fa fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
                  </td>
               </tr>
            </tbody>
            <?
            }
            ?>
         </table>
   </div>

   <!-- Add Modal HTML -->
   <div id="addUserModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form id="myform" method="POST" action="./php/addTrainer.php" enctype="multipart/form-data">
               <div class="modal-header">
                  <h4 class="modal-title">Adicionar Treinador</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="nome">Nome</label>
                     <input type="text" name="nome" id="nome" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="contacto">Contacto</label>
                     <input type="number" name="contacto" id="contacto" class="form-control" required>
                  </div>
                  <div class="form-group">
      							<label for="disponibilidade">Disponibilidade</label>
                    <div class="inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-list"></i>
                        </span>
                        <select name="disponibilidade" id="disponibilidade" class="form-control selectpicker" required>
                          <option value="">--- Seleciona uma disponibilidade ---</option>
                          <?php
                          $subqueryDisponibilidade = "SELECT * FROM Disponibilidade";
                          $subresultDisponibilidade = $PDO->query($subqueryDisponibilidade);
                          $queryDisponibilidade = $subresultDisponibilidade->fetchAll();

                          foreach ($queryDisponibilidade as $row){?>
                            <option value="<?=$row['ID'];?>"><? echo $row['Descrição'];?></option>
                          <?
                          }
                          ?>
                        </select>
      						    </div>
                    </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                  <input type="submit" class="btn btn-success" value="Adicionar Treinador">
               </div>
            </form>
         </div>
      </div>
   </div>

<script type="text/javascript" src="./bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="./js/script.js"></script>-->
