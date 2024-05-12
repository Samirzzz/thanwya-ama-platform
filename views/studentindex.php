<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/adminn.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>manaseti</title>
</head>
<?php
include_once '../includes/navigation.php';
require_once '../app\controller\SessionController.php';
        $db = Database::getInstance();
        $conn = $db->getConnection();
$sessioncntrl =new SessionController();
$studentId = $sessioncntrl->getStudentID( $_SESSION["sid"]);
echo "student id : ".$studentId;
echo "session id : ".$appID;


?>
<style>
    .target-vs-sales--container {
        background-image: url('../public/images/b3.jpg');
        background-size: cover;
        background-position: center;
        padding: 20px;
    }

    .sales--value {
        display: block;
        text-align: center;
        padding: 20px;
    }

    .sales--value h3,
    .sales--value p {
        margin: 0;
        color: #008000; 
    }

    .sales--value h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #008000;
    }

    .sales--value p {
        font-size: 18px;
        line-height: 1.5;
        margin-bottom: 10px;
        text-align: justify;
    }

    .sales--value form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sales--value input {
        width: 100%;
        margin-bottom: 10px;
    }

    .target--vs--sales {
        text-align: center;
        padding: 20px;
    }

    .target--vs--sales .section--title {
        margin-bottom: 20px;
    }

    .target--vs--sales h3 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #008000; 
    }

    .sales--value {
        text-align: left;
        padding: 20px;
    }

    .sales--value p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
        text-align: justify;
        color: #008000; 
    }

    .sales--value form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .sales--value input {
        width: 100%;
        margin-bottom: 10px;
    }

    .sales--value form {
        display: flex;
        flex-direction: row; 
        align-items: flex-start;
        gap: 10px;
    }

    .sales--value input {
        width: 50%; 
        padding: 10px;
        box-sizing: border-box; 
    }

    .section--title h3 {
        font-size: 28px;
        font-weight: bold;
        color: #008000; 
    }

    .sales--value input[type="submit"] {
        width: 50%; 
        padding: 10px;
        background-color: #008000; 
        color: #fff; 
        border: none;
        cursor: pointer;
    }

    body {
        font-family: 'Arial', sans-serif; 
        background-color: white;
        margin: 0;
        padding: 0;
    }

    .main--container {
        font-family: 'Times New Roman', serif; 
        color: #333;
    }
    .uppercase-text {
        text-transform: uppercase;
    }
</style>


<body class="body">


    <div class="main--container">
        <div class="section--title">
            <h3 class="title">HOME</h3>

        </div>

        <div class="target-vs-sales--container">
            <div class="section--title">
                <div class="sales--value">
                    <h3 class="uppercase-text">Welcome! <br> <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></h3>

                    <p>Explore your session history and upcoming appointments effortlessly! Keep track of all your past and future 

                        
                        <a href="#" class="non-style-link"><b>"Sessions"</b> </a>sections<br>
                         and get insights into the expected arrival times of your educators."<br><br>
                    </p>
            
                    <h3>Channel a Teacher Here</h3>
                    <form action="schedule.php" method="post" style="display: flex">

                        <input type="search" name="search" class="input-text "
                            placeholder="Search Teacher and We will Find The Session Available" list="Teacher"
                            style="width:45%;">&nbsp;&nbsp;
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                </div>
            </div>
            <div class="target--vs--sales">
                <canvas id="tarsale"></canvas>
            </div>
        </div>
        <div class="table">
            <div class="section--title">
                <h3 class="title">Upcoming sessions</h3>
                <div></div>
            </div>
            <table>
                <thead>
                <tr>
      
                        <th>Date</th>
                        <th>Time</th>
                        <th>Teacher</th>
                       
                        <th>Center</th>
                        <th>Price</th>
                        <th>Actions</th>

     
  </tr>
 <!-- <?php $sessioncntrl->viewStudentsessions($studentId);?> -->
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>
    </div>
    </section>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sales.js"></script>
    <script src="assets/js/orders.js"></script>
    <script src="assets/js/products.js"></script>
    <script src="assets/js/customers.js"></script>
    <script src="assets/js/tarsale.js"></script>
    <footer>
    <?php
    // include_once "../includes/footer.php";
    ?>
   </footer>
</body>

</html>