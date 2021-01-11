<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class tutorModel{
    public $email, $username, $password, $id,
           $fname, $matricid, $phone, $bod, $gender,
           $faculty, $program, $yos, $status, $join_date;
    /*email, username, pass, name, matric, phone, bod, gender, faculty ,program ,yos ,grad, status, photo ,jdate*/

    function tutorAll(){
        $sql = 
        "select * from tutor 
        inner join tutorteach
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutorteach.status='1' and tutor.tutorStatus='1'";
        return DB::run($sql);
    }

    function detailsTutor(){
        $sql = 
        "select * from tutorteach 
        inner join tutor
        on tutorteach.tutorUsername=tutor.tutorUsername
        where tutorteach.courseFull=:course and tutorteach.status='1' and tutor.tutorStatus='1'";
        $args = [':course'=>$this->course];
        return DB::run($sql, $args);
    }
    
    /* function tutorMy(){
        $sql = 
        "select tutorteach.*, tutor.* from tutorteach 
        inner join tutor
        on tutor.tutorUsername=tutorteach.tutorUsername
        where tutorteach.status='1' and tutor.tutorStatus='1' and tutorteach.tutorUsername=:userS";
        $args = [':userS'=>$this->userS];
        return DB::run($sql, $args);
    } */

    function tutorMy(){
        $sql = 
        "select enroll.*, tutor.*, tutorteach.teachDay, tutorteach.teachTime, tutorteach.teachPlace, tutorteach.courseFull from enroll  
        inner join tutor
        on tutor.tutorUsername=enroll.tutorUsername
        inner join tutorteach
        on tutorteach.tutorUsername=tutor.tutorUsername
        where enroll.studentUsername='nqbz' and tutorteach.courseFull=enroll.courseName";
        $args = [':userS'=>$this->userS];
        return DB::run($sql, $args);
    }
}
?>

