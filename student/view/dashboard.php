<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
/* require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/scheduleController.php';
 */
if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $row){
        $name = $row['studentName'];
        $username = $row['studentUsername'];
        $sid = $row['studentMatricid'];
        $faculty = $row['studentFaculty'];
        $program = $row['studentProgram'];
        $yos = $row['studentYOS'];
    }
    /* 
    $dataS = new scheduleController(); */
    /* $schedule = $dataS->scheduleList();
    foreach($schedule as $row){} */
    $tutor = new tutorController();
    $dataa = $tutor->viewTutor();
    foreach($dataa as $roww){
        $tid = $roww['tutorMatricid'];
        $tu = $roww['tutorUsername'];
    }
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

    <title>FTeF | Dashboard</title>
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
    
    <div class="flex flex-col md:flex-row pt-2">
        <div class="main-content flex-1 bg-gray-100 h-screen mt-12 md:mt-2 pb-24 md:pb-5">
            <!-- <div class="bg-blue-500 p-2 shadow text-xl text-white">
                    <h3 class="font-bold pl-2 text-center">WELCOME, YOUR NAME</h3>
            </div> -->
            <div class="inline-flex space-x-8 w-full mx-auto">
                <div class="container flex-1 py-12 overflow-hidden">
                    <div class="mb-6 mx-16 pl-2">
                        <h2 class="work-sans font-semibold text-2xl text-gray-900">
                            Welcome, <?=$name?>
                        </h2>
                    </div>
                    <div class="mx-auto overflow-hidden inline-grid sm:max-w-xs lg:max-w-lg lg:flex bg-gray-200 border-b-4 border-gray-600 rounded-lg shadow-lg pb-6 lg:pb-0">
                        <div class="w-full my-6 p-4">
                            <div class="inline-grid">
                                <p class="work-sans font-semibold text-xl text-gray-900 px-2"><?=$name?></p>
                                <table class="table-fixed w-full mx-auto my-2 border text-left">
                                    <tr>
                                        <td class="border px-2 w-1/3">Faculty</td>
                                        <td class="border px-2 w-2/3"><?=$faculty?></td>
                                    </tr>
                                    <tr>
                                        <td class="border px-2 w-1/3">Program</td>
                                        <td class="border px-2 w-2/3"><?=$program?></td>
                                    </tr>
                                    <tr>
                                        <td class="border px-2 w-1/3">Year</td>
                                        <td class="border px-2 w-2/3"><?=$yos?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center -mt-8 rounded-b-lg max-w-xs lg:max-w-lg lg:-mt-8 lg:justify-end py-1">
                        <a href="profile.php" class="outline-none"><button type="button" class="py-3 px-4 bg-blue-500 hover:bg-blue-700 focus:outline-none rounded-lg ml-3 text-white"><p class="work-sans font-semibold text-sm tracking-wide">Edit Profile</p></button></a>
                    </div>
                </div>
                
                <div class="container flex-1 mx-auto py-12 overflow-hidden">
                    <!-- <div class="mb-6 mx-16 pl-2">
                        <h2 class="work-sans font-semibold text-2xl text-gray-900">
                            Welcome, <?=$name?>
                        </h2>
                    </div>
                    <div class="mx-auto overflow-hidden inline-grid max-w-xs sm:max-w-xs lg:max-w-lg lg:flex bg-gray-200 border-b-4 border-gray-600 rounded-lg shadow-lg pb-6 lg:pb-0">
                        <div class="w-full my-6 p-4">
                            <div class="inline-grid">
                                <p class="work-sans font-semibold text-xl text-gray-900 px-2"><?=$name?></p>
                                <table class="table-fixed w-full mx-auto my-2 border text-left">
                                    <tr>
                                        <td class="border px-2 w-1/3">Faculty</td>
                                        <td class="border px-2 w-2/3"><?=$faculty?></td>
                                    </tr>
                                    <tr>
                                        <td class="border px-2 w-1/3">Program</td>
                                        <td class="border px-2 w-2/3"><?=$program?></td>
                                    </tr>
                                    <tr>
                                        <td class="border px-2 w-1/3">Year</td>
                                        <td class="border px-2 w-2/3"><?=$yos?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center -mt-8 rounded-b-lg max-w-xs lg:max-w-lg lg:-mt-8 lg:justify-end py-1">
                        <a href="profile.php" class="outline-none"><button type="button" class="py-3 px-4 bg-blue-500 hover:bg-blue-700 focus:outline-none rounded-lg ml-3 text-white"><p class="work-sans font-semibold text-sm tracking-wide">Edit Profile</p></button></a>
                    </div> -->
                </div>
            </div>
            
            <!-- -->
            <div class="flex flex-wrap px-8">
                <div class="w-full my-5 px-5 w-1/3 overflow-hidden md:my-3 md:px-3 md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3">
                    <!--Metric Card-->
                    <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-calendar fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Next Session</h5>
                                <h3 class="font-bold text-xl">dd/mm, hh:mm a.m.<span class="text-green-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full my-5 px-5 w-1/3 overflow-hidden md:my-3 md:px-3 md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3">
                    <!--Metric Card-->
                    <div class="bg-indigo-200 border-b-4 border-purple-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-purple-600"><i class="fas fa-book fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Course</h5>
                                <h3 class="font-bold text-3xl">2 <span class="text-purple-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full my-5 px-5 w-1/3 overflow-hidden md:my-3 md:px-3 md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3">
                    <!--Metric Card-->
                    <div class="bg-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-money-bill fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Due Payment</h5>
                                <h3 class="font-bold text-3xl">None <span class="text-yellow-600"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>


            <div class="flex flex-row flex-wrap flex-grow mt-2">

                


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