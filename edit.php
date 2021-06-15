<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM cadastro WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nome = $row['nome'];
    $telefone = $row['telefone'];
    $email = $row['email'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
    $categoria = $row['categoria'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nome= $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $categoria = $_POST['categoria'];

  $query = "UPDATE cadastro set nome = '$nome', telefone = '$telefone', email = '$email', cidade = '$cidade', estado = '$estado', categoria = '$categoria' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Cadastro Atualizado !';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <h5>Atualizar Cadastro:</h5>
        <div class="form-group">
          Nome:
          <input name="nome" type="text" class="form-control" value="<?php echo $nome; ?>" placeholder="Update nome">
        </div>

        <div class="form-group">
          Telefone:
          <input name="telefone" type="text" class="form-control" value="<?php echo $telefone; ?>" placeholder="Update telefone">          
        </div>

        <div class="form-group">
          Email:
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update email">          
        </div>

        <div class="form-group">
          Cidade:
          <input name="cidade" type="text" class="form-control" value="<?php echo $cidade; ?>" placeholder="Update cidade">          
        </div>

        <div class="form-group">
          Estado:
            <select name="estado" class="form-select">
              <option <?=($estado == 'São Paulo')?'selected':''?> >São Paulo</option>
              <option <?=($estado == 'Rio de Janeiro')?'selected':''?> >Rio de Janeiro</option>
              <option <?=($estado == 'Recife')?'selected':''?> >Recife</option>
              <option <?=($estado == 'Piaui')?'selected':''?> >Piaui</option>
              <option <?=($estado == 'Bahia')?'selected':''?> >Bahia</option>
            </select>
          </div>

          <div class="form-group">
            Categoria:
            <select name="categoria" class="form-select">
              <option <?=($categoria == 'Cliente')?'selected':''?> >Cliente</option>
              <option <?=($categoria == 'Fornecedor')?'selected':''?> >Fornecedor</option>
              <option <?=($categoria == 'Funcionario')?'selected':''?> >Funcionario</option>            
            </select>
          </div>

        <button class="btn-success" name="update">Atualizar</button>
        <button onclick="location.href='index.php'" class="btn-danger" type="button">Cancelar</button>

      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
