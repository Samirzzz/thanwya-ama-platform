<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Tabeeby</title>
</head>
<?php
include_once '..\includes\navigation.php';

    $db = Database::getInstance();
	$conn = $db->getConnection();	



?>
<body >


<div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back <?php  echo $_SESSION["email"] ?></h3>
                
            </div>
            <div class="cards">
                <div class="card card-1">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-shopping-bag-2-line"></i></span>
                        <span>Teachers</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from teacher";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>
                    <div class="chart">
                        <canvas id="sales"></canvas>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-gift-line"></i></span>
                        <span>Sales</span>
                    </div>
                   
                         </i></h3>
                    <div class="chart">
                        <canvas id="orders"></canvas>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-handbag-line"></i></span>
                        <span>Appointments</span>
                    </div>
                    <h3 class="card--value"> <i class="ri-arrow-up-circle-fill up"></i></h3>
                    <h5 class="more"></h5>
                    <div class="chart">
                        <canvas id="products"></canvas>
                    </div>
                </div>
                <div class="card card-4">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-user-line"></i></span>
                        <span>student</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from student";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>
                    <div class="chart">
                        <canvas id="customers"></canvas>
                    </div>
                </div>
            </div>
            <div class="target-vs-sales--container">
                <div class="section--title">
                    <h3 class="title">Schedule</h3>
                    <div class="sales--value">
                        <div class="target">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Finished <span>&nbsp; </span>
                        </div>
                        <div class="current">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Not  <span>&nbsp;Finished</span>
                        </div>
                    </div>
                </div>
                <div class="target--vs--sales">
                    <canvas id="tarsale"></canvas>
                </div>
            </div>
            <div class="table">
                <div class="section--title">
                    <h3 class="title">Recent students</h3>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>student name</th>
                            <th>student ID</th>
                            <th>Age</th>
                            <th>Mobile Number</th>
                            <th>Center</th>
                            <th>Next time Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
$sql = "SELECT
student.firstname,
student.lastname,
student.age,
student.sid,

student.number
FROM
student

-- JOIN
-- medications ON patient.Pid=medications.Pid  

";
$result = mysqli_query($conn,$sql);
while ($row = $result->fetch_array()) {
    echo '<tr>';

    echo '<td>'.$row["firstname"]. '</td>';
    echo '<td>'.$row["sid"].    '</td>';
    echo '<td>'.$row["age"].'</td>';
    echo '<td>'.$row["number"].'</td>';
   echo '</tr>';
    
}


                             ?>
                          
                        
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
</body>
</html>