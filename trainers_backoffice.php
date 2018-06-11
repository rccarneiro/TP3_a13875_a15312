<?php
require_once "./php/db.php";

    $sql = "SELECT * FROM Treinadores";
    $result = $PDO->query($sql);
    $rows = $result->fetchAll();

    $id = $_REQUEST['ID'];
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
           <li><a href="./jquery-fullcalendar-Admin/index.php">Calendário de Aulas</a></li>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bem vindo, Admin!</a>
             <ul class="dropdown-menu">
               <li><a href="#">Perfil</a></li>
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
                  <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Novo User</span></a>
                  <!--<a href="#" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar</span></a>-->
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
                  <th>Nome</th>
                  <th>Contacto</th>
                  <th>Disponibilidade</th>
               </tr>
            </thead>
            <?
            foreach ($rows as $row) {
              $subquery = "SELECT * FROM Treinadores WHERE ID=".$row['ID'];
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
                  <td><?echo $row['Nome'];?></td>
                  <td><?echo $row['Contacto'];?></td>
                  <td><?echo $row['Disponibilidade'];?></td>
                  <td>
                     <a href="#editUserModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                     <a href="delete.php?id=<?=$row['ID'];?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                  </td>
               </tr>
            </tbody>
            <?
            }
            ?>
         </table>

         <caption>Legenda: <span><i class="fa fa-user-circle fa-active"></i></span><label class="label-caption">Ativo</label><span><i class="fa fa-user-circle fa-inactive"></i></span><label class="label-caption">Inativo</label><span><i class="fa fa-user-circle fa-suspended"></i></span><label class="label-caption">Suspenso</label></caption>

         <!--<div class="clearfix">
            <div class="hint-text">Showing <b><?echo $row?></b> out of <b>25</b> entries</div>
            <ul class="pagination">
               <li class="page-item disabled"><a href="#">Anterior</a></li>
               <li class="page-item"><a href="#" class="page-link">1</a></li>
               <li class="page-item"><a href="#" class="page-link">2</a></li>
               <li class="page-item active"><a href="#" class="page-link">3</a></li>
               <li class="page-item"><a href="#" class="page-link">4</a></li>
               <li class="page-item"><a href="#" class="page-link">5</a></li>
               <li class="page-item"><a href="#" class="page-link">Seguinte</a></li>
            </ul>
         </div>
      </div>-->
   </div>

   <!-- Add Modal HTML -->
   <div id="addUserModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form id="myform" method="POST" action="insert.php" enctype="multipart/form-data">
               <div class="modal-header">
                  <h4 class="modal-title">Adicionar User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="name">Nome</label>
                     <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="form-group">
      							<label for="role">Role</label>
                    <div class="inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-list"></i>
                        </span>
                        <select name="role" id="role" class="form-control selectpicker" required>
                          <option value="">--- Seleciona o teu role ---</option>
                          <?php
                          $subqueryRoles = "SELECT * FROM Roles";
                          $subresultRoles = $PDO->query($subqueryRoles);
                          $queryRole = $subresultRoles->fetchAll();

                          foreach ($queryRole as $row){?>
                            <option value="<?=$row['ID'];?>"><? echo $row['Nome'];?></option>
                          <?
                          }
                          ?>
                          <!--<option value="Admin">Admin</option>
                          <option value="Publisher">Publisher</option>
                          <option value="Reviewer">Reviewer</option>
                          <option value="Moderator">Moderator</option>-->
                        </select>
      						    </div>
                    </div>
                  </div>

                  <div class="form-group" required>
                    <label for="status">Status</label>
                    <div class="radio">
                      <label >
                        <?php
                        $subqueryStatus = "SELECT * FROM Status";
                        $subresultStatus = $PDO->query($subqueryStatus);
                        $queryStatus = $subresultStatus->fetchAll();

                        foreach ($queryStatus as $row){?>
                          <input type="radio" name="status" id="status" value="<?=$row['ID'];?>" required /><?echo $row['Nome']?><br><?;}?>
                      </label>
                    </div>
      						</div>

                  <div class="form-group">
                    <label for="uploaded_file">Foto</label>
                    <input type="file" name="uploaded_file" accept="image/*" required></input>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                  <input type="submit" class="btn btn-success" value="Adicionar User">
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- Edit Modal HTML -->
   <div id="editUserModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form action="update.php?id=<?=$_row['ID'];?>" enctype="multipart/form-data" method="post">
               <div class="modal-header">
                  <h4 class="modal-title">Editar User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="name">Nome</label>
                     <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="name">Email</label>
                     <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="form-group">
      							<label for="name">Role</label>
                    <div class="inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-list"></i>
                        </span>
                        <select name="role" id="role" class="form-control selectpicker" required>
                          <option value="">--- Please select your role ---</option>
                          <option value="Admin">Admin</option>
                          <option value="Publisher">Publisher</option>
                          <option value="Reviewer">Reviewer</option>
                          <option value="Moderator">Moderator</option>
                        </select>
      						    </div>
                    </div>
                  </div>

                  <div class="form-group" required>
                    <label for="name">Status</label>
                    <div class="radio">
                      <label >
                        <input type="radio" name="status" id="status" value="Active" required /> Activo
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="status" value="Inactive" /> Inactivo
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="status" value="Suspended" /> Suspenso
                      </label>
                    </div>
      						</div>

                  <div class="form-group">
                    <label for="name">Foto</label>
                    <input type="file" name="uploaded_file" accept="image/*" required></input>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-info" value="Save">
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Delete Modal HTML -->


<script type="text/javascript" src="./bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="./js/script.js"></script>-->
