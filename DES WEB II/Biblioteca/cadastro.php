<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if($_COOKIE['cadastro'] == 'erro')
{
    ?> <script> alert('Informe, por favor, o título do livro, nome do aluno e disciplina correspondente!')</script>  <?php
}

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Empréstimo de livro</h2>
        <p>Para emprestar o livro, informe os seguintes campos.</p>
        <form action="welcome.php" method="get">
            <div class="form-group">
                <label>Título do livro</label>
                <input type="text" name="titulo" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Nome do aluno</label>
                <input type="text" name="nome" class="form-control" value="">
                <span class="help-block"></span>
            </div>     
            <div class="form-group">
                <label>Disciplina</label>
                <input type="text" name="disciplina" class="form-control" value="">
                <span class="help-block"></span>
            </div>        
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Emprestar Livro">
                <a class="btn btn-danger" value="Voltar" href="welcome.php">Voltar</a>
            </div>
        </form>
    </div>    
</body>
</html>