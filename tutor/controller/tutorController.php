<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/model/tutorModel.php';
session_start();

class tutorController{
    
    function regTutor(){
        $tutor1 = new tutorModel();
        $tutor1->email = $_POST['email'];
        $tutor1->username = $_POST['username'];
        $tutor1->password = $_POST['password'];
        $tutor1->matricid = $_POST['matricid'];
        $count = $tutor1->check();
        if($count == true){
            $message = "The account already existed!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $tutor = new tutorModel();
            $tutor->email = $_POST['email'];
            $tutor->username = $_POST['username'];
            $tutor->password = $_POST['password'];
            $tutor->fname = strtoupper($_POST['fname']);
            $tutor->matricid = strtoupper($_POST['matricid']);
            $tutor->phone = $_POST['phone'];
            $tutor->bod = $_POST['bod'];
            $tutor->gender = $_POST['gender'];
            $tutor->faculty = $_POST['faculty'];
            $tutor->program = $_POST['program'];
            $tutor->yos = $_POST['yos'];
            $tutor->status = "2";
            $tutor->img = $_FILES['tutorPhoto']['name'];
            if($tutor->img == NULL){
                $tutor->img = "default_photo_241325463.jpg";
            }
            else {
                $tutor->img = $_FILES['tutorPhoto']['name'];
            }
            $tutor->join_date = date('Y-m-d');
            $count = $tutor->addTutor();
            if($count > 0){
                move_uploaded_file($_FILES['tutorPhoto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Profile/'.$_FILES['tutorPhoto']['name']);
                $message = "Successful Register Tutor!";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../';</script>";
            }
            else{
                $message = "There a problem! Please try again";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../register.php';</script>";
            }
        }
    }
    
    function login(){
        $tutor = new tutorModel();
        $tutor->username = $_POST['username'];
        $tutor->password = $_POST['password'];
        $count = $tutor->validate();
        $tutorStatus1 = $tutor->validate1(['tutorStatus']);
        $tutorStatus2 = $tutor->validate2(['tutorStatus']);
        $tutorStatus3 = $tutor->validate3(['tutorStatus']);
        if ($count == true){
            if ($tutorStatus1 == "1"){
                $username = $_POST['username'];
                $_SESSION['username']=$username;
                $message = "Welcome!";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'view/dashboard.php';</script>";
            }
            else if ($tutorStatus2 == "4"){
                $message = "You Account Being Not Approved By Admin. Please Register Again Or Contact Us.";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/tutor/view/login_tutor.php';</script>";
            }
            else if ($tutorStatus3 == "2") { 
                $message = "You Account Still Not Being Approve Yet. Please Try Again Later.";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/tutor/view/login_tutor.php';</script>";
            }
            else {
                $message = "Wrong Login Credentials!";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/tutor/view/login_tutor.php';</script>";
            }
        }
        else{
            $message = "Wrong Login Credentials!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/tutor/view/login_tutor.php';</script>";
        }
    }

    function getfullName(){
        $tutor = new tutorModel();
        return $tutor->fullName($_SESSION['username']);
    }

    function edit(){
        $tutor = new tutorModel();
        $tutor->email = $_POST['email'];
        $tutor->username = $_POST['username'];
        $tutor->password = $_POST['password'];
        $tutor->fname = strtoupper($_POST['fname']);
        $tutor->matricid = strtoupper($_POST['matricid']);
        $tutor->phone = $_POST['phone'];
        $tutor->bod = $_POST['bod'];
        $tutor->gender = $_POST['gender'];
        $tutor->faculty = $_POST['faculty'];
        $tutor->program = $_POST['program'];
        $tutor->yos = $_POST['yos'];
        if($tutor->edit()){
            $message = "Successful Updatee!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/profile.php';</script>";
        }
    }

    function updateBank(){
        $tutor = new tutorModel();
        $tutor->email = $_POST['email'];
        $tutor->username = $_POST['username'];
        $tutor->acc = $_POST['bAcc'];
        $tutor->bank = $_POST['bName'];
        if($tutor->insertBank()){
            $message = "Successful Update Your Account Bank!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/profile.php';</script>";
        } else {
            $message = "Successful Update Your Account Bank!!!!!!!!!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/profile.php';</script>";
        }
    }
    
    function editPhoto(){
        $tutor = new tutorModel();
        $tutor->username = $_SESSION['username'];;
        $tutor->photo = $_FILES['tutorPhoto']['name'];
        $count = $tutor->deletePhoto();
        $count = $tutor->updatePhoto();
            if($count > 0){
                move_uploaded_file($_FILES['tutorPhoto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Profile/'.$_FILES['tutorPhoto']['name']);
                $message = "Successful Register Tutor!";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../';</script>";
            }
            else {}
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
    }*/
    
    function getallStaff(){
        return staffModel::getallStaff();
    }
}
?>
