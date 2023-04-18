<?php
/*
Crie um script que percorra toda a $array, apresentando os valores.
Utilize foreach.
Adapte o código para exibir somente os valores inteiros.
Realize a soma dos números inteiros

Dica: https://www.php.net/manual/en/control-structures.foreach.php
*/ 
$array = [
    "n1" => 10,
    "n2" => 20,
    "n3" => 30,
    "n4" => 'oi mundo',
];

$resultado = 0;

foreach($array as $chave => $valor)
{
    
    if(gettype($valor) == 'integer')
    {
        echo $valor;
        $resultado += $valor;
    }
    

}
echo $resultado;
?>