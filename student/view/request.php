<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $row){
        $name = $row['studentName'];
        $studentid = $row['studentMatricid'];
    }
    $tutor = new tutorController();
    $tutorD = $tutor->tutorDetails($_GET['tutor'],$_GET['course']);
    $data1 = $tutor->viewTutor();
    $tutorU = $_GET['tutor'];
    foreach ($tutorD as $rowD){
        if ($rowD['tutorUsername'] == $tutorU){
            $email = $rowD['tutorEmail'];
            $username = $rowD['tutorUsername'];
            $password = $rowD['tutorPass'];
            $name = $rowD['tutorName'];
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
    $_SESSION['tutor'] = $rowD['tutorUsername'];
    $_SESSION['course'] = $_GET['course'];
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

    <title>FTeF | <?=$course?></title>
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
                        <table class="border-red-500 mx-auto w-2/3">
                            <!-- <tr>
                                <th colspan="5" class="text-left">Account Details</th>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Username</td>
                                <td colspan="4"><?=$username?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Email</td>
                                <td><?=$email?></td>
                            </tr> -->
                            <tr>
                                <div class="mx-auto w-32 h-32 border rounded-full relative bg-gray-100 shadow-inset">
                                    <img id="image" class="object-cover w-full h-32 rounded-full" src="../../img/Profile/<?=$photo?>" />
                                </div>
                            </tr>
                            <tr class="h-10">
                                <th colspan="5" class="text-left pt-4">Tutor Details</th>
                            </tr>
                            <tr class="h-10">
                                <td>Name</td>
                                <td><?=$name?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Age</td>
                                <td>
                                    <?php $today = date("Y-m-d");
                                    $diff = date_diff(date_create($bod), date_create($today));
                                    echo $diff->format('%y'); ?>
                                </td>
                            </tr>
                            <tr class="h-10">
                                <td>Contact Number</td>
                                <td>0<?=$phone?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Gender</td>
                                <td><?=$gender?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Faculty</td>
                                <td><?=$faculty?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Program</td>
                                <td><?=$program?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Year of Study</td>
                                <td><?=$yos?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="bg-gray-200 flex-auto w-1/3 h-5/6 border-2 p-2 rounded rounded-xl">
                        <div class="m-4 border-b border-gray-400">
                            <h1 class="m-4">Request lesson from this tutor.</h1>
                        </div>
                        <div class="m-4 pb-3 border-b border-gray-400"">
                            <table>
                                <tbody>
                                    <tr>
                                        <td >Subject: </td>
                                        <td class="pl-2"><?=$course?></td>
                                    </tr>
                                    <tr>
                                        <td>Price: </td>
                                        <td class="pl-2">RM30 per month</td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="m-4 pb-3 border-b border-gray-400">
                            <table>
                                <tbody>
                                    <tr>
                                        <td >Day: </td>
                                        <td class="pl-2 font-semibold"><?=$day?></td>
                                    </tr>
                                    <tr>
                                        <td>Time: </td>
                                        <td class="pl-2 font-semibold"><?=$time12?></td>
                                    </tr>
                                    <tr>
                                        <td>Place: </td>
                                        <td class="pl-2 font-semibold"><?=$place?></td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                        <?php
                        if ($matricid !== $studentid) { ?>
                        <div class="flex mx-auto justify-center pt-2">
                            <button class="justify-center bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold py-2 mx-auto px-6 rounded shadow-lg hover:shadow-xl transition duration-200" 
                                    type="submit" name="request" value="request" onclick="window.location='payment.php?id=<?=uniqid()?>'">
                                    Request
                            </button>
                        </div>
                        <div class="flex mx-auto justify-center">
                            <h1 class="m-4 text-xs font-semibold text-center">Once you click request, you will directly to payment section to pay the course.</h1>
                        </div>
                        <?php } else { ?>
                        <div class="flex mx-auto justify-center pt-2">
                            <input class="justify-center bg-red-600 text-center text-sm text-white outline-none cursor-default font-semibold p-2 mx-auto rounded shadow-lg hover:shadow-xl transition duration-200" 
                                    type="text" name="error" value="Cannot Select" readonly>
                            </button>
                        </div>
                        <div class="flex mx-auto justify-center">
                            <h1 class="m-4 text-xs font-semibold text-center">The system recognized this tutor as yourself. Therefore, you cannot proceed the request.</h1>
                        </div>
                        <?php }?>
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