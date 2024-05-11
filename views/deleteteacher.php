<?php
include_once "..\includes\db.php";
require_once '../app/controller/AdminController.php';

$db = Database::getInstance();
	$conn = $db->getConnection();
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $deleteteacher=AdminController::deleteteacher($uid,$conn);
}

?>
