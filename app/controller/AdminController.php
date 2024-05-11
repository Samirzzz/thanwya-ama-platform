<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Admin.php';
class AdminController{
	public $aid;
	public $name;
	public $uid;
	public $db;
    public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
	static function deletestudent($id,$conn){
		$sql = "DELETE FROM student WHERE uid = $id";
    if (mysqli_query($conn,$sql)) {
		$sql = "DELETE FROM user_acc WHERE uid = $id";
		if (mysqli_query($conn,$sql)){
			header("location:adminsearch.php");
	
		} else {
			echo "Error deleting student: " . $conn->error;
		}
    } else {
        echo "Error deleting : " . $conn->error;
    }
	
    }
	static function deleteteacher($id, $conn) {
		$sql = "SELECT tid FROM teacher WHERE uid = $id";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			$row = mysqli_fetch_assoc($result);
	
			if ($row) {
				$tid = $row['tid'];
	
				$sql = "DELETE FROM sessions WHERE tid = $tid";
				if (mysqli_query($conn, $sql)) {
					$sql = "DELETE FROM teacher WHERE uid = $id";
					if (mysqli_query($conn, $sql)) {
						$sql = "DELETE FROM user_acc WHERE uid = $id";
						if (mysqli_query($conn, $sql)) {
							header("location:adminsearch.php");
							exit();
						} else {
							echo "Error deleting user account: " . $conn->error;
						}
					} else {
						echo "Error deleting teacher: " . $conn->error;
					}
				} else {
					echo "Error deleting sessions: " . $conn->error;
				}
			} else {
				echo "teacher not found.";
			}
		} else {
			echo "Error fetching teacher details: " . $conn->error;
		}
	}
	
static function deletecenter($id,$conn){
	$sql_sessions = "DELETE FROM sessions WHERE tid IN (SELECT tid FROM teacher WHERE Cid = $id)";

    $sql_teacher = "DELETE FROM teacher WHERE Cid = $id";
    $sql_center = "DELETE FROM center WHERE Cid = $id";
    $sql_user_acc = "DELETE FROM user_acc WHERE uid = $id";

   
		if (mysqli_query($conn, $sql_sessions)) {
            if (mysqli_query($conn, $sql_teacher)) {
                if (mysqli_query($conn, $sql_user_acc)) {
                    if (mysqli_query($conn, $sql_center)) {
                        header("location: adminsearch.php");
                        exit(); 
                    } else {
                        throw new Exception("Error deleting center: " . mysqli_error($conn));
                    }
                } else {
                    throw new Exception("Error deleting user account: " . mysqli_error($conn));
                }
            } else {
                throw new Exception("Error deleting teacher: " . mysqli_error($conn));
            }
        } else {
            throw new Exception("Error deleting sessions: " . mysqli_error($conn));
        }
    } 

function addpage($name,$la,$icon,$class){
	$sql_pages = "INSERT INTO pages (name, linkaddress, icons,class) VALUES ('$name', '$la', '$icon','$class')";
    $res = mysqli_query($this->conn, $sql_pages);
	if ($res) {
		header("Location: addpage.php");
	} else {
		echo "Error inserting data into the pages table: ";
	
	 }
}




}