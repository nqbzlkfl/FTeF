<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/model/adminModel.php';
session_start();

class adminController{
    
    function login(){
        $admin = new adminModel();
        $admin->username = $_POST['username'];
        $admin->password = $_POST['password'];
        $count = $admin->validate();
        if($count == true){
            $username = $_POST['username'];
            $_SESSION['username']=$username;
            $message = "Welcome!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'view/dashboard.php';</script>";
        }
        else{
            $message = "Wrong Login Credentials!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '".$_SERVER['DOCUMENT_ROOT']."/ftef/admin/view/login_admin.php';</script>";
        }
    }
    
    function getfullName(){
        $admin = new adminModel();
        return $admin->fullName($_SESSION['username']);
    }
    
    /* Tutor Section */
    function viewTutor(){
        $admin = new adminModel();
        return $admin->tutorAll();
    }

    function getTutor(){
        $admin = new adminModel();
        return $admin->tutorCount();
    }
    
    function deleteTutor(){
        $admin = new adminModel();
        $admin->username = $_POST['tutorUsername'];
        if($admin->deleteTutor()){
            $message = "Successful Delete Tutor, {$_POST['tutorUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageUser.php';</script>";
        } else {
            $message = "Successful Delete Tutor, {$_POST['tutorUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageUser.php';</script>";
        }
    }

    function viewTutorNew(){
        $admin = new adminModel();
        return $admin->tutorNew();
    }

    function getTutorNew(){
        $admin = new adminModel();
        return $admin->countNew();
    }

    function approveTutor(){
        $admin = new adminModel();
        $admin->username = $_POST['tutorUsername'];
        if($admin->approveStatus()){
            $message = "Successful Approve User!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        } else {
            $message = "Successful Approve User!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        }
    }
    
    function ignoreTutor(){
        $admin = new adminModel();
        $admin->username = $_POST['tutorUsername'];
        if($admin->ignoreStatus()){
            $message = "Successfully Reject User!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        } else {
            $message = "Successfully Reject User!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        }
    }
    
    /* Student Section */
    function viewStudent(){
        $admin = new adminModel();
        return $admin->studentAll();
    }

    function getStudent(){
        $admin = new adminModel();
        return $admin->studentCount();
    }
    
    function deleteStudent(){
        $admin = new adminModel();
        $admin->username = $_POST['studentUsername'];
        if($admin->deleteStudent()){
            $message = "Successful Delete Student, {$_POST['studentUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageUser.php';</script>";
        } else {
            $message = "Successful Delete Student, {$_POST['studentUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageUser.php';</script>";
        }
    }

    /* Course Approval */
    function viewCourseNew(){
        $admin = new adminModel();
        return $admin->courseNew();
    }

    function getCourseNew(){
        $admin = new adminModel();
        return $admin->countNewCourse();
    }

    function approveCourse(){
        $admin = new adminModel();
        $admin->username = $_POST['tutorUsername'];
        $admin->course = $_POST['courseFull'];
        if($admin->courseStatus()){
            $message = "Successful add new course to {$_POST['studentUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newCourse.php';</script>";
        } else {
            $message = "Successful add new course to {$_POST['studentUsername']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newCourse.php';</script>";
        }
    }
}
?>
