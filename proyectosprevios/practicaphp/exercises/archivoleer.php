<?php

$prueba=fopen("clases.txt","r");
if ($prueba) {
    while (!feof($prueba)) {
        $linea = fgets($prueba);
        echo $linea . "<br>";
    }
fclose($prueba);
}

?> 