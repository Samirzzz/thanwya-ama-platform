<?php
require_once '../app/Model/User.php';
include_once '..\includes\db.php';


class Student extends User{
	public $firstname;
	public $lastname;
	public $age;
	public $gender;
	public $address;
	public $number;
	public $uid;
	public $sid;
	public $image;
	public $db;
	public $conn;


	
	function __construct($id)
	{
		$this->db = Database::getInstance();
		$this->conn = $this->db->getConnection();	
    $sql = "SELECT user_acc.uid,user_acc.image, user_acc.email,user_acc.usertype_id, student.firstname, student.lastname,student.gender,
	student.address,student.number,student.age,student.uid,student.sid 
	FROM student 
	JOIN user_acc ON user_acc.uid = student.uid where user_acc.uid=".$id;
			$result = mysqli_query($this->conn,$sql);
	        if($row=mysqli_fetch_array($result)){
				parent::__construct($row["uid"]);
					$this->sid=$row["sid"];
	             	$this->firstname=$row["firstname"];
	             	$this->lastname=$row["lastname"];
	 				$this->uid=$row["uid"];
					// $this->image=$row['image'];
					$this->address=$row['address'];
					$this->gender=$row['gender'];
					$this->number=$row['number'];



	
	}

	


}
public function getFirstName()
	{
		return $this->firstname;
	}
 public function getLastName() {
		return $this->lastname;
	  }
public function getuid() {
		return $this->uid;
	  }
public function getSid() {
		return $this->sid;
	  }
public function getAddress() {
		return $this->address;
	  }
public function getGender() {
		return $this->gender;
	  }
public function getNumber() {
		return $this->number;
	  }


}
?>