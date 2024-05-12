<?php
include_once '..\includes\navigation.php';
require_once '../app\controller\SessionController.php';
$sessioncntrl =new SessionController();
$sub =$sessioncntrl->bookingOptions();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="enrollment.php" method="get" id="subjectForm" onsubmit="submitForm(event)">
            
        <label for="sub">select a subject</label>
        
        
        <select id="sub" name="subject" onchange="updateFormAndSubmit(event)">
            <option value="">choose</option>
            <?php foreach ($sub as $s) { ?>
                
                <option value="<?php echo $s['subject']; ?>">
                    <?php echo $s['subject']; ?>
                </option>
    <?php } ?>
</select>


<div id='searching'>
<?php
$subUrl = null;

if (isset($_GET['subject'])) {
    $subUrl = $_GET['subject'];
    echo "<h3>" . "searching for : " . $subUrl . " " . "<h3>";
}

?>
    </div>
    </form>


    <div class = 'sessions'>
 <h1>Sessions</h1>
    <table >
        <tr>
            <th>Session's Date</th>
            <th>teacher's Name</th>
            <th>teacher's subject</th>
            <th>Time</th>
            <th>Price</th>
            <th>center</th>
            <th>Actions</th>
           
            
        </tr>


        <?php
        $selectedSubject = isset($_GET['subject']) ? $_GET['subject'] : null;
        $sessioncntrl->getSubjectSessions($selectedSubject);
        ?>
        
    </div>



    <script>
  
    function updateFormAndSubmit(event) {
        event.preventDefault(); 
        var selectedSpecialization = document.getElementById("sub").value;
        document.getElementById("subjectForm").action = "?subject=" + selectedSpecialization;   
        document.getElementById("subjectForm").submit();
    }



      
    </script>

    <style>
       form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
       
 

        table {
            width: 70%;
            border-collapse: collapse;
            margin-left: 350px;
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
        .no-appointments-found {
    margin-left: 40%; 
    margin-top:30px;
    color: red; 
}
    
    </style>
</body>
</html>
