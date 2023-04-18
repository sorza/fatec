<?php
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    if($_POST['username'] == 'alexandre' and $_POST['password'] == '123456'){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION["username"] = 'Orlando Saraiva';
         header("location: welcome.php");
    } else {
        $_SESSION['loggedin'] = FALSE;
    }

    if($_COOKIE['cadastro'] == 'erro')
    {
        ?> <script> alert('Informe, por favor, nome e cpf válidos.')</script>  <?php
    }
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
        <h2>Cadastrar Usuário</h2>
        <p>Favor o inserir o nome e CPF do novo usuário.</p>
        <form action="welcome.php" method="get">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>C.P.F</label>
                <input type="text" name="cpf" class="form-control" value="">
                <span class="help-block"></span>
            </div>           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>    
</body>
</html>