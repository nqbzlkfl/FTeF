<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/model/tutorModel.php';

class tutorController{

    function viewTutor(){
        $tutor = new tutorModel();
        return $tutor->tutorAll();
    }
    
    function tutorDetails ($tutor, $course){
        $tutor = new tutorModel();
        $tutor->tutor = $tutor;
        $tutor->course = $course;
        return $tutor->detailsTutor();
    }
    
    function viewMyTutor(){
        $tutor = new tutorModel();
        $tutor->userS = $_SESSION['username'];
        return $tutor->tutorMy();
    }    

    function viewMyCourse(){
        $tutor = new tutorModel();
        $tutor->userS = $_SESSION['username'];
        return $tutor->courseMy();
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
