<?php include('includes/header.php'); ?>
<!-- FORMULARIO CADASTRO -->
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="save.php" method="POST">
          <h5>Novo Cadastro</h5>
          <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required="required" autofocus>
          </div>
          <div class="form-group">            
             <input type="text" name="telefone" class="form-control" id="tel" placeholder="Telefone" required="required">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cidade" class="form-control" placeholder="Cidade" required="required" autofocus>
          </div>

          <div class="form-group">
            Estado:
            <select name="estado" class="form-select" aria-label="Default select example">         
              <option>São Paulo</option>
              <option>Rio de Janeiro</option>
              <option>Recife</option>
              <option>Piaui</option>
              <option>Bahia</option>
            </select>
          </div>

          <div class="form-group">
            Categoria:
            <select name="categoria" class="form-select" aria-label="Default select example">      
              <option>Cliente</option>
              <option>Fornecedor</option>
              <option>Funcionario</option>
            </select>
          </div>

          <input type="submit" name="save" class="btn-success" value="Salvar">          
          <button onclick="location.href='index.php'" class="btn-danger" type="button">Cancelar</button>

        </form> 
      </div>
       </div>
  </div>
</div>
      <!-- FIM FORMULARIO CADASTRO-->

      <?php include('includes/footer.php'); ?>