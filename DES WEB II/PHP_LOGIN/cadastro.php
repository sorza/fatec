<?php  

require_once './Controllers/validacao.php';
require_once ('./Models/Usuario.php');

session_start();

if($_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $retorno = validarCadastro($_POST);
    
    if($retorno !== "OK")
    {     
        ?><div class="alert alert-danger" role="alert">
            <?php echo $retorno; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div><?php
    }
    else
    {
        ?><div class="alert alert-success" role="alert">
            Usuário cadastrado com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div><?php
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
        <p>Favor o inserir os dados do novo usuário.</p>
        <form action="cadastro.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>C.P.F</label>
                <input type="number" maxlength="11" name="cpf" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usuario" maxlength="25" class="form-control" value="">
                <span class="help-block"></span>
            </div> 
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" maxlength="20" class="form-control" value="">
                <span class="help-block"></span>
            </div>     
            <div class="form-group">
                <label>Repita a senha</label>
                <input type="password" name="resenha" maxlength="20" class="form-control" value="">
                <span class="help-block"></span>
            </div>          
            <div class="form-check">
                <input class="form-check-input" type="radio" name="permissao" id="flexRadioDefault2" value="Comum" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Usuário Comum
                </label> 
                <br>         
                <input class="form-check-input" type="radio" name="permissao" value="Admin" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Administrador
                </label>
            </div>            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>