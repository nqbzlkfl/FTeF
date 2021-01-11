<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/model/courseModel.php';

class scheduleController{
    
    /* Schedule */
    function insertSchedule(){
        $schedule = new courseModel();
        $schedule->username = $_POST['username'];
        $schedule->course = $_POST['course'];
        $schedule->day = $_POST['day'];
        $schedule->time = $_POST['time'];
        $schedule->place = $_POST['place'];
        $count = $schedule->addSchedule();
        if($count > 0){
            $message = "Successful Add New Schedule!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/schedule.php?param=".$_POST['course']."';</script>";
        }
        else{
             $message = "There is a problem occured!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../view/schedule.php?param=".$_POST['course']."';</script>";
        }
    }

    function scheduleList($id){
        $data = new courseModel();
        $data->username = $_SESSION['username'];
        $data->course = $id;
        return $data->scheduleTable();
    }
}
?>