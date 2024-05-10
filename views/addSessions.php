<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();	
$sessioncntrl =new SessionController();

$errors = array();
$center_id = $sessioncntrl->getCenterID($_SESSION["ID"]);
echo( "center id is ---------- ".$center_id);
$teachers = $sessioncntrl->getCenterTeachers($center_id);




if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $s_date = htmlspecialchars($_POST['date']);
    $s_time = htmlspecialchars($_POST['time']);
    $s_status = htmlspecialchars($_POST['status']);
    $s_price = htmlspecialchars($_POST['price']);
    $s_tid =htmlspecialchars($_POST['teacherid']);
    $s_cid = $sessioncntrl->getCenterID($_SESSION["ID"]);
    
    $errors = $sessioncntrl->validateSession($s_date, $s_time, $s_status,$s_price, $s_tid, $s_cid);

    if (count($errors) === 0) {
      
        if ($sessioncntrl->addSession($s_date, $s_time, $s_status,$s_price, $s_tid, $s_cid, $s_sid)) {
            echo "Form submitted successfully!";
            header("location: ./viewSessions.php");
            
            
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
   
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/addevent.css">
    <title>session Form</title>
    <style>
   
    </style>
</head>
<body>

   <form action="" method="post" name="addsesssionform" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time">
    <br>

    <br>

    <br>
    <label for="di">teacher</label>
     <select id="ti" name="teacherid">
        <?php foreach ($teachers as $doctor) { ?>
            <option value="<?php echo $doctor['tid']; ?>">
                <?php echo $doctor['firstname'] . ' ' . $doctor['lastname']; ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <br>
    <br>
    <label for="ci">center's id</label>
    <input type="text" placeholder="Enter center's id" id="ci" name="centerid" value = "<?php echo $center_id ."           ". "( ".$sessioncntrl->getCenterName()." )"  ;?>">
    <br>
    <label for="s">Status</label>
<select id="s" name="status">
    <option value="available">Available</option>
    <option value="reserved">reserved</option>
</select>
    <br>
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter the price" id="p" name="price">
    <br>
  
    <input type="submit" id="submit" name="submit" value="submit">
    <span class = "error">
    <?php $sessioncntrl->displayErrors($errors) ?>
</span>
   </form>




<script>
    function validateForm() {
        var dateInput = document.getElementById("d");
        var currentDate = new Date();
        var maxAllowedDate = new Date();
        maxAllowedDate.setDate(maxAllowedDate.getDate() + 45); // 1.5 months ahead

        if (dateInput.value === "") {
            alert("Date is required");
            return false;
        }

        var selectedDate = new Date(dateInput.value);
        if (selectedDate < currentDate || selectedDate > maxAllowedDate) {
            alert("Date must be between today and 1.5 months ahead.");
            return false;
        }
    }
</script>
</body>
</html>
