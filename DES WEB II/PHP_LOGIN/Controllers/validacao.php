<?php

require_once (__DIR__ . '/../Models/Usuario.php');
require_once 'usuarioController.php';

function validarLoginJSON($post)
{   
    $arquivo_json = json_decode(file_get_contents("./dados/login.json"));

    foreach ($arquivo_json->usuarios as $registro) 
    {
        if($registro->usuario  == $post['username'] &&
            $registro->senha  == $post['password'] )
        {
            return $registro;
        }       
    }

    return null;
}

function validarLoginDB($post)
{
    return ConsultarUsuarioDB($post);
}

function validarCadastro($form)
{
    //Validar dados do formulario
    if($form['nome'] === "") return "Informe um nome válido!";
    if($form['cpf'] === "") return "O campo CPF é obrigatório!";
    if($form['usuario'] === "") return "Informe um nome de usuário!";
    if($form['senha'] === "") return "Informe uma senha!";
    if($form['senha'] !== $form['resenha']) return "As senhas não são iguais!";
    
    //Criar um objeto Usuario
    $usuario = new Usuario(
        $form['nome'],  
        $form['cpf'],  
        $form['usuario'],
        $form['senha'],
        $form['permissao']
    );

    // Cadastrar usuario em JSON
    // if(CriarUsuarioJSON($usuario)) return "OK";

    //Cadastrar usuario no Banco
    if(CriarUsuarioDB($usuario)) return "OK";
    else return "Houve um erro durante o cadastro!";
}

?>
