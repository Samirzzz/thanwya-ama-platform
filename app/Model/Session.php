<?php
 require_once '../app/Model/Center.php';
include_once '..\includes\db.php';
class Session extends Center
{
    public $db;
    public $conn;
    public $date, $time, $status, $price, $teacherId, $centerId, $studentId;
	

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

  
}
?>