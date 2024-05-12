<?php
 session_start();
require_once '../app\controller\SessionController.php';
$sessioncntrl =new SessionController();
$db = Database::getInstance();
$conn = $db->getConnection();

if(isset($_GET['sessid']))
{
$sessId=$_GET['sessid'];
}
$studentId = $sessioncntrl->getStudentID( $_SESSION["sid"]);
echo "student id : ".$studentId;
echo "session id : ".$sessId;
$sessioncntrl->bookForStudent($studentId,$sessId);
header("location:./enrollment.php");

?>