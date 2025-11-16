<?php
session_start();
define('CUENTAFICHERO', 'misaldo.txt');

// NO está definido el token
if (!isset($_SESSION['token'])) {
    header('Location: acceso.php?msg=Error+de+acceso 1');
exit();
}
/* else {
    $msg = "Token definido";
    header('Location: acceso.php?msg='.urldecode($msg));
}*/

if ($_SESSION['token'] != $_POST['token']) {
    $msg = "Error de acceso";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

$saldo = @file_get_contents(CUENTAFICHERO);
if ($saldo === false) {
    echo "fichero no se puede leer";
    die();
}

if ($_POST['Orden'] == "Ver saldo") {
     $msg = "Su saldo actual es ".number_format($saldo,2,',','.');
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <= 0) {
     $msg = "importe es erroneo o menor de 0";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

$importe = $_POST['importe'];

if ($_POST['Orden'] == "Ingreso") {
    $saldo = $saldo + $importe;
    file_get_contents(CUENTAFICHERO,$saldo);
    $msg ="operacion realizada";
      header("Location: acceso.php?msg=".urlencode($msg));
      exit();

}

if ($_POST['Orden'] == "Reintegro") {
    if ($importe <= $saldo) {
    $saldo = $saldo - $importe;
    file_get_contents(CUENTAFICHERO,$saldo);
    $msg ="operacion realizada";
    } else {
        $msg ="importe erroneo";
    }
       header("Location: acceso.php?msg=".urlencode($msg));
       exit();
}


?>