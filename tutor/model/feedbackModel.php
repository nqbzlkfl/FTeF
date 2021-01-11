<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class feedbackModel{
    public $id, $feedback, $username;
    
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
    
    function feedbackUpdate(){
        $sql = "update feedback set staffFeedback=:feedback,staffUsername=:username where feedbackID=:id";
        $args = [':feedback'=>$this->feedback, ':username'=>$this->username, ':id'=>$this->id];
        return DB::run($sql, $args);
    }

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
