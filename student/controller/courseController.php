<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/model/courseModel.php';

class courseController{

    /* ANNOUNCEMENT */
    function viewAnnouncement(){
        $course = new courseModel();
        $course->username = $_SESSION['tutor'];
        $course->course = $_SESSION['course'];
        return $course->announcement();
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
