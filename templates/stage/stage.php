<?php
session_start();

use Application\Lib\Database\DatabaseConnection;

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
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>STAGES</strong></h5>
        <h6 class="mb-3"><strong>EN COURS</strong></h6>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="pending-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>INTITULE DU STAGE</th>
                                    <th>VILLE</th>
                                    <th>ENTITE</th>
                                    <th>PARTICIPANTS</th>
                                    <th>LAUREATS</th>
                                    <th>DEBUT</th>
                                    <th>FIN</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form style="display:inline;" action="index.php?action=stageAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i = 1;

                                foreach ($pendingStages as $stage) {

                                ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->name) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->city) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->entity) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->participants) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->laureats) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->starting_date) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->end_date) ?>
                                        </td>
                                        <td>
                                            <a href="index.php?action=stageUpdatingForm&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?action=deleteStagePopup&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Striped table-->
            </div>
        </div>
        <h6 class="mb-3"><strong>PROCHAINS</strong></h6>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="upcoming-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>INTITULE DU STAGE</th>
                                    <th>VILLE</th>
                                    <th>ENTITE</th>
                                    <th>PARTICIPANTS</th>
                                    <th>LAUREATS</th>
                                    <th>DEBUT</th>
                                    <th>FIN</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form style="display:inline;" action="index.php?action=stageAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i = 1;

                                foreach ($upcomingStages as $stage) {

                                ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->name) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->city) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->entity) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->participants) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->laureats) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->starting_date) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->end_date) ?>
                                        </td>
                                        <td>
                                            <a href="index.php?action=stageUpdatingForm&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?action=deleteStagePopup&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Striped table-->
            </div>
        </div>
        <h6 class="mb-3"><strong>TERMINES</strong></h6>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="completed-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>INTITULE DU STAGE</th>
                                    <th>VILLE</th>
                                    <th>ENTITE</th>
                                    <th>PARTICIPANTS</th>
                                    <th>LAUREATS</th>
                                    <th>DEBUT</th>
                                    <th>FIN</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form style="display:inline;" action="index.php?action=stageAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i = 1;

                                foreach ($completedStages as $stage) {

                                ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->name) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->city) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->entity) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->participants) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->laureats) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->starting_date) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($stage->end_date) ?>
                                        </td>
                                        <td>
                                            <a href="index.php?action=stageUpdatingForm&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?action=deleteStagePopup&stage_id=<?= $stage->stage_id ?>">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Striped table-->
            </div>
        </div>

        <?php require('templates/pagesComponents/popup/stage.php'); ?>
        <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pending-table').DataTable();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#upcoming-table').DataTable();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#completed-table').DataTable();
            });
        </script>

</body>

</html>