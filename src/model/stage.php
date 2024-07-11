<?php

namespace Application\Model\Stage;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Stage
{
    public int $stage_id;
    public string $name;
    public string $city;
    public string $entity;
    public int $participants;
    public ?int $laureats;
    public string $starting_date;
    public string $end_date;
}

class StageRepository
{
    public DatabaseConnection $connection;

    public function addStage(
        string $name,
        string $city, 
        string $entity,
        int $participants,
        string $starting_date,
        string $end_date
    ) : bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `stage`(`NAME`, `CITY`,`ENTITY`,`PARTICIPANTS`, `STARTING_DATE`, `END_DATE`) 
            VALUES (?,?,?,?,?,?)"
        );
        $statement->execute([$name, $city, $entity, $participants, $starting_date, $end_date]);
        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }

    public function getStagebyId(int $stage_id) : Stage
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `stage` WHERE `STAGE_ID` = ?"
        );
        $statement->execute([$stage_id]);
        while ($row = $statement->fetch()){
            $stage = new Stage();
            $stage->stage_id = $row['STAGE_ID'];
            $stage->name = $row['NAME'];
            $stage->city = $row['CITY'];
            $stage->entity = $row['ENTITY'];
            $stage->participants = $row['PARTICIPANTS'];
            $stage->laureats = $row['LAUREATS'];
            $stage->starting_date = $row['STARTING_DATE'];
            $stage->end_date = $row['END_DATE'];
        }
        return  $stage;
    }

    public function getUpcomingStages() : array
    {
        $date = Date("Y-m-d");
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `stage` WHERE `STARTING_DATE` > ?"
        );
        $statement->execute([$date]);
        $stages = [];
        while ($row = $statement->fetch()){
            $stage = new Stage();
            $stage->stage_id = $row['STAGE_ID'];
            $stage->name = $row['NAME'];
            $stage->city = $row['CITY'];
            $stage->entity = $row['ENTITY'];
            $stage->participants = $row['PARTICIPANTS'];
            $stage->laureats = $row['LAUREATS'];
            $stage->starting_date = $row['STARTING_DATE'];
            $stage->end_date = $row['END_DATE'];

            $stages[] = $stage;
        }
        return  $stages;
    }
    public function getCompletedStages() : array
    {
        $date = Date("Y-m-d");
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `stage` WHERE `END_DATE` < ?"
        );
        $statement->execute([$date]);
        $stages = [];
        while ($row = $statement->fetch()){
            $stage = new Stage();
            $stage->stage_id = $row['STAGE_ID'];
            $stage->name = $row['NAME'];
            $stage->city = $row['CITY'];
            $stage->entity = $row['ENTITY'];
            $stage->participants = $row['PARTICIPANTS'];
            $stage->laureats = $row['LAUREATS'];
            $stage->starting_date = $row['STARTING_DATE'];
            $stage->end_date = $row['END_DATE'];

            $stages[] = $stage;
        }
        return  $stages;
    }

    public function getPendingStages() : array
    {
        $date = Date("Y-m-d");
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `stage` WHERE `STARTING_DATE` < ? AND `END_DATE` > ?"
        );
        $statement->execute([$date, $date]);
        $stages = [];
        while ($row = $statement->fetch()){
            $stage = new Stage();
            $stage->stage_id = $row['STAGE_ID'];
            $stage->name = $row['NAME'];
            $stage->city = $row['CITY'];
            $stage->entity = $row['ENTITY'];
            $stage->participants = $row['PARTICIPANTS'];
            $stage->laureats = $row['LAUREATS'];
            $stage->starting_date = $row['STARTING_DATE'];
            $stage->end_date = $row['END_DATE'];

            $stages[] = $stage;
        }
        return  $stages;
    }

    public function deleteStagebyId(int $stage_id) : bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `stage` WHERE `STAGE_ID` = ?"
        );
        $statement->execute([$stage_id]);
        $affectedLines = $statement->rowCount();
        return  $affectedLines == 1;
    }

    public function updateStage( 
        string $name,
        string $city, 
        string $entity,
        int $participants,
        string $starting_date,
        string $end_date, 
        int $stage_id)  : bool 
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `stage` 
            SET
            `NAME` = ?,
            `CITY` = ?,
            `ENTITY` = ?,
            `PARTICIPANTS` = ?,
            `STARTING_DATE` = ?,
            `END_DATE` = ?
            WHERE `STAGE_ID` = ?"
        );
        $statement->execute([$name, $city, $entity, $participants, $starting_date, $end_date, $stage_id]);
        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }

    public function updateLaureats(int $laureats, int $stage_id)  : bool 
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `stage` 
            SET
            `LAUREATS` = ?
            WHERE `STAGE_ID` = ?"
        );
        $statement->execute([$laureats, $stage_id]);
        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }
}
