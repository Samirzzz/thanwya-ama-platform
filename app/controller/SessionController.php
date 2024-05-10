<?php
 require_once '../app/Model/Session.php';
class SessionController
{
    public $db;
	public $conn;
   public $session;
   public function __construct(){
    $db = Database::getInstance();
	$this->conn = $db->getConnection();
    $this->session=new Session();
  
}
public function getSessionInstance(){

    return  $this->session;
}


public function validateSession($date, $time, $status, $price, $teacherId, $centerId)
{
    $errors = array();

    if (empty($date)) {
        $errors[] = "Date is required";
    }

    if (empty($time)) {
        $errors[] = "Time is required";
    }

    if (empty($status)) {
        $errors[] = "Status is required";
    }
    if (empty($price)) {
        $errors[] = "Price is required";
    }
    if (empty($teacherId)) {
        $errors[] = "Teacher ID is required";
    }
    if (empty($centerId)) {
        $errors[] = "Center ID is required";
    }


    // Date validation
    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($date < $currentDate || $date > $maxAllowedDate) {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    return $errors;
}
public function validateSessionUpdate($date, $time, $price)
{
    $errors = array();

    if (empty($date)) {
        $errors[] = "Date is required";
    }

    if (empty($time)) {
        $errors[] = "Time is required";
    }


    if (empty($price)) {
        $errors[] = "Price is required";
    }

    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($date < $currentDate || $date > $maxAllowedDate) {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    return $errors;
}


public function getCenterID($id)
 {
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, center.cname, center.uid,center.Cid,
    center.cnumber,center.cloc
    FROM center 
    JOIN user_acc ON user_acc.uid = center.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
    
                    $CID=$row["cid"];

    }
    return $CID;

}
public function getTeacherID($id) 
 {
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, teacher.tid, teacher.uid
    FROM teacher 
    JOIN user_acc ON user_acc.uid = teacher.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
    
                    $DID=$row["tid"];

    }
    return $DID;

}


public function getCenterName()
{
    return $_SESSION["cname"];
}

public function getCenterTeachers($cid)
{
    $sql = "select firstname , lastname , tid  from teacher where Cid = '$cid' ";
    $res = mysqli_query($this->conn,$sql);
    $teachers = [];
    while($row=mysqli_fetch_array($res)){
    $teachers [] = [
        'tid' => $row['tid'],
        'firstname'=>$row['firstname'],
        'lastname'=>$row['lastname'],
    ];} 
    return $teachers;
}

public function addSession($date, $time, $status, $price, $teacherId, $centerId, $studentId)
{
    
    $sql = "INSERT INTO appointments (date, time, status, pid, did, cid, price) VALUES ('$date', '$time', '$status', NULL , '$teacherId', '$centerId', '$price')";
    $res = mysqli_query($this->conn, $sql);

    if ($res) {
        $this->session->date=$date;
        $this->session->time=$time;
        $this->session->status=$status;
        $this->session->price=$price;
        $this->session->$teacherId=$teacherId;
        $this->session->$centerId=$centerId;
        $this->session->$studentId=$studentId;
        header("location: ./viewSessions.php");

        
        return true;
    } else {
        return false;
    }
}

public function updateSession($sessionId,$s_date, $s_time, $s_price){
    $sql = "UPDATE sessions SET date = '$s_date', time = '$s_time',  price ='$s_price' WHERE sessid = $sessionId";
    $res = mysqli_query($this->conn, $sql);

    if ($res) {

        $this->session->date=$s_date;
        $this->session->time=$s_time;
       
        $this->session->price=$s_price;
        
        return true;
    } else {
        return false;
    }
}

public function deleteSession($sessionId){
    $sql = "DELETE FROM sessions WHERE sessid = $sessionId";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        
        return true;
    } else {
        return false;
    }
}

public function viewSessions($ID){
    $sql = "SELECT * FROM sessions where Cid =".$ID;
   $result = mysqli_query($this->conn,$sql);
   
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['sessid'] . "</td>";

        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><a href='./editSessions.php?sessid=" . $row['sessid'] . "'>Edit</a> | <a href='./deleteSessions.php?sessid=" . $row['sessid'] . "'>Delete</a></td>";
        $sql2 = "Select cname from center WHERE Cid = '{$row['Cid']}'";
        $res2=mysqli_query($this->conn,$sql2);
        if ($res2->num_rows>0){
            $centerrow = $res2->fetch_assoc();
            echo "<td>" . $centerrow['cname'] . "</td>";
        }
       
    
    
        echo "</tr>";
    }
} else {
    echo "<h1>" ."No sessions found"."</h1" ;
}
$sql2="select cname from sessions where cid = {$ID}";
$res2=mysqli_query($this->conn,$sql2);
if ($res2) {
    $row = mysqli_fetch_assoc($res2);
    $_SESSION['sessionView'] = $row['cname'];
}
}




public function getTeacherSessions($teacherID){ 
    $sql = "SELECT * FROM sessions where tid =".$teacherID;
   $result = mysqli_query($this->conn,$sql);
   
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['sessid'] . "</td>";

        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><a href='./deleteSessions.php?sessid=" . $row['sessid'] . "'>Cancel</a></td>";
        $sql2 = "Select cname from center WHERE Cid = '{$row['Cid']}'";
        $res2=mysqli_query($this->conn,$sql2);
        if ($res2->num_rows>0){
            $crow = $res2->fetch_assoc();
            echo "<td>" . $crow['cname'] . "</td>";
        }
       
    
    
        echo "</tr>";
    }
} else {
    echo "<h1>" ."No sessions found"."</h1" ;
}
$sql2 = "SELECT firstname, lastname FROM teacher WHERE tid = {$teacherID}";
$res2 = mysqli_query($this->conn, $sql2);

if ($res2->num_rows > 0) {
    $row = $res2->fetch_assoc();
    $name=$row['firstname'] . ' ' . $row['lastname'];
    $_SESSION['sessionView'] = $name;
}

}


public function bookingOptions(){
    $sql = "SELECT subject FROM teacher";
    $res = mysqli_query($this->conn, $sql);
    $spec = [];

    while ($row = $res->fetch_assoc()) {
        $spec[] = $row['subject'];
    }

    // Remove duplicates
    $spec = array_unique($spec);

    $spec = array_map(function ($specialization) {
        return ['subject' => $specialization];
    }, $spec);

    return $spec;
}



public function displayErrors($err){
    foreach ($err as $errors)
    {
        echo '<li>' .   $errors  . '</li>' ; 
    }
}

public function getSubjectSessions($specialization){

    $sql = "SELECT
        a.Appid, a.date, a.time, a.price, a.Did, a.Cid,
        d.firstname, d.lastname, d.specialization,
        c.cname
    FROM
        sessions a
    JOIN
        teacher d ON a.Did = d.Did
    JOIN
        center c ON a.Cid = c.Cid
    WHERE
        d.subject = '$specialization' and a.status = 'available' ";


    $result = mysqli_query($this->conn,$sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";   
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>"; 
            echo "<td>" . $row['specialization'] . "</td>"; 
            echo "<td>" . $row['time'] . "</td>";      
            echo "<td>" . $row['price'] . "</td>";     
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td><a href='./patientReservations.php?Appid=" . $row['Appid'] . "'>Book Now </a></td>";
            echo "</tr>";
        }
    } else 
    {
        echo  "<div class='no-appointments-found'><h1>NO APPOINTMENTS FOUND!</h1></div>";
        
    }
    






}   
public function getStudentID($id)
 {
    
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, student.Pid, student.uid
    FROM student 
    JOIN user_acc ON user_acc.uid = student.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
        
    
                    $PID=$row["sid"];

    }
    return $PID;

} 
public function bookForPatient($sid,$sessid)
{
    $sql = "UPDATE sessions SET sid = '$sid',status='reserved' WHERE sessid = $sessid";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        $this->session->pid=$sid;
        return true;
    } 
    else 
    {
        return false;
    }
}
public function viewStudentSessions($sid){
    $sql = "SELECT
    a.Appid, a.date, a.time, a.price, a.Did, a.Cid,
    d.firstname, d.lastname, 
    c.cname
FROM
    sessions a
JOIN
    teacher d ON a.Did = d.Did
JOIN
    center c ON a.Cid = c.Cid
WHERE
    a.sid =".$sid;

    $result = mysqli_query($this->conn,$sql);
    
    if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         echo "<tr>";
         echo "<td>" . $row['date'] . "</td>";
         echo "<td>" . $row['time'] . "</td>";
        
         echo "<td>" . $row['firstname'] ." ". $row['lastname']. "</td>";
        
         echo "<td>" . $row['cname'] . "</td>";
         echo "<td>" . $row['price'] . "</td>";
         echo "<td><a href='./cancelReservation.php?sessid=" . $row['sessid'] . "'>Cancel</a> </td>";
        //  $sql2 = "Select cname from clinic WHERE Cid = '{$row['Cid']}'";
        //  $res2=mysqli_query($this->conn,$sql2);
        //  if ($res2->num_rows>0){
        //      $clincirow = $res2->fetch_assoc();
        //      echo "<td>" . $clincirow['cname'] . "</td>";
        //  }
        
     
     
         echo "</tr>";
     }
 } else {
     echo "<h1>" ."No appointments found"."</h1" ;
 }

}


public function cancelReservation($sid,$sessid)
{
    $sql = "UPDATE sessions SET sid = NULL , status='available' WHERE sessid = $sessid";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        
        return true;
    } 
    else 
    {
        return false;
    }

}
public function retreivedoc()
{
    $sql = "SELECT * FROM teacher where cid =0";
    $result = mysqli_query($this->conn,$sql);
    
    if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc())
      {
         echo "<tr>";
         echo "<td>" . $row['tid'] . "</td>";
         echo "<td>" . $row['firstname'] . " ".$row['lastname']. "</td>";
         echo "<td>" . $row['subject'] . "</td>";
         echo "<td><a href='./assigndoctor.php?tid=" . $row['tid'] . "'>Assign</a></td>";
         echo "</tr>";
     }
 } else 
 {
     echo "<h1>" ."No doctors found"."</h1" ;
 }
}
public function assignDoc($cid,$did){
    $sql = "UPDATE teacher SET cid = '$cid' WHERE tid ='$did'";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        
        return true;
    } 
    else 
    {
        return false;
    }
}






}



?>

