<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passagem de Parâmetros via POST</title>
</head>
<body>
<?php

require_once('dados_banco.php');

function validar_post($dado_enviado){
    if(isset($dado_enviado) and $dado_enviado <> ""){
        return TRUE;
    }
    return FALSE;
}

if(validar_post($_POST['firstName']) and validar_post($_POST['lastName']))
{      
    $conn = new mysqli($servername, $username, $password, $dbname);

    $nome = $_POST['firstName'];
    $sobrenome = $_POST['lastName'];

    // Checar Conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }   

    $sql = "INSERT INTO authors (firstname, lastname)
    VALUES ('$nome', '$sobrenome')";

    if ($conn->query($sql) === TRUE) {
        echo "$nome $sobrenome foi adicionado(a) com sucesso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    /*
    Inserir os dados no banco de dados MySQL
    */
}

?>
</body>
</html>