<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Alteração de Cadastro</title>
  </head>
  <body>
    <?php
        include "conexao.php";
        $id = $_GET['id'] ?? '';
        $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

        $dados = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_array($dados);

      ?>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastro</h1>
              <form action="edit_script.php" method="POST">
                <div class="form-group">
                  <label for="nome">Nome completo</label>
                  <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
                </div>
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="telefone">Data de Nascimento</label>
                  <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; 
                  ?>">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success mt-2" value="Salvar Alterações">
                  <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">
                </div>
              </form>
              <a href="index.php" class="btn btn-info btn-sm mt-2">Voltar ao Início</a>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>