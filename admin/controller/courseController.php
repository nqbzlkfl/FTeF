<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/model/courseModel.php';

class courseController{
    
    function insertSubject(){
        $course1 = new courseModel();
        $course1->code = $_POST['code'];
        $course1->name = strtoupper($_POST['name']);
        $count = $course1->check();
        if($count == true){
            $message = "The subject already existed!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $course = new courseModel();
            $course->code = $_POST['code'];
            $course->name = strtoupper($_POST['name']);
            $course->desc = $_POST['desc'];
            $course->adminUsername = $_SESSION['username'];
            $count = $course->addCourse();
            if($count > 0){
                $message = "Successful Add New Course!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageCourse.php';</script>";
            }
            else{
                $message = "There is a problem occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageCourse.php;</script>";
            }
        }
    }

    function updateSubject(){
        $course = new courseModel();
        $course->code = $_POST['code'];
        $course->desc = $_POST['desc'];
        $course->adminUsername = $_SESSION['username']; 
        if ($course->updateCourse()){
            $message = "Successful Update {$_POST['name']} Course!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageCourse.php';</script>";
        }
        else{
            $message = "There is a problem occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/manageCourse.php;</script>";
        }

    }

    function approveCourse(){
        $course = new courseModel();
        $course->username = $_POST['tutorUsername'];
        if($course->approveStatus()){
            $username = $_POST['tutorUsername'];
            $message = "Successful Approve New Course for {$username}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        } else {
            $message = "Error occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        }
    }

    function approveRegCourse(){
        $course = new courseModel();
        $course->username = $_POST['tutorUsername'];
        if($course->approveRegStatus()){
            $username = $_POST['tutorUsername'];
            $message = "Successful Approve New Course for {$username}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        } else {
            $message = "Error occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/newUser.php';</script>";
        }
    }

    function viewcourse(){
        $course = new courseModel();
        return $course->viewall();
    }

    function regCourseNew(){
        $course = new courseModel();
        return $course->viewReg();
    }

    function courseDetails($id){
        $course = new courseModel();
        $course->id = $id;
        return $course->viewDetails();
    }

    function getCourse(){
        $course = new courseModel();
        return $course->courseCount();
    }
    
    function deleteCourse(){
        $course = new courseModel();
        $course->courseCode = $_POST['courseCode'];
        if($course->delete()){
            $message = "Successful Delete Course!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../view/manageCourse.php';</script>";
        }
    }

    /* ENROLL */
    function enrollStudent(){
        $enroll = new courseModel();
        $enroll->id = $_POST['refno'];
        $enroll->userT = $_POST['userT']; 
        $enroll->userS = $_POST['userS'];
        $enroll->course = $_POST['course'];
        $enroll->status = "1";
        $count = $enroll->addEnroll();
            if($count > 0){
                
            }
    }

}
?>
