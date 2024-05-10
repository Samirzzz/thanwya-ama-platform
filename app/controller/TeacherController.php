<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Teacher.php';

class TeacherController
{
    public $db;
    public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    static function teachersearch($value,$conn)  {

        $i=0;
            $teacher=array();
            $sql = "SELECT user_acc.uid, user_acc.email, teacher.firstname, teacher.lastname ,teacher.tid
                                FROM teacher 
                                JOIN user_acc ON user_acc.uid = teacher.uid  
                                WHERE email LIKE '%$value%'";
            $result = mysqli_query($conn,$sql);
    
            while($row=mysqli_fetch_array($result)) {
                $teacher[$i++]=new Teacher($row[0]);
            }	
            return $teacher;
    
        }
        
    
     static function getAllteachers($conn)
    {
        $sql = "SELECT * FROM teacher";
        $teachers = mysqli_query($conn, $sql);
    
        $result = array();
    
        while ($row = mysqli_fetch_assoc($teachers))
         {
            $myObj = new Teacher($row['uid']);
            $myObj->tid = $row['tid'];
            $myObj->firstname = $row['firstname'];
            $myObj->lastname = $row['lastname'];
            $myObj->number = $row['number'];
            $myObj->educ = $row['educ'];
            $myObj->subject = $row['subject'];
    
            $result[] = $myObj;
        }
    
        return $result;
    }
    static function signupTeacher($firstname, $lastname, $number,$educ,$subject,$uid,$conn) 
    {
    
    
        $sql = "INSERT INTO teacher (firstname, lastname, number,educ,subject,uid,cid) VALUES ('$firstname', '$lastname', '$number','$educ','$subject','$uid','0')";
        if(mysqli_query($conn,$sql))
                return true;
            else
                return false;
    
    
    }
    static function editTeacher($firstname, $lastname, $number,$educ,$subject,$uid,$conn)
{
	$sql = "UPDATE teacher Set firstname='$firstname', lastname='$lastname', number='$number', educ='$educ', subject='$subject' WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

}
public static function deleteTeacher($id,$conn)
{
    $sql = "DELETE FROM teacher WHERE uid=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo "Error deleting from 'teacher': " . mysqli_error($conn);

        return false;
    }
}
}
?>