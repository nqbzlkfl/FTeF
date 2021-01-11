<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class paymentModel{
    
    /*email, username, pass, name, matric, phone, bod, gender, faculty ,program ,yos ,grad, status, photo ,jdate*/

    function addPayment(){
        $sql = "insert into payment(paymentID, coursefull, paymentFee, studentUsername, studentName, tutorUsername, tutorName, 
                paymentProof, paymentDate, paymentTime, paymentStatus, paymentTutor, timestamp) 
                values(:ref, :course, :fee, :userS, :nameS, :userT, :nameT, :proof, :pDate, :pTime, :pStatus, :pTutor, :timedate)";
        $args = [':ref'=>$this->ref, ':course'=>$this->course, ':fee'=>$this->fee, ':userS'=>$this->userS,':nameS'=>$this->nameS,
                ':userT'=>$this->userT, ':nameT'=>$this->nameT, ':proof'=>$this->proof, ':pDate'=>$this->pDate, ':pTime'=>$this->pTime,
                ':pStatus'=>$this->pStatus, ':pTutor'=>$this->pTutor, ':timedate'=>$this->timedate];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }
    

    function pendingNew(){
        $sql = 
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '1' and payment.paymentTutor='1' and payment.studentUsername=:userS and tutorteach.tutorUsername=payment.tutorUsername";
        $args = [':userS'=>$this->userS];
        $data = DB::run($sql, $args);
        return DB::run($sql,$args);
    }

    function pendingCount(){
        /* $sql = "select * from tutor where tutorStatus='2'"; */
        $sql =  
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '1' and payment.paymentTutor='1' and payment.studentUsername=:userS and tutorteach.tutorUsername=payment.tutorUsername";
        $args = [':userS'=>$this->userS];
        $data = DB::run($sql, $args);
        return $data->rowCount();
    }
}
?>

