<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\SessionController.php';
$sessioncntrl = new SessionController();
$db = Database::getInstance();
$conn = $db->getConnection();	


if (isset($_GET['sessid'])) {
    $sessid = $_GET['sessid'];

    

    if ($sessioncntrl->deleteSession($sessid)) {
       
        header("location:./viewSessions.php");
    } else {
        echo "Error deleting session: " . $conn->error;
    }
} else {
    echo "Invalid session ID.";
}
?>
