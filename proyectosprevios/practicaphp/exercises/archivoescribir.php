<?php

$archivo=fopen("clases.txt","w");
if($archivo){
    fputs($archivo,"Ema Herrera");

}
fclose($archivo);

?>

