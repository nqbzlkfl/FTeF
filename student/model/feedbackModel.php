<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class feedbackModel{

    function feedbackAdd(){
        $sql = "insert into feedback(studentUsername, studentName, studentFeedback, ratingFeedback, tutorUsername, tutorName, courseFull) 
                values(:userS, :nameS, :feedback, :rate, :userT, :nameT, :course)";
        $args = [':userS'=>$this->userS, ':nameS'=>$this->nameS, ':feedback'=>$this->feedback, ':rate'=>$this->rate, 
                ':userT'=>$this->userT, ':nameT'=>$this->nameT, ':course'=>$this->course];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }
    
    function updateFeedback(){
        $sql = "update feedback set studentFeedback=:feedback, ratingFeedback=:rate
        where tutorUsername=:userT and studentUsername=:userS and courseFull=:course";
        $args = [':userT'=>$this->userT, ':userS'=>$this->userS, 
                ':course'=>$this->course, ':feedback'=>$this->feedback, ':rate'=>$this->rate];
        return DB::run($sql, $args);
    }
    
    function updateEnrollFeedback(){
        $sql = "update enroll set feedback=:feedback
        where tutorUsername=:userT and studentUsername=:userS and courseName=:course";
        $args = [':userT'=>$this->userT, ':userS'=>$this->userS, 
                ':course'=>$this->course, ':feedback'=>$this->feedback];
        return DB::run($sql, $args);
    }
    
    function feedbackCourse(){
        $sql = "select * from feedback
                where tutorUsername=:tutor and studentUsername=:student and courseFull=:course";
        $args = [':tutor'=>$this->tutor, ':student'=>$this->student, ':course'=>$this->course];
        return DB::run($sql, $args);
    }
    
    function feedbackEnroll(){
        $sql = "select * from enroll
                where tutorUsername=:tutor and studentUsername=:student and courseName=:course";
        $args = [':tutor'=>$this->tutor, ':student'=>$this->student, ':course'=>$this->course];
        return DB::run($sql, $args);
    }

    function feedbackList(){
        $sql = "select * from feedback where tutorUsername=:tutorUsername";
        $args = [':tutorUsername'=>$this->tutorUsername];
        return DB::run($sql, $args);
    }
    
    function feedbackDetail(){
        $sql = "select * from feedback where feedbackID=:id";
        $args = [':id'=>$this->id];
        return DB::run($sql, $args);
    }
    
    /* function feedbackUpdate(){
        $sql = "update feedback set staffFeedback=:feedback,staffUsername=:username where feedbackID=:id";
        $args = [':feedback'=>$this->feedback, ':username'=>$this->username, ':id'=>$this->id];
        return DB::run($sql, $args);
    } */

    /* REPORTTTTTTTT */
    function addReport(){
        $sql = "insert into report(typeUser, reportTitle, reportDesc, reportUsername, reportName, reportFile, reportDate) 
                values('TUTOR', :title, :desc, :username, :file, :date)";
        $args = [':title'=>$this->title, ':desc'=>$this->desc, ':username'=>$this->username, ':name'=>$this->name, ':file'=>$this->file,
                ':date'=>$this->date];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function viewReport(){
        $sql = "select * from report
                where tutorUsername=:username 
                order by reportID desc";
        $args = [':username'=>$this->username];
        return DB::run($sql, $args);
    }

    function deleteReport(){
        $sql = "delete from report
                where reportID=:id";
        $args = [':id'=>$this->id];
        return DB::run($sql, $args);
    }
}
?>
