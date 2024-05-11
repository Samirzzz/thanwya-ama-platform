<?php
include_once "..\includes\db.php";
require_once '../app/controller/AdminController.php';

$db = Database::getInstance();
	$conn = $db->getConnection();	
    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        // Call the deletecenter function from AdminController
        if (AdminController::deletecenter($cid, $conn)) {
            // Successful deletion, redirect to a suitable page
            header("Location: adminsearch.php");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            // Error occurred during deletion
            echo "Error deleting center.";
        }
    }
?>
