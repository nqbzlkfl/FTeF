<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/feedbackController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $roww){
        $nameS = $roww['studentName'];
    }
    $td = new tutorController();
    $tutorD = $td->tutorDetails($_GET['id'],$_GET['course']);
    $tutorU = $_GET['id'];
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
    $_SESSION['tutor'] = $rowD['tutorUsername'];
    $_SESSION['course'] = $_GET['course'];

    $cs = new courseController();
    $ancD = $cs->viewAnnouncement();

    $fb = new feedbackController();
    $feedb = $fb->viewFeedbackCourse($usernameT, $course);
    foreach ($feedb as $fbData){
        $fStar = $fbData['ratingFeedback'];
        $fTutor = $fbData['tutorUsername'];
        $fStudent = $fbData['studentUsername'];
        $fCourse = $fbData['courseFull'];
        $fFeedback = $fbData['studentFeedback'];
    }
    $feedr = $fb->viewFeedbackEnroll($usernameT, $course);
    foreach ($feedr as $fbStar){
        $statusF = $fbStar['feedback'];
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

    <title>FTeF | <?=$course?> by <?=$nameT?></title>
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

<body class="bg-gray-100 h-sreen font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <?php require_once 'navbar.php'?>

    <!-- Content -->
    
    <div class="flex flex-col md:flex-row pt-2 h-screen">
        <div class="main-content flex flex-1 space-x-2 bg-gray-100 h-full mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="pt-6 flex-1">
                <div class="w-8/12 mx-auto -mr-1">
                    <!-- Tutor -->
                    
                    <div class="container bg-white mx-auto p-12 pb-12 pt-6 overflow-hidden">
                        <div class="bg-white w-full pb-2 flex mx-auto space-x-2 mb-4 items-center">
                            <div class="text-left justify-start cursor-pointer">
                                <a href="mytutor.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                    Back
                                </button></a>
                            </div>
                            <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                            Class Management</h1>
                        </div>
                        <div class="border rounded rounded-lg bg-gray-200">
                            <div class="w-full p-4 item-center justify-center flex">
                                <div class="inline-grid flex">
                                    <p class="work-sans text-center p-2 mx-auto font-semibold text-xl text-gray-900 bg-blue-200"><?=$course?></p>
                                </div>
                            </div>
                            <div class="item-center justify-center flex-row w-full mx-auto my-auto lg:w-5/12 lg:p-4">
                                <img class="rounded-full" src="../../img/Profile/<?=$photo?>">
                                <p class="work-sans font-semibold text-md text-center text-gray-600">@<?=$usernameT?></p>
                            </div>
                            <div class="w-full p-4">
                                <div class="inline-grid">
                                    <p class="work-sans font-semibold text-md text-gray-900">Tutor :</p>
                                    <p class="work-sans font-semibold text-lg text-gray-900"><?=$nameT?></p></br>
                                    <p class="work-sans font-semibold text-md text-gray-900">Faculty :</p>
                                    <p class="font-semibold text-lg text-md text-gray-800"><?=$faculty?></p></br>
                                    <p class="work-sans font-semibold text-md text-gray-900">Contact :</p>
                                    <p class="font-semibold text-lg text-md text-gray-800">0<?=$phone?></p>
                                    <p class="font-semibold text-lg text-md text-gray-800"><?=$email?></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pt-5">
                            <div class="">
                            <!-- <h1 class="text-gray-900 font-semibold text-md">Feedback Section</h1> -->
                            <?php
                            if ($statusF == "1"){?>
                                <table class="md:table-fixed sm:table-auto text-left ">
                                    <tr class="h-12">
                                        <td width="200px" class="border text-sm font-semibold px-2">
                                            <p class="text-gray-800">You not review this tutor yet.</p>
                                        </td>
                                        <td width="90px" class="border text-sm font-semibold px-2">
                                            <p class="text-gray-800">None</p>
                                        </td>
                                        <td width="90px" class="border text-sm font-semibold px-2"><a href="submitFeedback.php?id=<?=urlencode($usernameT)?>&course=<?=urlencode($course)?>"> 
                                        <input type="submit" name="delete"
                                            class="cursor-pointer mx-auto font-bold flex text-xs px-4 p-2 text-white transition-colors duration-150 bg-green-600 rounded-lg focus:shadow-outline hover:bg-green-700" 
                                            value="Create"></a>
                                        </td>
                                    </tr>
                                </table>
                            <?php } else {?>
                                <table class="md:table-fixed sm:table-auto text-left ">
                                    <tr class="h-12">
                                        <td width="200px" class="text-sm font-semibold px-2">
                                            <p class="text-gray-800">Feedback submitted.</p>
                                        </td>
                                        <td width="90px" class="text-sm font-semibold px-2">
                                            <p class="text-gray-800 text-center"><?=$fStar?>&nbsp<i class="fa fa-star text-yellow-400"></i></p>
                                        </td>
                                        <td width="90px" class="text-sm font-semibold px-2">
                                            <div x-data="{ open: false }">
                                                <input type="submit" name="delete" @click="open = true"
                                                    class="cursor-pointer mx-auto font-bold flex text-xs px-4 p-2 text-white transition-colors duration-150 bg-green-600 rounded-lg focus:shadow-outline hover:bg-green-700" 
                                                    value="View">
                                                    <?php require_once 'viewFeedbackModal.php'?>  
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-6 flex-1 flex-wrap pb-6">
                <div class="w-8/12 mx-auto -ml-1 pb-6">
                    <!-- Card -->
                    <div class="container bg-white mx-auto px-12 pt-6 mb-auto pb-24 overflow-hidden">
                        <div class="bg-gray-200 h-auto p-2 rounded rounded-lg">
                            <div class="flex my-auto justify-center">
                                <h1 class="flex m-2 bg-blue-200 p-2 rounded-md text-center text-md my-auto font-semibold justify-start">
                                    Timetable
                                </h1>
                            </div>
                            <div class="flex m-2 justify-center mx-auto">
                                <table class="table-fixed w-7/12 text-left mb-2">
                                    <tr class="my-auto">
                                        <th class="text-sm font-semibold text-gray-600 px-2 py-4">Day</th>
                                        <td class="text-md font-semibold text-green-700"><h1 class="bg-green-200 text-center rounded-full p-2"><?=$day?></h1></td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm font-semibold text-gray-600 px-2 py-4">Time</th>
                                        <td class="text-md font-semibold text-green-700"><h1 class="bg-green-200 text-center rounded-full p-2"><?=$time12?></h1></td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm font-semibold text-gray-600 px-2 py-4">Location</th>
                                        <td class="text-md font-semibold text-green-700"><h1 class="bg-green-200 text-center rounded-full p-2"><?=$place?></h1></td>                                
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="w-full p-4 pt-8 mt-3 flex mx-auto">
                            <div class="inline-grid border-t w-full flex mx-auto">
                                <p class="pt-2 work-sans font-semibold text-center text-2xl text-gray-900">Announcement</p>
                            </div>
                        </div>
                        <div class="border-2 rounded-2 ">
                            <div class="overflow-y-scroll h-60">
                                <table class="md:table-fixed sm:table-auto w-full text-left ">
                                    <tr class="h-8">
                                        <th class="border text-sm text-center" width="35px">No</th>
                                        <th class="border text-sm px-2" width="200px">Announcement Title</th>
                                        <th class="border text-sm text-center" width="90px">Action</th>
                                    </tr>
                                    <?php
                                    if(is_object($ancD)){
                                    $jj = 1;
                                    foreach($ancD as $anc){ 
                                    ?>
                                    <tr class="h-12">
                                        <td class="border text-center text-sm font-semibold"><?=$jj?></td>
                                        <td class="border text-sm font-semibold px-2">
                                            <p class="text-gray-800"><?=$anc['ancTitle']?></p>
                                        </td>
                                        <td class="border text-sm font-semibold px-2"><form method="POST" action="#"> 
                                        <input type="hidden" name="id" id="id" value="<?=$anc['ancID']?>">    
                                        <input type="submit" name="delete"
                                            class="cursor-pointer mx-auto font-bold flex text-xs px-4 p-2 text-white transition-colors duration-150 bg-green-600 rounded-lg focus:shadow-outline hover:bg-green-700" 
                                            value="View"></form>
                                        </td>
                                    </tr>
                                    <?php 
                                    $jj++;
                                    }
                                    } else if (is_array($ancD)) {?> 
                                    <tr class="h-12">
                                        <td colspan="5" class="border text-center text-sm font-semibold">No Data</td>
                                    </tr>
                                    <?php 
                                    }?>
                                </table>
                            </div>
                        </div>
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