<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/model/paymentModel.php';

class paymentController{
    
    /* Pending Course */
    function viewCoursePending(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->pendingNew();
    }

    function getCoursePending(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->pendingCount();
    }

    /* isset Paid & Refund */
    function paidTutor(){
        $payment = new paymentModel();
        $payment->refno = $_POST['refno'];
        $payment->adminPaid = date('Y-m-d H:i:s');
        if($payment->tutorPayment()){   
            $message = "There a problem!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'paymentManagement.php';</script>";
        }
        else{
            $message = "Successfully notify tutor the {$_POST['refno']} payment have been made.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'paymentManagement.php';</script>";
        }
    }
    
    function refundPayment(){
        $payment = new paymentModel();
        $payment->refno = $_POST['refno'];
        $payment->adminPaid = date('Y-m-d H:i:s');
        if($payment->refundTo()){   
            $message = "There a problem!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'paymentManagement.php';</script>";
        }
        else{
            $message = "Successfully refund student fee, invoice {$_POST['refno']}.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'paymentManagement.php';</script>";
        }
    }

    /* Refund View */
    function viewRefund(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->refundView();
    }

    function getRefund(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->refundCount();
    }

    /* Success View */
    function viewSuccess(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->successView();
    }

    function getSuccess(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->successCount();
    }
}
?>
