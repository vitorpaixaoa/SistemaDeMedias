<?php
$servername = "localhost";
$database = "alunos";
$username = "root";
$password = "";

//criando conexão
$conn = mysqli_connect($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style type="text/css">
        #div-principal{
            position: absolute;
            align: center;
            width: 50%;
            border: 1px solid red;
        }
        img{
            width: 150px;
        }
    </style>
    <meta charset="utf-8">
    <title> CRUD - Pesquisar  </title>
</head>
<body>
    <header>
        <a href="index.php"> Registrar Usuário </a>
    </header>
<div align="center" id="div-principal">
    <img src="https://www.pravaler.com.br/wp-content/uploads/2019/09/universidade-undb.png" alt="">


    <h1> Pesquisar Aluno </h1>
    <form method="POST" action="">

        <label for=""> Nome:</label>
        <input type="text" name="nome" placeholder=" Nome do Aluno "> <br><br>
        <hr width="50%">

        <input name="SendPesqUser" type="submit" value="Pesquisar">
    </form>
    <br><br>

    <?php

    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

    if($SendPesqUser) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
        $resultado_Usuario = mysqli_query($conn, $result_usuario );
        while ($row_usuario = mysqli_fetch_assoc($resultado_Usuario)){
            echo "ID:" . $row_usuario ['id'] . "<br>";
            echo "Nome:" . $row_usuario ['nome'] . "<br>";
            echo "Média:" . $row_usuario ['media'] . "<br>";
            echo "Status do curso:" . $row_usuario ['status'] . "<br> <br> <hr>";

        };
    }
    ?>
</div>


</body>

</html>

