<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo de codificado y decodificado en PHP (encoded / decoded)</title>
    </head>
    <body>
        <?php
        function codificar($dato) {
            $resultado = $dato;
            $arrayLetras = array('M', 'A', 'R', 'C', 'O', 'S');
            $limite = count($arrayLetras) - 1;
            $num = mt_rand(0, $limite);
            for ($i = 1; $i <= $num; $i++) {
                $resultado = base64_encode($resultado);
            }
            $resultado = $resultado . '+' . $arrayLetras[$num];
            $resultado = base64_encode($resultado);
            return $resultado;
        }

        function decodificar($dato) {
            $resultado = base64_decode($dato);
            list($resultado, $letra) = explode('+', $resultado);
            $arrayLetras = array('M', 'A', 'R', 'C', 'O', 'S');
            for ($i = 0; $i < count($arrayLetras); $i++) {
                if ($arrayLetras[$i] == $letra) {
                    for ($j = 1; $j <= $i; $j++) {
                        $resultado = base64_decode($resultado);
                    }
                    break;
                }
            }
            return $resultado;
        }
        ?>

        <h1>Ejemplo de codificado y decodificado en PHP (encoded / decoded)</h1>

        <?php
        $id = "remanso del rodeo"; //dato a ser ocultado
        echo 'Dato crudo: ' . $id;
        echo '<br/><br/>';
        $resultado = codificar($id);
        echo 'Dato codificado: ' . $resultado;
        echo '<br/><br/>';
        echo 'Dato decodificado: ' . decodificar($resultado);
        ?>
    </body>
</html>