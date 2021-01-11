<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/paymentController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $row){
        $nameS = $row['studentName'];
        $usernameS = $row['studentUsername'];
    }
    $tutor = new tutorController();
    $tutorD = $tutor->tutorDetails($_SESSION['tutor'],$_SESSION['course']);
    $data1 = $tutor->viewTutor();
    $tutorU = $_SESSION['tutor'];
    foreach ($tutorD as $rowD){
        if ($rowD['tutorUsername'] == $tutorU){
            $email = $rowD['tutorEmail'];
            $usernameT = $rowD['tutorUsername'];
            $password = $rowD['tutorPass'];
            $nameT = $rowD['tutorName'];
            $matricid = $rowD['tutorMatricid'];
            $phone = $rowD['tutorPhone'];
            $bod = $rowD['tutorBOD'];
            $gender = $rowD['tutorGender'];
            $faculty = $rowD['tutorFaculty'];
            $program = $rowD['tutorProgram'];
            $yos = $rowD['tutorYOS'];
            $photo = $rowD['tutorPhoto'];
            $course = $rowD['courseFull'];
            $day = $rowD['teachDay'];
            $time = $rowD['teachTime'];
            $place = $rowD['teachPlace'];

            $time12  = date("g:i A", strtotime("$time"));
        }
    }

    $pd = new paymentController();
    if(isset($_POST['pay'])){
        $pd->payCourse();
    }
    /* $tutorNum = $admin->getTutor(); */

}
else{
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Course Payment</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" src="../../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../../resources/scripts/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="../../resources/scripts/jQuery.js"></script>

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <?php require_once 'navbar.php'?>
    <!-- Content -->
    
    <div class="flex flex-col md:flex-row pt-2 h-auto">
        
        <div class="main-content flex-1 bg-gray-100 h-screen mt-12 md:mt-2 pb-24 md:pb-5 relative">

            <div class="mt-4 w-2/3 mx-auto border-b border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white">
                <div class="flex space-x-4 mx-auto justify-center">
                    <div class="flex-auto border-2 p-2 rounded rounded-xl">
                        <table class="border-red-500 mx-auto table-fixed">
                            <tr class="h-14">
                                <th colspan="5" class="mx-auto text-center px-4 text-sm">Payment Details</th>
                            </tr>
                            <tr class="h-5">
                                <td class="px-4 text-sm">References No</td>
                                <td class="px-4 font-semibold text-sm"><?=$_GET['id']?></td>
                            </tr>
                            <tr class="h-5">
                                <td class="px-4 text-sm">Name</td>
                                <td class="px-4 font-semibold text-sm"><?=$nameS?></td>
                            </tr>
                            <tr class="h-5">
                                <td class="px-4 text-sm">Subject register</td>
                                <td class="px-4 font-semibold text-sm"><?=$usernameT?></td>
                            </tr>
                            <tr class="h-5">
                                <td class="px-4 text-sm">Tutor</td>
                                <td class="px-4 font-semibold text-sm"><?=$nameT?></td>
                            </tr>
                            <tr class="h-5">
                                <td class="px-4 text-sm">Fee</td>
                                <td class="px-4 font-semibold text-sm">RM30</td>
                            </tr>
                            <tr class="h-5">
                                <td colspan="2" class="justify-center px-4">
                                    <table class="border-t-2 mt-2 w-10/12 mx-auto">
                                        <tr class="h-10">
                                            <th colspan="5" class="mt-4 mx-auto text-center px-4 text-sm">Transaction by online banking. Please transfer to:</th>
                                        </tr>
                                        <tr class="">
                                            <td class="px-4 text-sm">Owner</td>
                                            <td class="px-4 font-semibold text-sm">Faculty of Computing</td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-4 text-sm">Bank Account</td>
                                            <td class="px-4 font-semibold text-sm">0555555555234</td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-4 text-sm">Bank Name</td>
                                            <td class="px-4 font-semibold text-sm">Bank Islam</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="2" class="justify-center px-4">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="refno" value="<?=$_GET['id']?>"/>
                                    <input type="hidden" name="course" value="<?=$course?>"/>
                                    <input type="hidden" name="nameS" value="<?=$nameS?>"/>
                                    <input type="hidden" name="usernameS" value="<?=$usernameS?>"/>
                                    <input type="hidden" name="nameT" value="<?=$nameT?>"/>
                                    <input type="hidden" name="usernameT" value="<?=$usernameT?>"/>
                                    <input type="hidden" name="fee" value="RM 30"/>
                                    <input type="hidden" name="" value=""/>
                                    <table class="border-t-2 mt-4 w-10/12 mx-auto flex">
                                        <tr class="mt-4">
                                            <td class="px-4 text-sm">Upload Receipt</td>
                                            <td class="px-4 text-sm">
                                                <input type="file" name="receipt" id="receipt">
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-4 text-sm">Payment Date</td>
                                            <td class="px-4 text-sm">
                                                <input type="date" name="pDate" id="pDate">
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-4 text-sm">Payment Time</td>
                                            <td class="px-4 text-sm">
                                                <input type="time" name="pTime" id="pTime"> 
                                            </td>
                                        </tr>
                                    </table>
                                    <button
                                    type="submit" name="pay" value="pay" class="mb-8 flex justify-center mx-auto mt-2 w-24 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
                                    >Pay
                                    </button>
                                </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden")};
		

        //Toggle dropdown list
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        //Filter dropdown options
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>


</body>

</html>