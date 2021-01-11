<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/model/feedbackModel.php';

class feedbackController{
    
    function feedbackList(){
        $data = new feedbackModel();
        $data->tutorUsername = $_SESSION['username'];
        return $data->feedbackList();
    }

    /*function feedbackList(){
        return feedbackModel::feedbackList();
    }*/
    
    function feedbackDetail($id){
        $data = new feedbackModel();
        $data->id = $id;
        return $data->feedbackDetail();
    }
    
    function feedbackUpdate(){
        $data = new feedbackModel();
        $data->id = $_POST['id'];
        $data->feedback = $_POST['feedback'];
        $data->username = $_SESSION['username'];
        if($data->feedbackUpdate()){
            echo "<script type='text/javascript'>window.location = '../site/feedbackDetail.php?param=".$_POST['id']."';</script>";
        }
    }

    /* REPORTTTTTTT */
    function reportCreate(){
        $report = new feedbackModel();
        $report->username = $_SESSION['username'];
        $report->name = $_POST['name'];
        $report->title = $_POST['title'];
        $report->desc = $_POST['desc'];
        $report->file = $_FILES['fileInput']['name'];
        if($report->file == NULL){
            $report->file = "NULL";
        }
        else {
            $temp = explode(".", $_FILES['fileInput']['name']);
            $newfilename = "report" . "+" .urlencode($_SESSION['username']). "+" . date('dmY') . date('HHmm') . '.' . end($temp);
            $report->file = $newfilename;
        }
        $report->date = date('d-m-Y');
        $rowCount = $report->addReport();
        if($rowCount > 0){
            if ($report->file !== "NULL"){
                move_uploaded_file($_FILES['file1']['tmp_name'], 
                $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Report/'.$newfilename);
            } 
            $message = "Successful submit your report. We will review it and give you a feedback soon.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/dashboard.php';</script>";
        }
        else {
            $message = "There is a problem occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/report.php;</script>";
        }
    }
    
    function reportView(){
        $report = new feedbackModel();
        $report->username = $_SESSION['username'];
        return $course->addReport();
    }

    function reportDelete(){
        $report = new reportModel();
        $report->id = $_POST['id'];
        if($course->announcementDelete()){
            $message = "Succesfully delete announcement";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/course.php?param=".urlencode($_SESSION['course'])."';</script>";
        }
    }
}
?>