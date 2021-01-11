<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class courseModel{
    public $code, $name, $userAdmin, $username, $course, $tutorUsername; 
    
    function courseDrop(){
        $sql = "select * from courselist";
        return DB::run($sql);
    }
    
    function courseList(){
        $sql = "select * from courselist";
        return DB::run($sql);
    }
    
    function courseDisplay(){
        $sql = "select * from tutorteach where tutorUsername=:tutorUsername";
        $args = [':tutorUsername'=>$this->tutorUsername];
        return DB::run($sql, $args);
    }
    
    function courseCount(){
        $sql = "select * from tutorteach where tutorUsername=:tutorUsername";
        $args = [':tutorUsername'=>$this->tutorUsername];
        return DB::run($sql, $args);
        return $data->rowCount();
    }
    
    function addTeach(){
        $sql = "insert into tutorteach(tutorUsername, courseFull, tutorGrad, submitedDate, status) 
                values(:username, :course, :img, :submitDate, :status)";
        $args = [':username'=>$this->username, ':course'=>$this->course, ':img'=>$this->img, ':submitDate'=>$this->submitDate, ':status'=>$this->status];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function addCourse(){
        $sql = "insert into tutorteach(tutorUsername, courseFull, tutorGrad, submitedDate, status, teachDay, teachTime) 
                values(:username, :course, :img, :submitDate, :status, :day, :time)";
        $args = [':username'=>$this->username, ':course'=>$this->course, ':img'=>$this->img, ':submitDate'=>$this->submitDate, ':status'=>$this->status,
                ':day'=>$this->day, ':time'=>$this->time];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    /* Session */
    function courseSession(){
        $sql = "select * from tutorteach where tutorUsername=:tutorUsername and courseFull=:courseFull";
        $args = [':tutorUsername'=>$this->tutorUsername, ':courseFull'=>$this->courseFull];
        return DB::run($sql, $args);
    }

    /* Student */
    function courseStudent(){
        $sql = "select * from tutorteach 
                inner join enroll
                on enroll.courseName = tutorteach.courseFull
                inner join student
                on student.studentUsername = enroll.studentUsername
                where enroll.tutorUsername=:tutorUsername and enroll.courseName=:courseFull";
        $args = [':tutorUsername'=>$this->tutorUsername, ':courseFull'=>$this->courseFull];
        return DB::run($sql, $args);
    }

    /* SCHEDULE */
    function addSchedule(){
        
        $sql = "update tutorteach set teachDay=:day, teachTime=:time, teachPlace=:place 
                where tutorUsername=:username and courseFull=:course";
        $args = [':username'=>$this->username, ':course'=>$this->course, ':day'=>$this->day, ':time'=>$this->time, ':place'=>$this->place];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function scheduleTable(){
        $sql = "select * from tutorteach where tutorUsername=:username and courseFull=:course";
        $args = [':username'=>$this->username, ':course'=>$this->course];
        return DB::run($sql, $args);
    }

    /* ANNOUNCEMENT */
    function createAnnounce(){
        $sql = "insert into announcement(ancTitle, ancDesc, tutorUsername, courseFull, ancFile, ancDate) 
                values(:title, :desc, :username, :course, :file, :date)";
        $args = [':title'=>$this->title, ':desc'=>$this->desc, ':username'=>$this->username, ':course'=>$this->course, ':file'=>$this->file,
                ':date'=>$this->date];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }

    function announcement(){
        $sql = "select * from announcement
                where tutorUsername=:username and courseFull=:course
                order by ancDate desc";
        $args = [':username'=>$this->username, ':course'=>$this->course];
        return DB::run($sql, $args);
    }

    function announcementDelete(){
        $sql = "delete from announcement
                where ancID=:id";
        $args = [':id'=>$this->id];
        return DB::run($sql, $args);
    }
    
}
?>