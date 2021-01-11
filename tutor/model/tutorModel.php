<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class tutorModel{
    public $email, $username, $password, $id,
           $fname, $matricid, $phone, $bod, $gender,
           $faculty, $program, $yos, $status, $join_date;
    /*email, username, pass, name, matric, phone, bod, gender, faculty ,program ,yos ,grad, status, photo ,jdate*/

    function addTutor(){
        $sql = "insert into tutor(tutorEmail, tutorUsername, tutorPass, tutorName, tutorMatricid, tutorPhone, tutorBOD,
                tutorGender, tutorFaculty, tutorProgram, tutorYOS, tutorStatus, tutorPhoto, tJoinedDate) 
                values(:email, :username, :password, :fname, :matricid, :phone, :bod, :gender, :faculty, :program, :yos, :status, :img, :jdate)";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':password'=>$this->password, ':fname'=>$this->fname,':matricid'=>$this->matricid,
                ':phone'=>$this->phone, ':bod'=>$this->bod, ':gender'=>$this->gender, ':faculty'=>$this->faculty, ':program'=>$this->program,
                ':yos'=>$this->yos, ':status'=>$this->status, ':img'=>$this->img, ':jdate'=>$this->join_date];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function check(){
        $sql = "select * from tutor where tutorEmail=:email or tutorUsername=:username or tutorMatricid=:matricid";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':matricid'=>$this->matricid];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function validate(){
        $sql = "select * from tutor where tutorUsername=:username and tutorPass=:pass";
        $args = [':username'=>$this->username, ':pass'=>$this->password];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function validate1(){
        $sql = "select * from tutor where tutorUsername=:username and tutorPass=:pass and tutorStatus='1'";
        $args = [':username'=>$this->username, ':pass'=>$this->password];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function validate2(){
        $sql = "select * from tutor where tutorUsername=:username and tutorPass=:pass and tutorStatus='4'";
        $args = [':username'=>$this->username, ':pass'=>$this->password];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function validate3(){
        $sql = "select * from tutor where tutorUsername=:username and tutorPass=:pass and tutorStatus='2'";
        $args = [':username'=>$this->username, ':pass'=>$this->password];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function status($username){
        $sql = "select * from tutor where tutorUsername=:username";
        $args = [':username'=>$username];
        $dataa = DB::run($sql, $args);
    }

    function fullName($username){
        $sql = "select * from tutor where tutorUsername=:username";
        $args = [':username'=>$username];
        return DB::run($sql, $args);
    }
    
    function edit(){
        $sql = "update tutor set tutorEmail=:email, tutorUsername=:username, tutorPass=:password, tutorName=:fname,
        tutorMatricid=:matricid, tutorPhone=:phone, tutorBOD=:bod, tutorGender=:gender, tutorFaculty=:faculty, tutorProgram=:program, tutorYOS=:yos 
        where tutorUsername=:username";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':password'=>$this->password, ':fname'=>$this->fname,':matricid'=>$this->matricid,
        ':phone'=>$this->phone, ':bod'=>$this->bod, ':gender'=>$this->gender, ':faculty'=>$this->faculty, ':program'=>$this->program,
        ':yos'=>$this->yos];
        return DB::run($sql, $args);
    }
    
    function insertBank(){
        $sql = "update tutor set tutorBankAcc=:acc, tutorBankType=:bank
        where tutorUsername=:username and tutorEmail=:email";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':acc'=>$this->acc, ':bank'=>$this->bank];
        return DB::run($sql, $args);
    }

    function updatePhoto(){
        $sql = "update tutor set tutorPhoto=:photo where tutorUsername=:username";
        $args = [':photo'=>$this->photo, ':username'=>$this->username];
        return DB::run($sql, $args);
    }
    
    function deletePhoto(){
        $sql = "delete tutorPhoto=:photo where tutorUsername=:username";
        $args = [':photo'=>$this->photo, ':username'=>$this->username];
        return DB::run($sql, $args);
    }

    function changePassword(){
        $sql = "update tutor set tutorPass=:password where tutorUsername=:username";
        $args = [':username'=>$this->username, ':password'=>$this->password];
        return DB::run($sql, $args);
    }
    
    function getallTutor(){
        $sql = "select * from tutor";
        return DB::run($sql);
    }
}
?>

