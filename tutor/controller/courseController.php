<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/model/courseModel.php';

class courseController{
    
    /* Course List */
    function courseDrop(){
        return courseModel::courseDrop();
    }

    function courseList(){
        return courseModel::courseList();
    }
    
    function courseDisplay(){
        $data = new courseModel();
        $data->tutorUsername = $_SESSION['username'];
        return $data->courseDisplay();
    }
    
    function courseCount(){
        $data = new courseModel();
        $data->tutorUsername = $_SESSION['username'];
        return $data->courseCount();
    }

    /* Add Course */
    function regTeach(){
        $teach = new courseModel();
        $teach->username = $_POST['username'];
        $teach->course = $_POST['course'];
        $teach->img = $_FILES['tutorGrad']['name'];
        $teach->status = "2";
        $teach->submitDate = date('Y-m-d');
        $teach->addTeach();
        if($count > 0){
            move_uploaded_file($_FILES['tutorGrad']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Grad/'.$_FILES['tutorGrad']['name']);
        }
        else{
        }
    }

    function insertSubject(){
        $course = new courseModel();
        $course->username = $_SESSION['username'];
        $course->course = $_POST['course'];
        $course->img = $_FILES['tutorGrad']['name'];
        $course->day = $_POST['tDay'];
        $course->time = $_POST['tTime'];
        $course->status = "2";
        $course->submitDate = date('Y-m-d');
        $count = $course->addCourse();
        if($count > 0){
            move_uploaded_file($_FILES['tutorGrad']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Grad/'.$_FILES['tutorGrad']['name']);
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
    
    /* Course Manage */
    function courseDetails($id){
        $course = new courseModel();
        $course->tutorUsername = $_SESSION['username'];
        $course->courseFull = $id;
        return $course->courseSession();
    }

    /* Student Course */
    function viewStudent($id){
        $course = new courseModel();
        $course->tutorUsername = $_SESSION['username'];
        $course->courseFull = $id;
        return $course->courseStudent();
    }

    /* Announcement */
    function announcement(){
        $course = new courseModel();
        $course->username = $_SESSION['username'];
        $course->course = $_POST['course'];
        $course->title = $_POST['title'];
        $course->desc = $_POST['desc'];
        $course->file = $_FILES['file1']['name'];
        if($course->file == NULL){
            $course->file = "NULL";
        }
        else {
            $temp = explode(".", $_FILES['file1']['name']);
            $newfilename = urlencode($_POST['course']). "+" . date('dmY') . '.' . end($temp);
            $course->file = $newfilename;
        }
        $course->date = date('d-m-Y');
        $count = $course->createAnnounce();
        if($count > 0){
            if ($course->file !== "NULL"){
                move_uploaded_file($_FILES['file1']['tmp_name'], 
                $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Announcement/'.$newfilename);
            }
            $message = "Successful Create New Annoucement for {$_POST['course']}!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/course.php?param=".urlencode($_POST['course'])."';</script>";
        }
        else{
            $message = "There is a problem occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/createAnnouncement.php;</script>";
        }
    }

    function viewAnnouncement(){
        $course = new courseModel();
        $course->username = $_SESSION['username'];
        $course->course = $_SESSION['course'];
        return $course->announcement();
    }

    function deleteAnnouncement(){
        $course = new courseModel();
        $course->id = $_POST['id'];
        if($course->announcementDelete()){
            $message = "Succesfully delete announcement";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/course.php?param=".urlencode($_SESSION['course'])."';</script>";
        }
    }
}
?>
