<?php
$server = "localhost";
$user = "root";
$pass = "1234";
$bd = "essentia";

$conn = new mysqli($server, $user, $pass, $bd);

if( $conn = mysqli_connect($server, $user, $pass, $bd) ) {
    //echo "Conectado!";
} else
    echo "Erro!";

function mensagem($texto, $tipo){
    echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
}

function mostra_data($data) {
    $d = explode('-', $data);
    $escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
    return $escreve;
}
function mover_foto($vetor_foto) {
    if ($vetor_foto['error'] == UPLOAD_ERR_NO_FILE) {
        return ''; // Retorna uma string vazia se nenhum arquivo foi enviado
    } elseif (!$vetor_foto['error']) {
        $extensao = pathinfo($vetor_foto['name'], PATHINFO_EXTENSION);
        $nome_arquivo = date('Ymdhms') . "." . $extensao;
        move_uploaded_file($vetor_foto['tmp_name'], "img/" . $nome_arquivo);
        return $nome_arquivo;
    } else {
        return '';
    }
}
?>



