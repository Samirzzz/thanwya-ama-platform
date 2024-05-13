<?php
// include_once '..\includes\navigation.php';
require_once '../app\controller\SessionController.php';
$sessioncntrl = new SessionController();
$db = Database::getInstance();
$conn = $db->getConnection();	
if (isset($_GET['sessid'])) 
{
    $sessid = $_GET['sessid'];
} 

$sessioncntrl->getEnrolled($sessid);
?>
