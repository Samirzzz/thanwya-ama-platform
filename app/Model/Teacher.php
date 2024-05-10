<?php
require_once '../app/Model/User.php';
include_once '..\includes\db.php';
class Teacher extends user{
	public $firstname;
	public $lastname;
	public $subject;
	public $educ;
	public $number;
	public $cid;
	public $uid;
	public $image;
	public $db;
	public $conn;
    public $teacherId;

	
	
	function __construct($id)
	{
		$this->db = Database::getInstance();
	$this->conn = $this->db->getConnection();	
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, teacher.firstname, teacher.lastname,teacher.subject,
	teacher.educ,teacher.number,teacher.uid,teacher.Cid,teacher.tid,user_acc.image
	FROM teacher 
	JOIN user_acc ON user_acc.uid = teacher.uid where user_acc.uid=".$id;
			$result = mysqli_query($this->conn,$sql);
	        if($row=mysqli_fetch_array($result))
			{
				parent::__construct($row["uid"]);
				$this->did=$row["tid"];

	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	             	$this->specialization=$row["subject"];
	             	$this->educ=$row["educ"];
	             	$this->number=$row["number"];
	             	$this->cid=$row["cid"];
	 				$this->uid=$row["uid"];
	 				$this->image=$row["image"];
	
	}

	
	}

}
?>