<!DOCTYPE html>
<html lang="es">
<?php
/**
 * Separar la url
 */
$url = $_SERVER["REQUEST_URI"];
$url = explode("/", $url);

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> QuéGastos </title>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
    <!-- Bootstrap core CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Material Design Bootstrap -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css' rel='stylesheet'>

    <!-- animatecss -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <?php if ($url[2] === "dashboard") : ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css" />
    <?php endif; ?>

    <?php if ($url[2] === "gastos") : ?>
        <!-- datatableJS -->
        <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/estilos.css">
    <?php else : ?>
        <!-- estilos -->
        <link rel="stylesheet" href="css/estilos.css">
    <?php endif; ?>


    <?php if ($url[2] === "calendario") : ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css" />
    <?php endif; ?>

</head>

<body>
    <div class="d-flex">