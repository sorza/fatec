<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(isset ($_GET['nome']) && isset($_GET['cpf']) )
{
    if($_GET['nome'] !== "" && $_GET['cpf'] !== "")
    {
        ?> <script> alert('Usuário Cadastrado com Sucesso!')</script>  <?php

        $arquivo = "usuarios.txt";

        if(!file_exists($arquivo))
        {
            $handle = fopen($arquivo, "w");
        } 
        else 
        {
            $handle = fopen($arquivo, "a");
        }       

        fwrite($handle, $_GET['nome'] ."\t" . $_GET['cpf'] . "\n");
        fflush($handle);
        fclose($handle);

        $_COOKIE['cadastro'] = 'novo';
    }
    else
    {              
        $_COOKIE['cadastro'] = 'erro';
        header("location: cadastro.php");
    }
}

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>
        <br>
        </b>.Benvindo ao site.</h1>
    </div>
    <p>
        
        <a href="cadastro.php" class="btn btn-primary">Cadastro Pessoas</a>
        <br><br>
        
        <a href="logout.php" class="btn btn-danger">Sair da conta</a>
    </p>
</body>
</html>