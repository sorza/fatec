<?php

require_once './classes/Usuario.php';

function validarLogin($login)
{   
    $registros = json_decode(file_get_contents("./dados/login.json"));
    
    foreach ($registros as $registro) 
    {
       if($registro->usuario  == $login['username'] &&
            $registro->senha  == $login['password'] )
       {
           return $registro;
       }
    }
    return null;
}

function validarCadastro($form)
{
    if($form['nome'] === "") return "Informe um nome válido!";
    if($form['cpf'] === "") return "O campo CPF é obrigatório!";
    if($form['usuario'] === "") return "Informe um nome de usuário!";
    if($form['senha'] === "") return "Informe uma senha!";
    if($form['senha'] !== $form['resenha']) return "As senhas não são iguais!";
    
    $usuario = new Usuario(
        $form['nome'],  
        $form['cpf'],  
        $form['usuario'],
        $form['senha'],
        $form['permissao']
    );

    $usuario = array(
            "nome" => $usuario->getNome(),
            "cpf" =>$usuario->getCPF(),
            "usuario" => $usuario->getUsuario(),
            "senha" => $usuario->getSenha(),
            "permissao" => $usuario->getPermissao()
    );

    $arquivo = './dados/login.json';
    $json = json_encode($usuario);
    $file = fopen($arquivo, 'a');
    fwrite($file, ',' . $json);
    fclose($file);

    return "OK";
}

?>
