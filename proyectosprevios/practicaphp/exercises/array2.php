<?php

// OPERACIONES CON ARREGLOS
    $NOTAS_sec1 = ARRAY(75,80,45,100,92);
    $NOTAS_sec2= ARRAY (88,90,90,78,99);

//otras operaciones
    $resultados= implode($NOTAS_sec1);
    Echo "convertir arreglo en cadena ". $resultados. "<br>";
    $cadena= "AMERICA, LUISA, PEDRO, LUIS";
    $array = explode(",", $cadena);
    Echo "convertir cadena en arreglo $array[0],<br>";
    Echo "convertir cadena en arreglo $array[1],<br>";
    Echo "convertir cadena en arreglo $array[2],<br>";
    Echo "convertir cadena en arreglo $array[3],<br>";
    $elementos= count($NOTAS_sec2); //cuenta los elementos
    Echo "elementos del arreglo$elementos,<br>";
//agregar elementos al arreglo
    array_push($NOTAS_sec2, 100,100); // agrega la final del arreglo
    Echo "nuevo 1 $NOTAS_sec2[5],<br>";
    Echo "nuevo 2 $NOTAS_sec2[6],<br>";
    If (in_array(78, $NOTAS_sec2)) // busca un elemento en el arreglo
    { 
        echo "Encontrado ";
    }

