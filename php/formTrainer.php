<?php

  require_once ("db.php");

  session_start();


  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM Treinadores WHERE ID = ".$id;
	$result = $PDO->query($sql);
	$rows = $result->fetch();

 ?>

 <html>
   <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
     <link rel="icon" href="../img/gymLogo.jpg">
     <title>Gym Star</title>

     <link rel="stylesheet" href="../docs/css/bootstrap.min.css" />
     <link rel="stylesheet" href="../docs/css/style.css" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>

   <body>
     <div class="container">
       <div class="table-wrapper">
         <div class="table-title">
           <div class="row">
             <div class="col-sm-6">
               <h2>Backoffice Treinadores</h2>
             </div>
           </div>
         </div>
         <form id="myform" method="POST" action="editTrainer.php" enctype="multipart/form-data">
            <div class="modal-header">
              <input name="id" type="hidden" value="<?= $rows['ID'] ?>"> 
               <h4 class="modal-title">Editar Treinador</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="nome">Nome de Treinador</label>
                  <input type="text" name="nome" id="nome" value="<?= $rows['Nome'] ?>" class="form-control" required>
               </div>
               <div class="form-group">
                  <label for="contacto">Contacto</label>
                  <input type="number" name="contacto" id="contacto" value="<?= $rows['Contacto'] ?>" class="form-control" required>
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
               <input input type="button" onclick="window.open('../trainers_backoffice.php')" class="btn btn-default"  value="Cancelar"></input>
               <input type="submit" class="btn btn-success" value="Editar">
            </div>
         </form>



  <script src="../docs/js/jquery-3.2.1.min.js"></script>
  <script src="../docs/js/bootstrap.min.js"></script>
  <script src="../docs/js/script.js"></script>

  </body>
</html>
