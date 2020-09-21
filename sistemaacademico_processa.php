    <?php
    session_start();


    $servername = "localhost";
    $database = "alunos";
    $username = "root";
    $password = "";

    //criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    //checkando conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nota1 = filter_input(INPUT_POST, 'nota1', FILTER_SANITIZE_NUMBER_FLOAT);
    $nota2 = filter_input(INPUT_POST, 'nota2', FILTER_SANITIZE_NUMBER_FLOAT);
    $nota3 = filter_input(INPUT_POST, 'nota3', FILTER_SANITIZE_NUMBER_FLOAT);

    if ($nota1 > 10 ):
        echo " A nota máxima é 10";
        $nota1 = null;
    endif;
    if ($nota2 > 10 ):
        $nota2 = null;
    endif;
    if ($nota3 > 10 ):
        $nota3 = null;
    endif;

        $media = ($nota1 + $nota2 + $nota3) / 3;

        if ($media >= 7):
            $status = "Aprovado";
        endif;

        if ($media < 7):
            $status = "Recuperação";
        endif;


        $sql = "INSERT INTO usuarios (nome, nota1, nota2, nota3, media, status ) VALUES ('$nome', '$nota1', '$nota2', '$nota3', '$media', '$status')";


    if (mysqli_query($conn, $sql)) {

        $_SESSION ['msg'] = "<p style='color: green'>Usuário Registrado, você pode cunsultar em Pesquisar</p>";
        header("Location: index.php");
    } else {
        $_SESSION ['msg'] = "<p style='color: red'>Usuario Não foi cadastrado, campos não podem ficar vazios e a nota não pode exceder 10</p>";
        header("Location: index.php");
    }
    mysqli_close($conn);
