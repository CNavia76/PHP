<?php

$num1 = "Carolina";
$num2 = "Alejandro";
$num3 = "Belén";
$num4 = "Kiara";
$num5 = "Ema";

$array = array($num1, $num2, $num3, $num4, $num5);

$longitud = count($array);

while($longitud > 0)
    {
    echo $array[$longitud-1];
    echo "<br>";
    $longitud--;
    }

  print_r($array);  







?>