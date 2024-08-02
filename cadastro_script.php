<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          include "conexao.php";

          // Verifique se o formulário foi enviado
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Receber e sanitizar os dados
              $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
              $endereco = isset($_POST['endereco']) ? htmlspecialchars($_POST['endereco']) : '';
              $telefone = isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '';
              $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
              $data_nascimento = isset($_POST['data_nascimento']) ? htmlspecialchars($_POST['data_nascimento']) : '';

              $foto = $_FILES['foto'];
              $nome_foto = mover_foto($foto);

              // Preparar a declaração SQL
              $stmt = $conn->prepare("INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) VALUES (?, ?, ?, ?, ?, ?)");

              // Verificar se a preparação foi bem-sucedida
              if ($stmt) {
                  // Vincular os parâmetros
                  $stmt->bind_param("ssssss", $nome, $endereco, $telefone, $email, $data_nascimento, $nome_foto);

                  // Executar a declaração
                  if ($stmt->execute()) {
                    if ($nome_foto) {
                        echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                    }
                    mensagem("$nome cadastrado com sucesso!", 'success');
                  } else {
                    mensagem("$nome NÃO cadastrado!", 'danger');
                  }

                  // Fechar a declaração
                  $stmt->close();
              } else {
                  echo "Erro ao preparar a declaração SQL.";
              }
          }
          ?>
          <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
