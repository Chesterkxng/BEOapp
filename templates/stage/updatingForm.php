<?php session_start() ?>
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
    <?php
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>AJOUTER STAGE </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">INFORMATIONS STAGE</h6>
                    <form action="index.php?action=updateStage&stage_id=<?= $stage->stage_id ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="name">INTITULE DU STAGE</label>
                            <div class="col-sm-5">
                                <textarea type="text" rows="2" placeholder="entrez l'intitulé du stage" 
                                 value = "<?= $stage->name?>"style="text-transform: uppercase;" class="form-control" id="name" name="name" required><?= $stage->name?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="city">VILLE</label>
                            <div class="col-sm-5">
                                <input type="text" value = "<?= $stage->city?>" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="city" name="city" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="entity">ENTITE</label>
                            <div class="col-sm-5">
                                <input type="text"  value = "<?= $stage->entity ?>" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="entity" name="entity" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="participants">PARTICIPANTS</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" value = "<?= $stage->participants ?>" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="participants" name="participants" required>
                            </div>
                        </div>

                      
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="starting_date">DATE DE DEBUT</label>
                            <div class="col-sm-5">
                                <input type="date" value = "<?= $stage->starting_date ?>" class="form-control" id="starting_date" name="starting_date" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="end_date">DATE DE FIN</label>
                            <div class="col-sm-5">
                                <input type="date" value = "<?= $stage->end_date ?>" class="form-control" id="end_date" name="end_date" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="laureats">LAUREATS</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" value= "<?php  if ($stage->laureats) echo $stage->laureats?>" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="laureats" name="laureats">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="btn_add"></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>METTRE A JOUR</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/pagesComponents/popup/stage.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>