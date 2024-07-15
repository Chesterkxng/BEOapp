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
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <!--Content right-->
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>Dashboard</strong></h5>
        <h6 class="mb-3" style="color:darkblue"><strong>TO DO</strong></h6>
        <div class="mt-1 mb-3 button-container">
            <div class="row pl-0">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $ownTodoNumber ?></strong></h3>
                                <p><small class="text-muted bc-description">PERSONNELLES</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                                <i class="fas fa-share"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $givenTodoNumber ?></strong></h3>
                                <p><small class="text-muted bc-description">DONNEES A FAIRE</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger">
                                <i class="fas fa-reply-all"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $receivedTodoNumber ?></strong></h3>
                                <p><small class="text-muted bc-description">RECUES A FAIRE</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="mb-3" style="color:darkblue"><strong>STAGES</strong></h6>
            <div class="row pl-0">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                <i class="fa fa-forward"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $upcomingStagesNumber ?></strong></h3>
                                <p><small class="text-muted bc-description">PROCHAINS</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $pendingStagesNumber ?></strong></h3>
                                <p><small class="text-muted bc-description">EN COURS</small></p>
                            </div>
                        </div>
                    </div>
                </div><div class=""></div>
            </div>


            <h6 class="mb-3" style="color:darkblue"><strong>MISSION ORDERS</strong></h6>
            <h6 class="mb-3" style="color:darkblue"><strong>THIS MONTH</strong></h6>
            <div class="row pl-0">

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $monthlyDOM ?></strong></h3>
                                <p><small class="text-muted bc-description">DEMANDES D'OM</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mb-3" style="color:darkblue"><strong>TOTAL</strong></h6>
            <div class="row pl-0">

                
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="bg-white border shadow">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3 class="mt-0 mb-0"><strong><?= $totalDOM ?></strong></h3>
                                <p><small class="text-muted bc-description">DEMANDES D'OM</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>