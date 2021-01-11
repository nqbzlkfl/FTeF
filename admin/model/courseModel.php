<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class courseModel{
    public $code, $name, $userAdmin;
    
    function check(){
        $sql = "select * from courselist where courseCode=:code or courseName=:name";
        $args = [':code'=>$this->code, ':name'=>$this->name];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function addCourse(){
        $sql = "insert into courselist(courseCode, courseName, courseDesc, adminUsername) values(:code, :name, :desc, :adminUsername)";
        $args = [':code'=>$this->code, ':name'=>$this->name, ':desc'=>$this->desc, ':adminUsername'=>$this->adminUsername];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function updateCourse(){
        $sql = "update courselist set courseDesc=:desc where courseCode=:code"; 
        $args = [':code'=>$this->code, ':desc'=>$this->desc];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function viewall(){
        $sql = "select * from courselist order by courseCode";
        return DB::run($sql);
    }

    function viewReg(){
        $sql = "select * from tutorteach where status='2'";
        return DB::run($sql);
    }
    
    function viewDetails(){
        $sql = "select * from courselist where courseCode=:id";
        $args = [':id'=>$this->id];
        return DB::run($sql, $args);
    }

    function courseCount(){
        $sql = "select * from courselist";
        $count = DB::run($sql);
        return $count->rowCount();
    }

    function approveStatus(){
        $sql = "update tutorteach set status='1' where tutorUsername=:username";
        $args = [':username'=>$this->username];
        $data = DB::run($sql, $args);          
    }

    function approveRegStatus(){
        $sql = "update tutorteach set status='1' where tutorUsername=:username";
        $args = [':username'=>$this->username];
        $data = DB::run($sql, $args);          
    }
    
    function delete(){
        $sql = "delete from courselist where courseCode=:courseCode";
        $args = [':courseCode'=>$this->courseCode];
        return DB::run($sql, $args);
    }

    /* ADD ENROLL */
    function addEnroll(){
        $sql = "insert into enroll(paymentID, tutorUsername, studentUsername, courseName, feedback) values(:id, :userT, :userS, :course, :status)";
        $args = [':id'=>$this->id, ':userT'=>$this->userT, ':userS'=>$this->userS, ':course'=>$this->course, ':status'=>$this->status];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }
    
}
?>