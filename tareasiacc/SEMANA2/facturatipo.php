<!DOCTYPE html>
<html>
    <head>
        <title>Factura de un cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $RUT = $_POST['RUT'];
    $direccion = $_POST['direccion'];
    $concepto_del_primer_producto = $_POST['concepto_del_primer_producto'];
    $concepto_del_segundo_producto = $_POST['concepto_del_segundo_producto'];
    $concepto_del_tercer_producto = $_POST['concepto_del_tercer_producto'];
    $cantidad_del_primer_producto = floatval($_POST['cantidad_del_primer_producto']);
    $cantidad_del_segundo_producto = floatval($_POST['cantidad_del_segundo_producto']);
    $cantidad_del_tercer_producto = floatval($_POST['cantidad_del_tercer_producto']);
    $precio_unitario_del_primer_producto = floatval($_POST['precio_unitario_del_primer_producto']);
    $precio_unitario_del_segundo_producto = floatval($_POST['precio_unitario_del_segundo_producto']);
    $precio_unitario_del_tercer_producto = floatval($_POST['precio_unitario_del_tercer_producto']);
    $subtotal_del_primer_producto = $cantidad_del_primer_producto * $precio_unitario_del_primer_producto;
    $subtotal_del_segundo_producto = $cantidad_del_segundo_producto * $precio_unitario_del_segundo_producto;
    $subtotal_del_tercer_producto = $cantidad_del_tercer_producto * $precio_unitario_del_tercer_producto;
    $subtotal_de_la_compra = $subtotal_del_primer_producto + $subtotal_del_segundo_producto + $subtotal_del_tercer_producto;
    $IVA = $subtotal_de_la_compra * 0.19;
    $total_de_la_compra = $subtotal_de_la_compra + $IVA;

    echo '<strong>Nombre</strong>: ' . $nombre . "<br/>\n";
    echo '<strong>RUT</strong>: ' . $RUT . "<br/>\n";
    echo '<strong>Direccion</strong>: ' . $direccion . "<br/>\n";
    echo '<strong>Concepto del primer producto</strong>: ' . $concepto_del_primer_producto . "<br/>\n";
    echo '<strong>Concepto del segundo producto</strong>: ' . $concepto_del_segundo_producto . "<br/>\n";
    echo '<strong>Concepto del tercer producto</strong>: ' . $concepto_del_tercer_producto . "<br/>\n";
    echo '<strong>Valor de IVA</strong>: ' . $IVA . "<br/>\n";
    echo '<strong>Valor de subtotal de la compra</strong>: ' . $subtotal_de_la_compra . "<br/>\n";
    echo '<strong>Valor de subtotal del primer producto</strong>: ' . $subtotal_del_primer_producto . "<br/>\n";
    echo '<strong>Valor de subtotal del segundo producto</strong>: ' . $subtotal_del_segundo_producto . "<br/>\n";
    echo '<strong>Valor de subtotal del tercer producto</strong>: ' . $subtotal_del_tercer_producto . "<br/>\n";
    echo '<strong>Valor de total de la compra</strong>: ' . $total_de_la_compra . "<br/>\n";
}

?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="nombre">Ingresa el nombre:</label>
                        </td>
                        <td>
                            <input name="nombre" required="required" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="RUT">Ingresa el RUT:</label>
                        </td>
                        <td>
                            <input name="RUT" required="required" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="direccion">Ingresa la dirección:</label>
                        </td>
                        <td>
                            <input name="direccion" required="required" type="text" />
                        </td>
                    </tr>
                    <!-- Conceptos de los 3 productos -->
                    <tr>
                        <td>
                            <label for="concepto_del_primer_producto">Ingresa el concepto del primer producto:</label>
                        </td>
                        <td>
                            <input name="concepto_del_primer_producto" required="required" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="concepto_del_segundo_producto">Ingresa el concepto del segundo producto:</label>
                        </td>
                        <td>
                            <input name="concepto_del_segundo_producto" required="required" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="concepto_del_tercer_producto">Ingresa el concepto del tercer producto:</label>
                        </td>
                        <td>
                            <input name="concepto_del_tercer_producto" required="required" type="text" />
                        </td>
                    </tr>
                    <!-- Cantidad de cada producto -->
                    <tr>
                        <td>
                            <label for="cantidad_del_primer_producto">Ingresa la cantidad del primer producto:</label>
                        </td>
                        <td>
                            <input name="cantidad_del_primer_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cantidad_del_segundo_producto">Ingresa la cantidad del segundo producto:</label>
                        </td>
                        <td>
                            <input name="cantidad_del_segundo_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cantidad_del_tercer_producto">Ingresa la cantidad del tercer producto:</label>
                        </td>
                        <td>
                            <input name="cantidad_del_tercer_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <!-- Precio unitario de cada producto -->
                    <tr>
                        <td>
                            <label for="precio_unitario_del_primer_producto">Ingresa el precio unitario del primer producto:</label>
                        </td>
                        <td>
                            <input name="precio_unitario_del_primer_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="precio_unitario_del_segundo_producto">Ingresa el precio unitario del segundo producto:</label>
                        </td>
                        <td>
                            <input name="precio_unitario_del_segundo_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="precio_unitario_del_tercer_producto">Ingresa el precio unitario del tercer producto:</label>
                        </td>
                        <td>
                            <input name="precio_unitario_del_tercer_producto" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input value="Procesar" type="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>