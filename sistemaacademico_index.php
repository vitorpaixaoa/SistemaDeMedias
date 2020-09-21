<?php
session_start();
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
        <title> CRUD - Registrar  </title>
    </head>
    <body>
    <header>
        <a href="pesquisar.php"> Pesquisar Usuário </a>
    </header>
        <div align="center" id="div-principal">
            <img src="https://www.pravaler.com.br/wp-content/uploads/2019/09/universidade-undb.png" alt="">
            <h1> Cadastrar Aluno </h1>
            <?php
                if(isset($_SESSION ['msg']))
                    echo $_SESSION ['msg'];
                unset($_SESSION ['msg']);
            ?>
            <form method="POST" action="processa.php">

                <label for=""> Nome:</label>
                <input type="text" name="nome" placeholder="Insira o nome do Aluno."> <br><br>
                <hr width="50%">

                <label for=""> Nota 1: </label>
                <input type="float" min="0" max="10" name="nota1"  placeholder="Nota do primeiro bimestre">
                <br>
                <hr width="50%">

                <label for=""> Nota 2: </label>
                <input type="float" min="0" max="10" name="nota2"  placeholder="Nota do primeiro bimestre">
                <br>
                <hr width="50%">

                <label for=""> Nota 3: </label>
                <input type="float" name="nota3"  placeholder="Nota do primeiro bimestre">
                <br>
                <hr width="50%">

                <input type="submit" value="Cadastrar">

            </form>

        </div>
    </body>

</html>
