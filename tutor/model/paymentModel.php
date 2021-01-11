<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/db/database.php';

class paymentModel{

    /* Pending Payment */
    function pendingNew(){
        $sql = 
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '1' and payment.paymentTutor='1' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return DB::run($sql);
    }

    function pendingCount(){
        /* $sql = "select * from tutor where tutorStatus='2'"; */
        $sql =  
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '1' and payment.paymentTutor='1' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return $data->rowCount();
    }    

    /* isset Paid & Refund */
    function tutorPayment(){
        $sql = "update payment
                set paymentStatus='2', paymentTutor='2', adminPaid = :adminPaid
                where paymentID = :refno";
        $args = [':adminPaid'=>$this->adminPaid, ':refno'=>$this->refno];
        $data = DB::run($sql, $args); 
    }
    
    function refundTo(){
        $sql = "update payment
                set paymentStatus='3', paymentTutor='0', adminPaid = :adminPaid
                where paymentID = :refno";
        $args = [':adminPaid'=>$this->adminPaid, ':refno'=>$this->refno];
        $data = DB::run($sql, $args); 
    }

    function refundView(){
        $sql = 
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '3' and payment.paymentTutor='0' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return DB::run($sql);
    }

    function refundCount(){
        $sql =  
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '3' and payment.paymentTutor='0' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return $data->rowCount();
    }   

    
    /* Success View */
    function successView(){
        $sql = 
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '2' and payment.paymentTutor='2' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return DB::run($sql);
    }

    function successCount(){
        $sql =  
        "select payment.*, tutorteach.* from payment
        inner join tutorteach
        on tutorteach.courseFull=payment.courseFull 
        where payment.paymentStatus = '2' and payment.paymentTutor='2' and tutorteach.tutorUsername=payment.tutorUsername";
        $data = DB::run($sql);
        return $data->rowCount();
    }

}
?>

