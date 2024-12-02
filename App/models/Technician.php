<?php
namespace App\Models;

class Technician extends DB {
    public function getallTechnician() {
        try {

            $query = "SELECT t.*,u.username FROM Technician t left join User u on t.user_id = u.user_id";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting user" . $e->getMessage());
            return[];
        }
        return $result;
    }
}
