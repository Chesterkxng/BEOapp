<?php

namespace Application\Controllers\CourierControllers\Courier;

require_once ('src/model/courier.php');
require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Courier\CourierRepository;
use Application\Model\NDS\NDSRepository;


class Courier
{
    public function courierAddingForm()
    {
        require ('templates/courier/addingForm.php');
    }

    public function addCourier(array $input)
    {
        require ('templates/courier/addingForm.php');
        if ($input !== null) {
            $reference = null;
            $object = null;
            $edition_date = null;
            $url = null;
            if (
                !empty($input['reference']) && !empty($input['object']) && !empty($input['details'])
                && !empty($input['date'])

            ) {
                $reference = htmlspecialchars($input['reference']);
                $object = htmlspecialchars($input['object']);
                $edition_date = htmlspecialchars($input['date']);

            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $filename = $_FILES['uploadfile']['name'];
            $location = 'docs/courier/' . $filename;
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                $url = $location;

                $courierRepository = new CourierRepository();
                $courierRepository->connection = new DatabaseConnection();
                $success = $courierRepository->addCourier(strtoupper($reference), strtoupper($object), $edition_date, $url);
                if ($success == 0) {
                    echo '<script type="text/javascript">
                            addingErrorAlert()
                        </script>';
                } else {
                    echo '<script type="text/javascript">
                            addingSuccessAlert()
                        </script>';
                }

            } else {
                echo '<script type="text/javascript">
                            addingErrorAlert()
                   </script>';
            }





        }
    }
    public function courierArchives()
    {
        $courierRepository = new CourierRepository();
        $courierRepository->connection = new DatabaseConnection();
        $couriers = $courierRepository->getCouriers();
        require ('templates/courier/courierArchives.php');
    }
}