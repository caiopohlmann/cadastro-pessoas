CADASTRO DE PESSOAS

1- Clone Branch Master
2- Adicione os arquivo e pastas, em uma nova pasta(essential) dentro de C:\xampp\htdocs\.
3- Abra o XAMPP e verifique se os serviços Apache e MySQL estão iniciado. Caso não esteja, clique em "Start" para iniciar o serviço.
4- Será necessário criar um banco de dados local, No phpMyAdmin crie um banco de dados com o nome essential.

CREATE TABLE pessoas (
    cod_pessoa INT AUTO_INCREMENT PRIMARY KEY,
    data_nascimento DATE,
    email VARCHAR(255),
    endereco VARCHAR(255),
    foto VARCHAR(255),
    nome VARCHAR(255),
    telefone VARCHAR(16)
);

5- Após criar uma tabela com essas caracteristicas, certifique-se que sua senha e porta no my.init estejam corretas

logo em seguida basta acessar http://localhost/essential/index.php para testar a aplicação

Quaisquer duvidas, entrar em contato.
