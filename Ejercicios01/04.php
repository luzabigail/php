<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 04 - Genera 666</title>
</head>

<body>
    <h1>Ejercicio 4</h1>

    <?php
    $contadorintentos = 0;
    $contador6 = 0;
    $tiempoantes = microtime(true);
    $numAnterior = 0;
    do {
        $numero = random_int(1, 10);
        $contadorintentos++;
        if ($numero == 6) {
            $contador6++;
        } else {
            $contador6 = 0;
        }
    } while ($contador6 < 3);
    $tiempoInvertido = microtime(true) - $tiempoantes;

    echo "Han salido tres 6 seguidos tras generar " . $contadorintentos . " números en " .
        ($tiempoInvertido * 1000) . " milisegundos.";
    ?>
</body>

</html>