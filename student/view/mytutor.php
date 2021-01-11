<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/paymentController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $roww){
        $name = $roww['studentName'];
    }
    $td = new tutorController();
    $tutor = $td->viewMyTutor();

    $pm = new paymentController();
    $pending = $pm->viewCoursePending();
    $pendingCount = $pm->getCoursePending();
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

    <title>FTeF | MyTutor Section</title>
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
    
    <div class="flex flex-col md:flex-row pt-2 h-screen">
        <div class="main-content flex-1 bg-gray-100 h-full mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="flex flex-wrap">
            <!-- Tab -->
            <div 
                x-data="{
                openTab: 1,
                activeClasses: 'bg-blue-300 border-b-2 border-blue-400 rounded-tl-lg rounded-tr-lg p-2',
                inactiveClasses: 'text-blue-500 hover:text-blue-800'
                }" 
                class="pt-6 px-6 w-full mx-3"
            >
                <ul class="flex border-b">
                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                    <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="rounded-tl-lg rounded-tr-lg bg-white inline-block py-2 px-4 font-semibold" href="#">
                        Your Tutor
                    </a>
                </li>
                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                    <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="rounded-tl-lg rounded-tr-lg bg-white inline-block py-2 px-4 font-semibold" href="#">
                        Pending Course (<?=$pendingCount?>)
                    </a>
                </li>
                <!-- <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
                    <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="rounded-tl-lg rounded-tr-lg bg-white inline-block py-2 px-4 font-semibold" href="#">
                        Announcement
                    </a>
                </li> -->
                </ul>
                <div class="w-full">

                <!-- MyTutor Tab -->
                <div x-show="openTab === 1" class="flex">
                    <!-- Tutor -->
                    <div class="container bg-white mx-auto p-12 py-12 overflow-hidden h-screen mb-6 flex flex-wrap">
                    <?php
                    $k = 1;
                    foreach ($tutor as $dataT){?>
                    <?php $courseTutor = ($dataT['tutorUsername']); ?>
                    <?php $courseDetails = ($dataT['courseName']); ?>
                    <a href="tutor.php?id=<?=urlencode($courseTutor)?>&course=<?=urlencode($courseDetails)?>">
                        <div class="h-44 mx-8 my-4 justify-center items-center flex overflow-hidden max-w-xs sm:max-w-xs sm:flex lg:max-w-lg lg:flex bg-gray-200 hover:bg-blue-200 border-b-4 border-indigo-400 rounded-lg shadow-lg pb-6 lg:pb-0">
                            <div class="w-full my-auto sm:w-5/12 lg:w-3/12 lg:p-4">
                                <img class= "mx-auto rounded-full" src="../../img/Profile/<?=$dataT['tutorPhoto']?>">
                            </div>
                    
                            <div class="w-full lg:w-2/3 p-4">
                                <div class="inline-grid">
                                    <p class="work-sans font-semibold text-lg text-gray-900 sm:text-md"><?=$dataT['courseName']?></p>
                                    <p class="work-sans font-semibold text-md text-gray-900 sm:text-sm opacity-75"><?=$dataT['tutorName']?></p>
                                    <p class="raleway text-sm sm:text-xs mt-4 text-gray-800">
                                        Schedule : <?=$k?>
                                    </p>
                                    <p class="font-semibold text-md sm:text-sm text-red-500">
                                        <?=$dataT['teachDay']?>, <?php 
                                        $time = $dataT['teachTime'];
                                        $time12  = date("g:i A", strtotime("$time"));
                                        echo $time12; ?>   
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a> 
                    <?php $k++;} ?>
                    </div>
                </div>

                <!-- Pending Tab -->
                <div x-show="openTab === 2">
                    <div class="container bg-white mx-auto p-12 py-12 overflow-hidden">
                        <div class="px-3 py-4 flex justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                            <table class="w-full text-md bg-white shadow-md rounded mb-4 border border-2 table-fixed">
                                <thead>
                                    <tr class="border-b text-sm">
                                        <th class="text-left py-3 px-2 border-r border-gray-200" width="40px">No</th>
                                        <th class="text-left py-3 px-5 border-r border-gray-200">Course Requested</th>
                                        <th class="text-left py-3 px-3 border-r border-gray-200">Tutor</th>
                                        <th class="text-left py-3 px-3 border-r border-gray-200" width="220px">Details</th>
                                        <th class="text-center py-3 border-r border-gray-200" width="120px">Payment</th>
                                        <th class="text-center py-3 border-r border-gray-200" width="90px">Status</th>
                                        <th class="text-center py-3 border-r border-gray-200" width="110px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    foreach($pending as $pend){
                                        if ($pend['paymentStatus'] == "1" ){
                                            if($pendingCount > 0 ){
                                                $status = "PENDING";
                                                $time1 = $pend['paymentTime'];
                                                $timeP  = date("g:i A", strtotime("$time1"));
                                                $time2 = $pend['teachTime'];
                                                $timeT  = date("g:i A", strtotime("$time2"));
                                                $days = $pend['teachDay'];
                                                $day  = date("d/m/Y", strtotime("$days"));
                                                echo "<tr class='border-b hover:bg-blue-100 bg-gray-100'>"
                                                    . "<td class='cursor-default text-sm text-left py-3 px-3 font-normal border-r border-gray-200'>".$i."</td>"
                                                    . "<td class='cursor-default text-sm text-left py-3 px-4 font-normal border-r border-gray-200'>". $pend['courseFull']."</td>"
                                                    . "<td class='cursor-default text-sm text-left py-3 px-5 font-normal border-r border-gray-200'>".$pend['tutorName']."</td>"
                                                    . "<td class='cursor-default text-sm text-left py-3 px-5 font-normal border-r border-gray-200'>
                                                    <p>Day&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$pend['teachDay']."</p>"
                                                    . "Username&nbsp: ".$timeT."</p>" 
                                                    . "<p>Place&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : ".$pend['teachPlace']."</p>
                                                    </td>"
                                                    . "<td width='100px' class='cursor-default text-sm text-center py-3 px-4 font-normal border-r border-gray-200'>PAID ON
                                                    <p>".$day.", ".$timeP."</p></td>"
                                                    . "<td width='100px' class='cursor-default text-sm text-left py-3 px-4 font-normal border-r border-gray-200'>".$status."</td>"
                                                    . "<td class='cursor-default flex mx-auto my-auto justify-center'><form action='reportStudent.php' method='POST'>"
                                                    . "<input type='hidden' name='tutorUsername' value='".$pend['tutorUsername']."'>";
                                                    echo "&nbsp;&nbsp;
                                                            &nbsp;<input type='submit' name='delete' 
                                                            class='text-center cursor-pointer text-xs h-9 px-5 flex my-auto text-white transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                                            value='REPORT'>
                                                            </form></td>
                                                            </tr>";
                                                $i++;
                                            }
                                            else {
                                                $status = "ERROR";
                                                echo "&nbsp;&nbsp;
                                                            &nbsp;<input type='submit' name='report' 
                                                            class='text-center cursor-pointer text-xs h-9 px-5 m-2 text-white transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                                            value='REPORT'>";
                                            }
                                        } 
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Announcement -->
                <!-- <div x-show="openTab === 3">dasdaa
                </div> -->
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