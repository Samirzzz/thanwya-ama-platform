<?php
session_start();


include_once "../includes/db.php";
require_once '../app/Model/User.php';
require_once '../app/Model/Student.php';
require_once '../app/Model/Teacher.php';
require_once '../app/Model/Center.php';
require_once '../app/Model/UserType.php';
require_once '../app/Model/Pages.php';
require_once '../app/controller/UserController.php';
require_once '../app/controller/StudentController.php';
require_once '../app/controller/TeacherController.php';
require_once '../app/controller/CenterController.php';

        $UserType = $_SESSION["type"];
        $userID=$_SESSION['ID'];
        $db = Database::getInstance();
        $conn = $db->getConnection();
        if ($UserType == 'student') {
            $deletestudent=StudentController::deleteStudent($userID,$conn);
            if($deletestudent)
            {
                $deleteuser=UserController::deleteUser($userID,$conn);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        } elseif ($UserType == 'teacher') {
            $deleteteacher=DrController::deleteTeacher($userID,$conn);
            if($deleteteacher)
            {
                $deleteuser=UserController::deleteUser($userID,$conn);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        }elseif ($UserType == 'center') {
            $deletecenter=CenterController::deleteCenter($userID,$conn);
            if($deletecenter)
            {
                $deleteuser=UserController::deleteUser ($userID,$conn);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        }

       
    
    ?>