<?php

  require_once ("../docs/db.php");

  session_start();

  if(((!isset ($_SESSION['email'])) || (($_SESSION['email']) != 'admin@admin.com')))
  {
	  header('location: ../index.html');
  }
  else
  {

    if (isset($_POST)){

          $sql = "UPDATE produto SET imagem = ?, referenciaProd = ?, nomeProd = ?, descricaoProd = ?, categoriaProd = ?, quantStock = ?, precoProd = ? WHERE idProd = ?";
          $stmt = $PDO->prepare($sql);


          if(!empty($_FILES['uploaded_file'])){
            $path = "../docs/img/produtos/";
            $path = $path . basename( $_FILES['uploaded_file']['name']);
            $imagem = basename( $_FILES['uploaded_file']['name']);
          }

          if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))

          $stmt->bindParam(1, $imagem);
          $stmt->bindParam(2, $_POST['referencia']);
          $stmt->bindParam(3, $_POST['nome']);
          $stmt->bindParam(4, $_POST['descricao']);
          $stmt->bindParam(5, $_POST['categoria']);
          $stmt->bindParam(6, $_POST['quantidade']);
          $stmt->bindParam(7, $_POST['preco']);
          $stmt->bindParam(8, $_POST['armazem']);
      }

      $result = $stmt->execute();

      if (!$result){
        var_dump($stmt->errorInfo());
        exit;
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    }

?>
  <div class="message">
    <? echo $stmt->rowCount() . " produto actualizado com sucesso!"; ?>
  </div>

  <?
    include 'selectProduto.php';
  ?>
