<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/model/studentModel.php';
session_start();

class studentController{

    function regStudent(){
        $student1 = new studentModel();
        $student1->email = $_POST['email'];
        $student1->username = $_POST['username'];
        $student1->password = $_POST['password'];
        $student1->matricid = $_POST['matricid'];
        $count = $student1->check();
        if($count == true){
            $message = "The account already existed!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $student = new studentModel();
            $student->email = $_POST['email'];
            $student->username = $_POST['username'];
            $student->password = $_POST['password'];
            $student->fname = strtoupper($_POST['fname']);
            $student->matricid = strtoupper($_POST['matricid']);
            $student->phone = $_POST['phone'];
            $student->bod = $_POST['bod'];
            $student->gender = $_POST['gender'];
            $student->faculty = $_POST['faculty'];
            $student->program = $_POST['program'];
            $student->yos = $_POST['yos'];
            $student->status = "1";
            $student->join_date = date('Y-m-d');
            $count = $student->addStudent();
            if($count > 0){
                $message = "Successful Register Student!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../';</script>";
            
            }
            else{
                $message = "There a problem!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../';</script>";
            }
        }
    }
    
    function login(){
        $student = new studentModel();
        $student->username = $_POST['username'];
        $student->password = $_POST['password'];
        $count = $student->validate();
        if($count == true){
            if($_POST['password'] == "12345"){
                $username = $_POST['username'];
                $_SESSION['username']=$username;
                $message = "Please Change Your Password!";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'view/changePassword.php';</script>";
            }
            else{
            $username = $_POST['username'];
            $_SESSION['username']=$username;
            $message = "Welcome!";
		      echo "<script type='text/javascript'>alert('$message');
		      window.location = 'view/dashboard.php';</script>";
            }
            
        }
        else { 
            $message = "Wrong Login Credentials!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/tutor/view/login_tutor.php';</script>";
        }
    }
    
    function getStudentInfo(){
        $student = new studentModel();
        return $student->fullName($_SESSION['username']);
    }
    
    /*function changePass(){
        if($_POST['password'] == $_POST['password1']){
            $staff = new staffModel();
            $staff->username = $_SESSION['username'];
            $staff->password = $_POST['password'];
            if($staff->changePassword()){
                $message = "Welcome!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/site/index.php';</script>";
            }
        }
        else{
            $message = "Wrong Login Credentials!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/index.php';</script>";
        } 
    }
    
    function getfullName(){
        $staff = new staffModel();
        return $staff->fullName($_SESSION['username']);
    }
    
    function edit(){
        $staff = new staffModel();
        $staff->username = $_POST['username'];
        $staff->ic = $_POST['ic'];
        $staff->email = $_POST['email'];
        $staff->phone = $_POST['phone'];
        if($staff->edit()){
            $message = "Successful Updatee!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../site/profile.php';</script>";
        }
    }

    function editt(){
        $staff = new staffModel();
        $staff->username = $_POST['username'];
        $staff->ic = $_POST['ic'];
        $staff->email = $_POST['email'];
        $staff->phone = $_POST['phone'];
        if($staff->edit()){
            $message = "Successful Updatee!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../site2/profile.php';</script>";
        }
    }*/
    
}
?>
