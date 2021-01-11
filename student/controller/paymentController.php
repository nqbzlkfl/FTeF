<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/model/paymentModel.php';
class paymentController{

    function payCourse(){
        $payment = new paymentModel();
        $payment->ref = $_POST['refno'];
        $payment->course = $_POST['course'];
        $payment->fee = "30";
        $payment->userS = $_POST['usernameS'];
        $payment->nameS = $_POST['nameS'];
        $payment->userT = $_POST['usernameT'];
        $payment->nameT = $_POST['nameT'];
        $temp = explode(".", $_FILES["receipt"]["name"]);
        $newfilename = $_POST['refno'] . '.' . end($temp);
        $payment->proof = $newfilename;
        $payment->pDate = $_POST['pDate'];
        $payment->pTime = $_POST['pTime'];
        $payment->pStatus = "1";
        $payment->pTutor = "1";
        $payment->timedate = date('Y-m-d H:i:s');
        $count = $payment->addPayment();
        if($count > 0){
            move_uploaded_file($_FILES['receipt']['tmp_name'], 
            $_SERVER['DOCUMENT_ROOT'].'/ftef/img/Payment/'.$newfilename);
            $message = "Your payment have been success! Please wait for you payment validation.";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'mytutor.php';</script>";   
        }
        else{
            $message = "There a problem!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'mytutor.php';</script>";
        }
    }
    
    function viewCoursePending(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->pendingNew();
    }

    function getcoursePending(){
        $payment = new paymentModel();
        $payment->userS = $_SESSION['username'];
        return $payment->pendingCount();
    }
}
?>
