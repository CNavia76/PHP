<?php

function burbuja(&$arreglo)
{ $longitud = count($arreglo);
    for ($i = 0; $i < $longitud; $i++) {
        for ($j = 0; $j < $longitud - 1; $j++) {
            if ($arreglo[$j] > $arreglo[$j + 1]) {
                $temporal = $arreglo[$j];
                $arreglo[$j] = $arreglo[$j + 1];
                $arreglo[$j + 1] = $temporal;
            }
        }
    }
}
$miArreglo = [95, 11, 78, 15, 71, 6, 100];
echo "Antes de ordenar: ";
print_r(value: $miArreglo);
// Lo ordenamos
burbuja(arreglo: $miArreglo);
echo "Después de ordenar: ";
print_r(value: $miArreglo);
