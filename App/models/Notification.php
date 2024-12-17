<?php
namespace App\Models;

class Notification
{
    protected $db;

    public function __construct($connection)
    {
        $this->db = $connection;
    }


    public function Notification()
    {
        $stmt = $this->db->query('SELECT * FROM notification');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

