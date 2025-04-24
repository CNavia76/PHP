<!DOCTYPE HTML  "localhost">
<html>
    <head>
        <title>Promedio de tres números</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <h1>Promedio de tres números</h1>
        <p>Este programa calcula el promedio de tres números.</p>
        <p>Por favor, introduce los valores de los tres números:</p>
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $a = floatval ($_POST['a']);
    $b = floatval ($_POST['b']);
    $c = floatval ($_POST['c']);
    $promedio=($a+$b+$c)/3;
    echo 'Valor de promedio: ' . $promedio . "<br/>\n";
}
 
?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="a">Ingresa el valor de a:</label>
                        </td>
                        <td>
                            <input name="a" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="b">Ingresa el valor de b:</label>
                        </td>
                        <td>
                            <input name="b" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="c">Ingresa el valor de c:</label>
                        </td>
                        <td>
                            <input name="c" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" rowspan="1">
                            <input value="Procesar" type="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>