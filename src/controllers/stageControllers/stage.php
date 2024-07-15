<?php

namespace Application\Controllers\StageControllers\Stage;

require_once ('src/model/stage.php');
require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Stage\StageRepository;

class Stage 
{
    public function StagesList() 
    {
        $stageRepository = New StageRepository;
        $stageRepository->connection = new DatabaseConnection();
        $pendingStages = $stageRepository->getPendingStages();
        $upcomingStages = $stageRepository->getUpcomingStages();
        $completedStages = $stageRepository->getCompletedStages();
        require('templates/stage/stage.php');
    }

    public function stageAddingForm()
    {
        require('templates/stage/addingForm.php');
    }
    
    public function addStage(array $input)
    {
        require('templates/stage/addingForm.php');
        if ($input !== null) {
            $name = null;
            $city = null;
            $entity = null;
            $participants = null;
            $starting_date = null;
            $end_date = null;
            if (
                !empty($input['name']) && !empty($input['city']) && !empty($input['entity'])
                && !empty($input['participants']) && !empty($input['starting_date']) && !empty($input['end_date'])
            ) {      
                $name = $input['name'];
                $city = $input['city'];
                $entity = $input['entity'];
                $participants = $input['participants'];
                $starting_date = $input['starting_date'];
                $end_date = $input['end_date'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $stageRepository = New StageRepository;
            $stageRepository->connection = new DatabaseConnection();
            $success = $stageRepository->addStage(strtoupper($name), strtoupper($city), strtoupper($entity), $participants, $starting_date, $end_date);
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    addingSuccessAlert()
                    </script>';
            }
        }
    }

    public function stageUpdatingForm(int $stage_id)
    {
        $stageRepository = New StageRepository;
        $stageRepository->connection = new DatabaseConnection();
        $stage = $stageRepository->getStagebyId($stage_id);
        require('templates/stage/updatingForm.php');
        
    }
    public function updateStage(array $input, int $stage_id)
    {
        $stageRepository = New StageRepository;
        $stageRepository->connection = new DatabaseConnection();
        $stage = $stageRepository->getStagebyId($stage_id);
        require('templates/stage/updatingForm.php');
        if ($input !== null) {
            $name = null;
            $city = null;
            $entity = null;
            $participants = null;
            $starting_date = null;
            $end_date = null;
            if (
                !empty($input['name']) && !empty($input['city']) && !empty($input['entity'])
                && !empty($input['participants']) && !empty($input['starting_date']) && !empty($input['end_date'])
            ) {      
                $name = $input['name'];
                $city = $input['city'];
                $entity = $input['entity'];
                $participants = $input['participants'];
                $starting_date = $input['starting_date'];
                $end_date = $input['end_date'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $stageRepository = New StageRepository;
            $stageRepository->connection = new DatabaseConnection();
            $success = $stageRepository->updateStage(strtoupper($name), strtoupper($city), strtoupper($entity), $participants, $starting_date, $end_date, $stage_id);
            if (!empty($input['laureats']))
            {
                $laureats = $input['laureats'];
                $success2 = $stageRepository->updateLaureats($laureats, $stage_id);
            }
            if ($success == 0 && $success2 == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    addingSuccessAlert()
                    </script>';
            }
        }
    }
    public function sendDeletePopup(int $stage_id)
    {
        $stageRepository = New StageRepository;
        $stageRepository->connection = new DatabaseConnection();
        $pendingStages = $stageRepository->getPendingStages();
        $upcomingStages = $stageRepository->getUpcomingStages();
        $completedStages = $stageRepository->getCompletedStages();
        require('templates/stage/stage.php');

        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function DeleteStage(int $stage_id)
    {
        $stageRepository = New StageRepository;
        $stageRepository->connection = new DatabaseConnection();
        $pendingStages = $stageRepository->getPendingStages();
        $upcomingStages = $stageRepository->getUpcomingStages();
        $completedStages = $stageRepository->getCompletedStages();
        require('templates/stage/stage.php');
        $success = $stageRepository->deleteStagebyId($stage_id);
        if ($success == 1) {
            echo '<script type="text/javascript">
                deletingSuccessAlert()
            </script>';
        }

    }
}