<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuéGastos</title>

    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
    <!-- Bootstrap core CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Material Design Bootstrap -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css' rel='stylesheet'>
    <!-- estilos -->
    <link rel="stylesheet" href="css/estilos.css">
    <?php
    $url = $_SERVER["REQUEST_URI"];
    $url = explode("/", $url);

    ?>

    <?php if ($url[3] === "login") : ?>
        <link rel="stylesheet" href="../css/estilos.css">
    <?php endif; ?>
</head>

<body>
    <header class="fixed-top">

        <nav class="mb-1 navbar navbar-expand-lg navbar-dark mdb-color darken-4">
            <div class="container">
                <a class="navbar-brand" href="<?php echo RUTA_APP ?>">QuéGastos</a>
            </div>
        </nav>

    </header>