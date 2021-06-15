<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root', //usuario do banco
  '',  //senha do banco
  'crud_php'  //nome do banco
) or die(mysqli_erro($mysqli));

?>
