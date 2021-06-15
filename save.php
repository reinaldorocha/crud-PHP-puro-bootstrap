<?php

include('db.php');

if (isset($_POST['save'])) {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $categoria = $_POST['categoria'];
  $query = "INSERT INTO cadastro(nome, telefone, email, cidade, estado, categoria) VALUES ('$nome', '$telefone', '$email', '$cidade', '$estado', '$categoria')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Salvo com sucesso !';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
