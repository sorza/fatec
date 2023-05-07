<?php
/*
Descrubra se $numero é :
 - Divisível por 10
 - Divisível por 3
 - Se não é divisível por nenhum destes 

Imprimir mensagem na tela do número e as condições acima.
*/
$numero = 5;

if($numero % 10 == 0)
{
    echo "O número $numero é divisivel por 10";
        if($numero % 3 == 0)
        echo " e também por 3";
}
else
{
    if($numero % 3 == 0)
        echo "O número é divisivel por 3";
    else echo "O número não é divisivel nem por 3 e nem por 10";
}

?>