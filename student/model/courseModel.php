<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class courseModel{

    function announcement(){
        $sql = "select * from announcement
                where tutorUsername=:username and courseFull=:course
                order by ancDate desc";
        $args = [':username'=>$this->username, ':course'=>$this->course];
        return DB::run($sql, $args);
    }
}