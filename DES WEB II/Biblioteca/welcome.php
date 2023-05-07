<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(isset ($_GET['titulo']) && isset($_GET['nome']) &&  isset($_GET['disciplina']))
{
    if($_GET['titulo'] !== "" && $_GET['nome'] !== "" && $_GET['disciplina'] !== "")
    {
        ?> <script> alert('Empréstimo realizado com Sucesso!')</script>  <?php

        $arquivo = "emprestimo.txt";

        if(!file_exists($arquivo))
        {
            $handle = fopen($arquivo, "w");
        } 
        else 
        {
            $handle = fopen($arquivo, "a");
        }       

        fwrite($handle, $_GET['titulo'] ." => " . $_GET['nome'] . " => " . $_GET['disciplina'] . "\n");
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
        <h1>Olá, Profº <b><?php echo htmlspecialchars($_SESSION["username"]); ?>
        <br>
        </b>Bem-vindo ao sistema de empréstimo de livros!</h1>
    </div>
    <p>
        
        <a href="cadastro.php" class="btn btn-primary">Emprestar Livros</a>
        <br><br>

        <a href="emprestimos.php" class="btn btn-primary">Consultar Empréstimos</a>
        <br><br>
        
        <a href="logout.php" class="btn btn-danger">Sair da conta</a>
    </p>
</body>
</html>