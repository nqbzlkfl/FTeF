<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

if(!empty($_SESSION['username'])){
    $data = new courseController();
    $dataa = $data->courseDetails($_GET['param']);
    foreach($dataa as $roww){
        $course = $roww['courseFull'];
        $username = $roww['tutorUsername'];
        $day = $roww['teachDay'];
        $time = $roww['teachTime'];
        $time12  = date("g:i A", strtotime("$time"));
        $place = $roww['teachPlace'];
        if ($day == NULL || $time12 == NULL){
            header("Location:schedule.php?param=".urlencode($roww['courseFull'])."");
        }
    }
    $student = $data->viewStudent($_GET['param']);
    $_SESSION['course'] = $_GET['param'];
    $ancD = $data->viewAnnouncement();
    if(isset($_POST['delete'])){
        $data->deleteAnnouncement();
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

    <title>FTeF | Course</title>
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

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12 h-screen max-h-auto z-0">

    <!--Nav-->
    <?php
        require_once 'navbar.php';
    ?>
    <!-- Nav -->

    <!-- Content -->
    <div class="flex flex-col md:flex-row pt-2">
        <!-- Sidebar -->
        <?php
            require_once 'sidebar.php';
        ?>
        <!-- Sidebar -->

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="flex flex-wrap bg-blue-700 p-2 shadow text-xl text-white mb-6">
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <div class="text-left justify-start cursor-pointer">
                    <a href="manageCourse.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                <?=$roww['courseFull']?>
                </h1>
            </div>
            <!-- Start -->
            <div class="mt-2 w-10/12 mx-auto border-b border-gray-300 shadow-lg p-4 bg-white">
                <div class="md:flex md:flex-row sm:flex-none sm:flex-col sm:mx-auto space-x-4 mx-auto justify-center">
                    <div class="flex-auto border p-2 w-20/24 overflow-y-scroll h-96">
                        <table class="md:table-fixed sm:table-auto w-full border text-left">
                            <tr class="h-8 static">
                                <th class="border text-sm text-center" width="35px">No</th>
                                <th class="border text-sm px-2" width="280px">Student</th>
                                <th class="border text-sm px-2">Details</th>
                                <th class="border text-sm text-center" width="110px">Status</th>
                            </tr>
                            <?php
                            $ii = 1;
                            foreach($student as $std){ 
                            if ($std['studentStatus'] == 1){
                                $sStatus = "ACTIVE";
                            } else {
                                $sStatus = "INACTIVE";
                            }
                            ?>
                            <tr class="h-12">
                                <td class="border text-center text-sm font-semibold"><?=$ii?></td>
                                <td class="border text-sm font-semibold px-2"><?=$std['studentName']?>
                                    <p class="text-gray-600">Matric ID: <?=$std['studentMatricid']?></p>
                                </td>
                                <td class="border text-sm font-semibold px-2"><?=$std['studentEmail']?>
                                    <p class="text-gray-600">@<?=$std['studentUsername']?></p>
                                </td>
                                <?php
                                if ($std['studentStatus'] == 1){ ?>
                                    <td class="border text-center font-bold text-xs px-2"><h1 class="text-green-700 bg-green-200 p-1 rounded-full">ACTIVE</h1></td>
                                <?php } else { ?>
                                    <td class="border text-center font-bold text-xs px-2"><h1 class="text-yellow-600 bg-yellow-200 p-1 rounded-full">INACTIVE</h1></td>
                                <?php }
                                ?>
                                
                            </tr>
                            <?php 
                            $ii++;
                            } ?>
                        </table>
                    </div>
                    <div class="bg-gray-200 flex-initial w-8/12 h-5/6 border-2 p-2 rounded rounded-xl">
                        <div class="flex my-auto">
                            <h1 class="flex m-2 my-auto font-semibold justify-start">
                                Timetable
                            </h1>
                            <div class="flex-auto text-right justify-end cursor-pointer">
                                <a href="schedule.php?param=<?=urlencode($roww['courseFull'])?>"><button class="font-semibold text-white text-sm h-8 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                    Manage
                                </button></a>
                            </div>
                        </div>
                        <div class="flex m-2">
                            <table class="table-fixed w-full text-left mb-2">
                                <tr class="my-auto">
                                    <th class="text-xs font-semibold text-gray-600 px-2 py-4">Day</th>
                                    <td class="text-md font-semibold text-indigo-700"><h1 class="bg-indigo-200 text-center rounded-full p-2"><?=$day?></h1></td>
                                </tr>
                                <tr>
                                    <th class="text-xs font-semibold text-gray-600 px-2 py-4">Time</th>
                                    <td class="text-md font-semibold text-indigo-700"><h1 class="bg-indigo-200 text-center rounded-full p-2"><?=$time12?></h1></td>
                                </tr>
                                <tr>
                                    <th class="text-xs font-semibold text-gray-600 px-2 py-4">Location</th>
                                    <td class="text-md font-semibold text-indigo-700"><h1 class="bg-indigo-200 text-center rounded-full p-2"><?=$place?></h1></td>                                
                                </tr>
                            </table>
                        </div>
                        <div class="flex m-2">
                            <table class="table-fixed w-full text-left mb-2">
                                <tr class="my-auto">
                                    <td colspan="2" class="text-sm text-center font-semibold text-gray-600 px-2 py-2">Average Rating: <h1 class="font-bold text-md text-yellow-800">4.8 <i class="fa fa-star text-yellow-400"></i></h1></th>                                
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-md text-center font-semibold text-indigo-700">
                                        <a href="feedbackView.php"><button class="font-semibold text-sm text-white p-3 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                            View Feedback
                                        </button></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Below -->
            <div class="mt-2 w-10/12 mx-auto border-b border-gray-300 shadow-lg p-4 bg-white">
                <div class="md:flex md:flex-row sm:flex-none sm:flex-col sm:mx-auto space-x-4 mx-auto justify-center">
                    
                    <div class="flex-auto border p-2 w-20/24 h-80">
                        <div class="flex mx-auto font-bold text-md ml mb-2">
                            <div class="flex-1 my-auto">
                                <h1 class="text-gray-800 my-auto text-left w-auto rounded rounded-24">
                                    ANNOUNCEMENT
                                </h1>
                            </div>
                            <div class="flex-1 flex items-right justify-end">
                                <a class="flex text-right" href="createAnnouncement.php?course=<?=urlencode($roww['courseFull'])?>"><button class="font-semibold text-right text-white text-sm h-8 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                    Create Annoucement
                                </button></a>
                            </div>  
                        </div>
                        <div class="overflow-y-scroll h-60">
                            <table class="md:table-fixed sm:table-auto w-full border text-left ">
                                <tr class="h-8">
                                    <th class="border text-sm text-center" width="35px">No</th>
                                    <th class="border text-sm px-2" width="220px">Announcement Title</th>
                                    <th class="border text-sm px-2">Description</th>
                                    <th class="border text-sm text-center" width="120px">Date</th>
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
                                    <td class="border text-sm font-semibold px-2">
                                        <p class="text-gray-800"><?=$anc['ancDesc']?></p>
                                    </td>
                                    <td class="border text-sm font-semibold px-2">
                                        <p class="text-gray-800 text-center"><?=$anc['ancDate']?></p>
                                    </td>
                                    <td class="border text-sm font-semibold px-2"><form method="POST" action="#"> 
                                    <input type="hidden" name="id" id="id" value="<?=$anc['ancID']?>">    
                                    <input type="submit" name="delete"
                                        class="cursor-pointer mx-auto flex text-xs p-2 text-red-100 transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-red-700" 
                                        value="DELETE"></form>
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
            <!--  -->
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