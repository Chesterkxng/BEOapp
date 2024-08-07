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
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>PERSONAL INFORMATIONS UPDATE</strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">PERSONAL</h6>
                    <form action="index.php?action=updateProfileInfos&login_id=<?= $login_id ?>" method="post">
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="grade">GRADE</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="grade" id="grade" required>
                                    <option class="option" value="<?= $personal->grade ?>"><?= $personal->grade ?>
                                    </option>
                                    <option class="option" value="General d'Armée">General d'Armée</option>
                                    <option class="option" value="General de Corps d'Armée">General de Corps d'Armée
                                    </option>
                                    <option class="option" value="General de Division aérienne">General de Division
                                        aérienne</option>
                                    <option class="option" value="General de Brigade aérienne">General de Brigade
                                        aérienne</option>
                                    <option class="option" value="Colonel- Major">Colonel- Major</option>
                                    <option class="option" value="Colonel">Colonel</option>
                                    <option class="option" value="Lieutenant-Colonel">Lieutenant-Colonel</option>
                                    <option class="option" value="Commandant">Commandant</option>
                                    <option class="option" value="Capitaine">Capitaine</option>
                                    <option class="option" value="Lieutenant">Lieutenant</option>
                                    <option class="option" value="Sous-Lieutenant">Sous-Lieutenant</option>
                                    <option class="option" value="Ajdudant-Major">Ajdudant-Major</option>
                                    <option class="option" value="Adjudant-Chef">Adjudant-Chef</option>
                                    <option class="option" value="Adjudant">Adjudant</option>
                                    <option class="option" value="Sergent-Chef">Sergent-Chef</option>
                                    <option class="option" value="Sergent">Sergent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="surname">SURNAME</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="surname" name="surname" value="<?= $personal->surname ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">FIRST NAME</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="firstName" name="firstName" value="<?= $personal->first_name ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="function">FUNCTION</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="function" name="function" value="<?= $personal->function ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>UPDATE PERSONAL
                                        INFOS</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <h5 class="mb-3"><strong>PROFILE PICTURE</strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">PICTURE SELECTION</h6>
                    <form action="index.php?action=updateProfilePicture&login_id=<?= $login_id ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="pp">SELECT THE PICTURE</label>
                            <div class="col-sm-5">
                                <input type="file" autocomplete="off" class="form-control" id="pp" name="pp" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block">
                                    <strong>UPDATE PROFILE PICTURE</strong>
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <h5 class="mb-3"><strong>SECURITY INFORMATIONS</strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">PERSONAL</h6>
                    <form action="index.php?action=updateSecurityInfos&login_id=<?= $login_id ?>" method="post">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="username">USERNAME</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" value="<?= $user->username ?>" class="form-control" id="username" name="username" required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="securityquestion">SECURITY QUESTION</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="securityquestion" id="securityquestion" required>
                                    <option class="option" value="<?= $user->security_question ?>"> <?= $user->security_question ?> </option>
                                    <option class="option" value="Quel est le nom de votre meilleur ami ?">Quel est le
                                        nom de votre meilleur ami ?</option>
                                    <option class="option" value="Quel est le prénom de votre mère ?">Quel est le prénom
                                        de votre mère ?</option>
                                    <option class="option" value="Quel est votre ville préférée ?">Quel est votre ville
                                        préférée ?</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="securityanswer">SECURITY ANSWER</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="<?= $user->security_answer ?>" id="securityanswer" name="securityanswer" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>UPDATE SECURITY
                                        INFOS</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require('templates/pagesComponents/popup/personalPopup.php') ?>
        <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>