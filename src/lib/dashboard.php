<?php

namespace Application\Lib\Dashboard;

session_start();

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;
use DateTime;

class DashboardRepository
{
    public DatabaseConnection $connection;

    public function ownTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS ownTodoNumber FROM `todo` 
            WHERE (PERSONAL_ID = ? AND RECIPIENT= ?)  AND `STATUS` = 0"
        );

        $ownTodoNumber = 0;
        $statement->execute([$personal_id, $personal_id]);
        $row = $statement->fetch();
        if (!empty($row['ownTodoNumber'])) {
            $ownTodoNumber = $row['ownTodoNumber'];
        }
        return $ownTodoNumber;
    }

    public function givenTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS givenTodoNumber FROM `todo`
            WHERE  (PERSONAL_ID = ? AND RECIPIENT != ?) AND `STATUS` != 2"
        );
        $givenTodoNumber = 0;
        $statement->execute([$personal_id, $personal_id]);
        $row = $statement->fetch();
        if (!empty($row['givenTodoNumber'])) {
            $givenTodoNumber = $row['givenTodoNumber'];
        }
        return $givenTodoNumber;
    }

    public function receivedTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS receivedTodoNumber FROM `todo` 
            WHERE (PERSONAL_ID != ? AND RECIPIENT = ? ) AND `STATUS` = 0"
        );
        $receivedTodoNumber = 0;
        $statement->execute([$personal_id, $personal_id]);
        $row = $statement->fetch();
        if (!empty($row['receivedTodoNumber'])) {
            $receivedTodoNumber = $row['receivedTodoNumber'];
        }
        return $receivedTodoNumber;
    }

    

    public function MonthlyDOM(): int
    {
        $date = date('Y-m');
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS monthlyDOM FROM `om` 
            WHERE EDITION_DATE LIKE '$date%'"
        );
        $monthlyDOM = 0;
        $row = $statement->fetch();
        if (!empty($row['monthlyDOM'])) {
            $monthlyDOM = $row['monthlyDOM'];
        }
        return $monthlyDOM;
    }


    public function totalDOM(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS totalDOM FROM `om`"
        );
        $totalDOM = 0;
        $row = $statement->fetch();
        if (!empty($row['totalDOM'])) {
            $totalDOM = $row['totalDOM'];
        }
        return $totalDOM;
    }

    public function pendingStages(): int
    {
        $date = Date("Y-m-d");
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(STAGE_ID) as PENDING FROM `stage` WHERE `STARTING_DATE` < ? AND `END_DATE` > ?"
        );
        $statement->execute([$date, $date]);
        $pendingStages= 0;
        $row = $statement->fetch();
        if (!empty($row['PENDING'])) {
            $pendingStages = $row['PENDING'];
        }
        return $pendingStages;
    }

    public function upcomingStages(): int
    {
        $date = Date("Y-m-d");
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(STAGE_ID) as UPCOMING FROM `stage` WHERE `STARTING_DATE` > ?"
        );
        $statement->execute([$date]);
        $upcomingStages= 0;
        $row = $statement->fetch();
        if (!empty($row['UPCOMING'])) {
            $upcomingStages = $row['UPCOMING'];
        }
        return $upcomingStages;
    }


}