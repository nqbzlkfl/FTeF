<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class studentModel{
    public $email, $username, $password, $id,
           $fname, $matricid, $phone, $bod, $gender,
           $faculty, $program, $yos, $status, $join_date;
    /*email, username, pass, name, matric, phone, bod, gender, faculty ,program ,yos ,grad, status, photo ,jdate*/

    function addStudent(){
        $sql = "insert into student(studentEmail, studentUsername, studentPass, studentName, studentMatricid, studentPhone, studentBOD,
                studentGender, studentFaculty, studentProgram, studentYOS, studentStatus, sJoinedDate) 
                values(:email, :username, :password, :fname, :matricid, :phone, :bod, :gender, :faculty, :program, :yos, :status, :jdate)";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':password'=>$this->password, ':fname'=>$this->fname,':matricid'=>$this->matricid,
                ':phone'=>$this->phone, ':bod'=>$this->bod, ':gender'=>$this->gender, ':faculty'=>$this->faculty, ':program'=>$this->program,
                ':yos'=>$this->yos, ':status'=>$this->status, ':jdate'=>$this->join_date];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }
    

    function validate(){
        $sql = "select * from student where studentUsername=:username and studentPass=:pass and studentStatus='1'";
        $args = [':username'=>$this->username, ':pass'=>$this->password];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
                   return true;
        }
    }

    function check(){
        $sql = "select * from student where studentEmail=:email or studentUsername=:username or studentMatricid=:matricid";
        $args = [':email'=>$this->email, ':username'=>$this->username, ':matricid'=>$this->matricid];
        $data = DB::run($sql, $args);
        $count = $data->rowCount();
        if($count > 0){
            return true;
        }
    }

    function fullName($username){
        $sql = "select * from student where studentUsername=:username";
        $args = [':username'=>$username];
        return DB::run($sql, $args);
    }
    
    /*
    function changePassword(){
        $sql = "update student set studentPass=:password where studentUsername=:username";
        $args = [':username'=>$this->username, ':password'=>$this->password];
        return DB::run($sql, $args);
    }
    
    function fullName($username){
        $sql = "select * from student where studentUsername=:username";
        $args = [':username'=>$username];
        return DB::run($sql, $args);
    }

    function edit(){
        $sql = "update student set staffIC=:ic, staffPhone=:phone, staffEmail=:email where staffUsername=:username";
        $args = [':username'=>$this->username, ':email'=>$this->email, ':phone'=>$this->phone, ':ic'=>$this->ic];
        return DB::run($sql, $args);
    }*/
    
    function getallStudent(){
        $sql = "select * from student";
        return DB::run($sql);
    }
}
?>

