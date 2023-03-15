<?php
/*
Faça o cálculo da média simples de 
$nota_1 e $nota_2.
Imprima a média simples.
Imprima a condição:
    Se a média menor ou igual a 4.9, reprovado.
    Se a média entre 5 e 7, recuperação.
    Se a média acima de 7, aprovado.
*/
$nota_1 = 10;
$nota_2 = 4.5;

    $media = ($nota_1 + $nota_2) / 2;

    echo $media;

    if($media <= 4.9) echo "Reprovado!";
    if($media >=5 and $media <= 7) echo "Recuperação!";
    if($media > 7) echo "Aprovado!";

?>