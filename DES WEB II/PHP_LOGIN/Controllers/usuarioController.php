<?php

require_once (__DIR__ . '/../Models/Usuario.php');
require_once ('dbUtils.php');

function CriarUsuarioJSON($usuario){
    try {

        $user = array(
            "nome" => $usuario->getNome(),
            "cpf" => $usuario->getCPF(),
            "usuario" => $usuario->getUsuario(),
            "senha" => $usuario->getSenha(),
            "permissao" => $usuario->getPermissao()        
        );
    
        $arquivo = './dados/login.json';
    
        $json = json_encode($user);
        $file = fopen($arquivo, 'a');
        fwrite($file, ",\n\t" . $json);
    
        $conteudo = str_replace("]}","", file_get_contents("./dados/login.json"));
        $conteudo = $conteudo . "]}";
    
        $file = fopen($arquivo, 'w');
        fwrite($file, $conteudo);
    
        fclose($file);

        return true;
    } catch (\Throwable $th) {
       return false;
    }
}

function CriarUsuarioDB($usuario)
{
    $sql = "INSERT INTO usuarios (usuario, senha, nome, cpf, permissao) VALUES ('" .
        $usuario->getUsuario() . "','".
        $usuario->getSenha() . "','".
        $usuario->getNome() . "','".
        $usuario->getCPF() . "','".
        $usuario->getPermissao() . "');";

    $db = new dbUtils();
    $db->DbCommandExec($sql);

    return "OK";
}

function ConsultarUsuarioDB($post)
{
    $sql = "SELECT * FROM usuarios 
            WHERE usuarios.usuario ='" . $post['username'] . "'
             AND  usuarios.senha ='" . $post['password'] . "';"; 

    $db = new dbUtils();
    $result = $db->DbCommandQuery($sql);

    $result = $result->fetchAll(PDO::FETCH_ASSOC)[0];

    print_r($result);

    $usuario = new Usuario(
        $result['nome'],
        $result['cpf'],
        $result['usuario'],
        $result['senha'],
        $result['permissao']
    );
    
    return $usuario;
}


