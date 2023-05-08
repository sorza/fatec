<?php

class Usuario
{
    private $usuario;
    private $senha;
    private $permissao;
    private $nome;
    private $cpf;

    public function __construct( $nome, $cpf, $usuario, $senha, $permissao)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->permissao = $permissao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getPermissao()
    {
        return $this->permissao;
    }

}