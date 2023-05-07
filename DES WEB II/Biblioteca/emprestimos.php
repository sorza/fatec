<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$arquivo = "emprestimo.txt";

$sr = fopen($arquivo, "r");

$teste = "Teste de livro";

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Empréstimos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="">
        <h2>Livros emprestados</h2>        
        <br><b>Título =>  Aluno =>  Disciplina </b><br>
        <?php         
        while(!feof($sr)) 
        {
            echo htmlspecialchars(fgets($sr));    
            ?><br><?php
        }?> 
        
        <div class="form-group">  
            <a class="btn btn-danger" value="Voltar" href="welcome.php">Voltar</a>
        </div>
    </div>    
</body>
</html>