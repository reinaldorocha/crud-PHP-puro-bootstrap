<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <!-- MESSAGES (SALVO,ATUALIZADO...) -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- FORM PESQUISA -->                
          <form method="POST" action="">                    
            <h5>Pesquisa</h5>
            <div class="form-group row"> 
              <div class="col-sm-5">
                <input type="text" name="entrada" class="form-control" placeholder="Ex: Recife">
              </div>

              <div class="col-sm-5">
                  <input type="submit" name="submit" class="btn btn-success" value="Pesquisar">
              </div>
              
              <div class="col-sm-1">
                  <a href="cadastrar.php" type="submit" class="btn btn-success">Adicionar</a>
              </div> 
            </div>
        </form>       
      <br>
      <!-- FIM - FORM PESQUISA -->    
    </div>

    <!-- TABELA COM DADOS DO BANCO-->
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Categoria</th>
              <th>Ação</th>
            </tr>
          </thead>
          <body>

            <?php

            //CONFERE SE EXISTE ENTRADA NO CAMPO PESQUISA
            if ( isset( $_POST['entrada'] ) )
              {
                  $entrada = $_POST['entrada'];
              }
              else
              {
                  $entrada = '';
              }

            //QUERY
            $query = "SELECT * FROM cadastro WHERE `nome` LIKE '%$entrada%' or `telefone` LIKE '%$entrada%' or `email` LIKE '%$entrada%' or `cidade` LIKE '%$entrada%' or `estado` LIKE '%$entrada%' or `categoria` LIKE '%$entrada%' ";
            $result_cadastro = mysqli_query($conn, $query);    

            //IMPRIME OS RESULTADOS
            while($row = mysqli_fetch_assoc($result_cadastro)) { ?>
            <tr>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['telefone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['cidade']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              <td><?php echo $row['categoria']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </body>
        </table>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
