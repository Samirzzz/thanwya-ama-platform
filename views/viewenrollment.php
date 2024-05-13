<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\SessionController.php';
$sessioncntrl = new SessionController();
$db = Database::getInstance();
$conn = $db->getConnection();	
if (isset($_GET['sessid'])) 
{
    $sessid = $_GET['sessid'];
} 

?>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Number</th>
       <th>Actions</th>  
   </tr>
    </tr>
  </thead>
  <tbody>
      <?php $sessioncntrl->getEnrolled($sessid); ?>
      </tbody>
</table>
