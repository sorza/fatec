<?php

require_once (__DIR__ . '/../Models/Usuario.php');

function CriarUsuarioJSON($usuario)
{
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