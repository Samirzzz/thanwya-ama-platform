<?php
include_once '../includes/navigation.php';
require_once '../app/Controller/SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();	
session_start();
$Sessioncntrl =new SessionController();


?>
<html>
<head>
    <title></title>
 
</head>
<body>
   <h1 id="h1h1">Showing sessions for: </h1>

    <table >
   
        <tr>
            <th>SESSION ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
            <th>Center</th>
           
        </tr>
     
      <?php 

if ($_SESSION["type"] == 'center') {
   $center_id = $Sessioncntrl->getCenterID($_SESSION["ID"]);
   $Sessioncntrl->viewSessions($center_id);

} else {
   $teacher_id =  $Sessioncntrl->getTeacherID($_SESSION["ID"]);
   $Sessioncntrl->getTeacherSessions($teacher_id);
}
// echo $_SESSION["Cid"] ;
// echo $_SESSION["cname"]; 
// echo$_SESSION["cloc"] ;
// echo $_SESSION["cnumber"]; 
echo $_SESSION["email"];
?>

    </table>
    <input type="hidden" ID='sessionView' value = <?php echo $_SESSION['sessionView'] ?> >
    


    <style>
        /* body {
            
            padding-left: 60px;
            margin-left: 20px;
        } */

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 30px;
            margin-left: 350px;
        }
        h1{
            margin-left: 350px;  
            margin-top: 36px;
             
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
    background-color: #EDE5E5;
}
        .crud-bar{
            width: 80%;
            
            margin-left: 350px;
        }
    </style>

</body>
<script>
    function updateAppViewHeading() {
        var sessionViewValue = '<?php echo $_SESSION['sessionView']; ?>';
        document.getElementById('h1h1').innerText = "Showing sessions for: " + sessionViewValue;
    }

    window.onload = function() {
        updateAppViewHeading();
    };
</script>

</html>