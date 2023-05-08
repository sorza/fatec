<?php
 
 require_once 'validacao.php';

 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
     session_start();
        
     $usuario = validarLogin($_POST); 
 
     if(isset($usuario))
     {
         $_SESSION['loggedin'] = TRUE;
         $_SESSION["username"] = $usuario->nome;

         if($usuario->permissao == 'adm')
         {
            header("location: welcome-admin.php");
         }
         else
         {
            header("location: welcome-comum.php");
         }
         
     }
     else
     {        
         $_SESSION['loggedin'] = FALSE;  

         ?> <script> alert('Acesso Negado. Por favor, revise sua credencial!') </script> <?php
     }    
 }

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>          
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>          
        </form>
    </div> 
    <script scr="./js/main.js"><script>   
</body>
</html>