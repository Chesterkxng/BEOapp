<?php
session_start();
$profile_type = $_SESSION['profile_type'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>BEOapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="templates\login\css\style.css">
    <link rel="stylesheet" href="templates\dashboard\style.css">
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0" id="whole">
        <div class="mt-1 mb-3 button-container">
            <div class="row pl-0">
                <div>
                    <div>
                        <h5 align="center">
                            <u><strong>
                                    MANUEL DE PROCEDURES DU SERVICE INSTRUCTION ET ENTRAINEMENT DE L'ARMEE DE L'AIR
                                </strong></u>
                        </h5>
                    </div>
    

                <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>