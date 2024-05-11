<link rel="stylesheet" href="../public/css/clive.css">
<style>
        [id^="plink"] {
            display: none;
        }
    #search-bar {
        display: flex;
        margin-top: 20px;
    }

    #search-bar select {
        margin-right: 10px;
        padding: 5px;
    }

    #search-bar input[type="text"] {
        padding: 5px;
        flex: 1;
    }

    #search-results {
        margin-top: 10px;
    }

    #search-results table {
        width: 180%;
        border-collapse: collapse;
    }

    #search-results table th,
    #search-results table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    #search-results table th {
        background-color: #f5f5f5;
    }

    #search-results a {
        text-decoration: none;
        color: black;
        display: block;
    }

</style>
<?php
require_once '../app/Model/Center.php';
require_once '../app/controller/CenterController.php';
require_once '../app/controller/StudentController.php';
require_once '../app/controller/TeacherController.php';
require_once '../app/controller/AdminController.php';


$db = Database::getInstance();
$conn = $db->getConnection();	



if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];

    if ($usertype == 'center') {
        $viewcenter = CenterController::centerSearch($search,$conn);

                   
                   if (!empty($viewcenter)) {
                       echo '<div id="search-result">';
                       echo '<table>';
                       echo '<tr>';
                       echo '<th>ID</th>';
                       echo '<th>Email</th>';
                       echo '<th>Name</th>';
                       echo '<th>Number</th>';
                       echo '</tr>';
                       
                       foreach ($viewcenter as $center) {
                         
                           
                           echo '<tr>';
                           echo '<td><a  id="pop' .  $center->cid . '" href="#plink' . $center->cid . '">' . $center->cid . '</a></td>';
                           echo '<td><a  id="pop2' . $center->cid . '" href="#plink' . $center->cid . '">' . $center->email . '</a></td>';
                           
                           echo '<td><a  id="pop1' . $center->cid . '" href="#plink' . $center->cid . '">' . $center->cname . '</a></td>';
                           echo '<td><a  id="pop3' . $center->cid . '" href="#plink' . $center->cid . '">' . $center->cnumber . '</a></td>';
                           echo '</tr>';
                           
                           echo '<form action="" method="post">';
                           echo '<div id="plink'. $center->cid . '">';
                           echo '<div class="container mt-5 d-flex justify-content-center">';
                           echo '<div class="card p-3" style="width: 300px;"> ';
                           echo '<div class="d-flex align-items-center">';
                           echo '<div class="ml-3 w-100">';
                           echo '<h4 class="mb-0 mt-0">' . $center->cname . '</h4>';
                           echo '<span>' . $center->email . '</span>';
                           echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                           echo '<div class="d-flex flex-column">';
                           echo '<span class="articles">Teachers</span>';
                           echo '<span class="number1">38</span>';
                           echo '</div>';
                          echo '<div class="d-flex flex-column">';
                           
                           echo '</div>';
                           echo '<div class="d-flex flex-column">';
                         
                           echo '</div>';
                           echo '</div>';
                           echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                           
                           echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deletecenter.php?cid=' . $center->cid . '">Delete</a></button>';
                           echo  '</form>';
                           echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$center->cid.'">Close</button>';
           
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                       }
           
                       echo '</table>';
                       echo '</div>';
                   } else {
                       echo "No results found.";
                   }
                //    if (isset($_GET['cid'])) {
                //     $cid = $_GET['cid'];
                //     if (isset($_POST["deletee"])) {
                
                //     $sql = "DELETE FROM clinic WHERE cid = '$cid'";
                //     $conn->query($sql);
                //     }
                // } 
    }
                 elseif ($usertype == 'student') {
                    $viewstudents =StudentController::studentSearch($search,$conn);
    if (!empty($viewstudents)) {
        echo '<div id="search-results">';
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Email</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '</tr>';
        foreach ($viewstudents as $student) {
            echo '<tr>';
                    echo '<td><a  id="pop' . $student->uid . '" href="#plink' . $student->uid . '">' . $student->sid . '</a></td>';
                    echo '<td><a  id="pop1' . $student->uid . '" href="#plink' . $student->uid . '">' . $student->email . '</a></td>';
                    echo '<td><a  id="pop2' . $student->uid . '" href="#plink' . $student->uid . '">' . $student->firstname . '</a></td>';
                    echo '<td><a  id="pop3' . $student->uid . '" href="#plink' . $student->uid . '">' . $student->lastname . '</a></td>';
                    echo '</tr>';
                       
                                       echo '<div id="plink'. $student->uid . '">';
                                       echo '<div class="container mt-5 d-flex justify-content-center">';
                                       echo '<div class="card p-3" style="width: 300px;"> ';
                                       echo '<div class="d-flex align-items-center">';
                                       echo '<div class="ml-3 w-100">';
                                       echo '<h4 class="mb-0 mt-0">' . $student->firstname . '</h4>';
                                       echo '<span>' . $student->lastname  . '</span>';
                                       echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                       echo '<div class="d-flex flex-column">';
                                       echo '<span class="articles">student Mail</span>';
                                       echo '<span class="number1">'.$student->email .'</span>';
                                       echo '</div>';
                                      
                                       echo '<div class="d-flex flex-column">';
                                     
                                       echo '</div>';
                                       echo '</div>';
                                       echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                       
                                       echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deletestudent.php?uid=' .$student->uid . '">Delete</a></button>';
                                       echo  '</form>';
                                       echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$student->sid.'">Close</button>';
                       
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                   }
                       
                                   echo '</table>';
                                   echo '</div>';
                               } else {
                                   echo "No results found.";
                               }
                              
                 
                } elseif ($usertype == 'teacher') {
                    

                    $viewteachers = TeacherController::teacherSearch($search,$conn);
                    if (!empty($viewteachers)) {
                        echo '<div id="search-results">';
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Email</th>';
                        echo '<th>First Name</th>';
                        echo '<th>Last Name</th>';
                        echo '</tr>';
                        foreach ($viewteachers as $teacher) {
                            echo '<tr>';
                                    echo '<td><a  id="pop' . $teacher->uid . '" href="#plink' . $teacher->uid . '">' . $teacher->teacherId . '</a></td>';
                                    echo '<td><a  id="pop1' . $teacher->uid . '" href="#plink' . $teacher->uid . '">' . $teacher->email . '</a></td>';
                                    echo '<td><a  id="pop2' . $teacher->uid . '" href="#plink' . $teacher->uid . '">' . $teacher->firstname . '</a></td>';
                                    echo '<td><a  id="pop3' . $teacher->uid . '" href="#plink' . $teacher->uid . '">' . $teacher->lastname . '</a></td>';
                                    echo '</tr>';
                                       
                                                       echo '<div id="plink'. $teacher->uid . '">';
                                                       echo '<div class="container mt-5 d-flex justify-content-center">';
                                                       echo '<div class="card p-3" style="width: 300px;"> ';
                                                       echo '<div class="d-flex align-items-center">';
                                                       echo '<div class="ml-3 w-100">';
                                                       echo '<h4 class="mb-0 mt-0">' . $teacher->firstname . '</h4>';
                                                       echo '<span>' . $teacher->lastname  . '</span>';
                                                       echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                                       echo '<div class="d-flex flex-column">';
                                                       echo '<span class="articles">student Mail</span>';
                                                       echo '<span class="number1">'.$teacher->email .'</span>';
                                                       echo '</div>';
                                                      
                                                       echo '<div class="d-flex flex-column">';
                                                     
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                                       
                                                       echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deleteteacher.php?uid=' .$teacher->uid . '">Delete</a></button>';
                                                       echo  '</form>';
                                                       echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$teacher->uid.'">Close</button>';
                                       
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                   }
                                       
                                                   echo '</table>';
                                                   echo '</div>';
                                               } else {
                                                   echo "No results found.";
                                               }
                                              
     
                                            }
    }




?>

<script>
    $(document).ready(function () {
        <?php
        foreach ($viewcenter as $center) {
            echo '$("#pop' . $center->cid . ', #pop1' . $center->cid . ', #pop2' . $center->cid . ', #pop3' . $center->cid . '").click(function () {';
            echo '$("#plink' . $center->cid . '").show();';
            echo '});';

            echo '$("#close' . $center->cid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $center->cid . '").hide();';
            echo '});';
        }
        ?>
    });
</script>
<script>
    $(document).ready(function () {
        <?php
        
        foreach ($viewstudents as $student) {
            echo '$("#pop' . $student->uid . ', #pop1' . $student->uid . ', #pop2' . $student->uid . ', #pop3' . $student->uid . '").click(function () {';
            echo '$("#plink' . $student->uid . '").show();';
            echo '});';

            echo '$("#close' . $student->uid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $student->uid . '").hide();';
            echo '});';
        }
       
        ?>
    });
    
</script>
<script>
    $(document).ready(function () {
        <?php
        
        foreach ($viewteachers as $teacher) {
            echo '$("#pop' . $teacher->uid . ', #pop1' . $teacher->uid . ', #pop2' . $teacher->uid . ', #pop3' . $teacher->uid . '").click(function () {';
            echo '$("#plink' . $teacher->uid . '").show();';
            echo '});';

            echo '$("#close' . $teacher->uid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $teacher->uid . '").hide();';
            echo '});';
        }
       
        ?>
    });
    
</script>

</html>