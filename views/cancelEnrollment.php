<?php
session_start();
require_once '../app/controller/SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();
$sessioncntrl =new SessionController();
if(isset($_GET['enrollment_id']))
{
$enrollment_id=$_GET['enrollment_id'];
}
$studentId = $sessioncntrl->getStudentID( $_SESSION["sid"]);
echo "student id : ".$studentId;
echo "enrollment id : ".$enrollment_id;
$sessioncntrl->cancelEnrollment($enrollment_id);
header("location:./studentindex.php");

?>