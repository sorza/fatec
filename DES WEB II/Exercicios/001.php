<?php
/*
    Variáveis 
*/

$variavel_1 = 'texto';
// Imprimir o valor a variável e o seu tipo
//echo $variavel_1;

$variavel_2 = 123;
// Imprimir o valor a variável e o seu tipo
//echo gettype ($variavel_2);

$variavel_3 = 1;
//echo " $variavel_3" . gettype($variavel_3);

$array = [
    "foo" => "bar",
    "bar" => "foo",
];

// Imprimir o valor a variável e o seu tipo

print_r($array);
echo gettype($array);