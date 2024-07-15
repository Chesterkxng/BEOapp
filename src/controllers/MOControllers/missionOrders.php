<?php

namespace Application\Controllers\MOControllers\MissionOrders;

require_once('src/lib/database.php');
require_once('src/model/om.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\OM\OMRepository;

class MissionOrders
{
    public function intMOgenerateForm()
    {
        require("templates/OM/inMO_GenerateForm.php");
    }
    public function saveIntOM(array $input)
    {
        require("templates/OM/inMO_GenerateForm.php");
        if ($input !== null) {
            $grade = null;
            $name = null;
            $PN = null;
            $companions_number = null;
            $companions = null;
            $country = null;
            $city = null;
            $object = null;
            $means = null;
            $departure_date = null;
            $return_date = null;
            if (
                !empty($input['grade']) && !empty($input['name']) && !empty($input['PN'])
                && !empty($input['city']) && !empty($input['means']) && !empty($input['companion'])
                && !empty($input['object']) && !empty($input['departuredate']) && !empty($input['returndate'])

            ) {
                $recipient = htmlspecialchars($input['grade']) . " " . htmlspecialchars($input['name']) . " MLE : " . htmlspecialchars($input['PN']);
                $country = "COTE D'IVOIRE";
                $city = htmlspecialchars($input['city']);
                $object = htmlspecialchars($input['object']);
                $means = htmlspecialchars($input['means']);
                $departure_date = htmlspecialchars($input['departuredate']);
                $return_date = htmlspecialchars($input['returndate']);
                $type = "INTERIEUR";
                $companions_number = htmlspecialchars($input['companion']);

                switch ($companions_number) {
                    case "SEUL":
                        $companions = "SEUL";
                        break;
                    case "UN (01) MILITAIRE":
                        $companions = htmlspecialchars($input['name1']) . " MLE : " . htmlspecialchars($input['mat1']);
                        break;
                    case "DEUX (02) MILITAIRES":
                        $companions = htmlspecialchars($input['name1']) . " MLE : " . htmlspecialchars($input['mat1']) . '\n' .
                            htmlspecialchars($input['name2']) . " MLE : " . htmlspecialchars($input['mat2']);
                        break;
                    case "TROIS (03) MILITAIRES":
                        $companions = htmlspecialchars($input['name1']) . " MLE : " . htmlspecialchars($input['mat1']) . '\n' .
                            htmlspecialchars($input['name2']) . " MLE : " . htmlspecialchars($input['mat2']) . '\n' .
                            htmlspecialchars($input['name3']) . " MLE : " . htmlspecialchars($input['mat3']);
                        break;
                }
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $OMRepository = new OMRepository();
            $OMRepository->connection = new DatabaseConnection();
            $success = $OMRepository->addOM(
                strtoupper($recipient),
                strtoupper($city),
                strtoupper($companions),
                strtoupper($object),
                strtoupper($means),
                strtoupper($departure_date),
                strtoupper($return_date),
            );
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    addingIntSuccessAlert()
                    </script>';
            }
        }
    }

    public function MOArchives()
    {
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $intOMs = $OMRepository->getIntOMs();
        require('templates/OM/MOarchives.php');
    }
    public function uploadMOPage(int $om_id)
    {
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $OM = $OMRepository->getOM($om_id);
        require('templates/OM/uploadMO.php');
    }

    public function uploadMO(int $type, int $om_id)
    {
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $OM = $OMRepository->getOM($om_id);
        require('templates/OM/uploadMO.php');

        if ($type == 1) {
                $filename = $_FILES['uploadfile']['name'];
                $location = 'docs/MO/INT/' . $filename;
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                    $url = $location;
                }
        }
        $success = $OMRepository->uploadMO($url, $om_id);
        if ($success == 0) {
            echo '<script type="text/javascript">
                    addingErrorAlert()
                </script>';
        } else {
            echo '<script type="text/javascript">
                    UploadingSuccessAlert()
                </script>';
        }
    }
}
