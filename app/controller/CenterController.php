<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Center.php';

class CenterController
{
    public $db;
	public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
   
    static function centersearch($value,$conn)  {
    
        $i=0;
            $center=array();
            $sql = "SELECT user_acc.uid, user_acc.email, center.cid,center.cname, center.cloc ,center.workhrs,center.cnumber
                                FROM center 
                                JOIN user_acc ON user_acc.uid = center.uid  
                                WHERE email LIKE '%$value%'";
            $result = mysqli_query($conn,$sql);
    
            while($row=mysqli_fetch_array($result)) {
                $center[$i++]=new Center($row[0]);
            }	
            return $center;
    
        }
    
        
        static function signupCenter($cname,$cloc,$cnumber,$uid,$conn) 
    {
    
        $sql = "INSERT INTO center (cname,cloc,cnumber,uid) VALUES ('$cname','$cloc','$cnumber','$uid')";
        if(mysqli_query($conn,$sql))
                return true;
            else
                return false;
    
    
    }

    static function editCenter($cname,$cloc,$cnumber,$uid,$conn)
    {
        $sql = "UPDATE center Set cname='$cname', cloc='$cloc', cnumber='$cnumber' WHERE uid='$uid'";
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
    public static function deleteCenter($id,$conn)
    {
        $sql = "DELETE FROM center WHERE uid=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            echo "Error deleting from 'center': " . mysqli_error($conn);

            return false;
        }
    }
    
}
?>