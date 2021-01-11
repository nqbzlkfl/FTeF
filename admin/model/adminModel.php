<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class adminModel{
    public $username,$password;
    
    function validate(){
        $sql = "select * from admin where adminUsername=:username and adminPass=:pass";
        $args = [':username'=>$this->username, ':pass' => $this->password];
        $data = DB::run($sql, $args);
        return  $data->rowCount(); 
    }
    
    function fullName($username){
        $sql = "select * from admin where adminUsername=:username";
        $args = [':username'=>$username];
        return DB::run($sql, $args);
    }

    /* Tutor Section */
    function tutorAll(){
        $sql = "select * from tutor where tutorStatus='1'";
        return DB::run($sql);
    }

    function tutorCount(){
        $sql = "select * from tutor where tutorStatus='1'";
        $count = DB::run($sql);
        return $count->rowCount();
    }

    function tutorNew(){
        $sql = 
        "select * from tutor 
        inner join tutorteach
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutor.tutorStatus = '2' and tutorteach.status='2'";
        return DB::run($sql);
    }

    function countNew(){
        /* $sql = "select * from tutor where tutorStatus='2'"; */
        $sql = 
        "select * from tutor 
        inner join tutorteach
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutor.tutorStatus = '2' and tutorteach.status='2'";
        $count = DB::run($sql);
        return $count->rowCount();
    }
    
    function approveStatus(){
        $sql = "update tutor set tutorStatus='1' where tutorUsername=:username";
        $args = [':username'=>$this->username];
        $data = DB::run($sql, $args);          
    }
    
    function deleteTutor(){
       $sql = "delete from tutor where tutorUsername=:username";
       $args = [':username'=>$this->username];
       return DB::run($sql, $args);
    }
    
    function ignoreStatus(){
       $sql = "delete from tutor where tutorUsername=:username";
       $args = [':username'=>$this->username];
       return DB::run($sql, $args);
    }

    /* Student Section */
    function studentAll(){
        $sql = "select * from student";
        return DB::run($sql);
    }

    function studentCount(){
        $sql = "select * from student";
        $count = DB::run($sql);
        return $count->rowCount();
    }

    function deleteStudent(){
        $sql = "delete from student where studentUsername=:username";
        $args = [':username'=>$this->username];
        return DB::run($sql, $args);
    }

    function viewFile(){
        $sql = "select tutorGrad from tutorteach where tutorGrad=:id";
        $args = [':id'=>$this->id];
        $data = DB::run($sql, $args);          
    }

    /* Approval Status */
    function courseNew(){
        /* $sql = "select * from tutorteach where status='2'";
        return DB::run($sql); */
        $sql = 
        "select * from tutorteach 
        inner join tutor
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutorteach.status='2' and tutor.tutorStatus='1'";
        return DB::run($sql);
    }

    function countNewCourse(){
        $sql = 
        "select * from tutorteach 
        inner join tutor
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutorteach.status='2' and tutor.tutorStatus='1'";;
        $count = DB::run($sql);
        return $count->rowCount();
    }
    
    function courseStatus(){
        $sql = "update tutorteach set tutorStatus='1' where tutorUsername=:username and courseFull=:course";
        $args = [':username'=>$this->username, ':course'=>$this->course];
        $data = DB::run($sql, $args);          
    }
}
?>