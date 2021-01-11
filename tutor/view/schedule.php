<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/scheduleController.php';

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
    }
    $dataS = new scheduleController();
    $schedule = $dataS->scheduleList($_GET['param']);
    if(isset($_POST['addSchedule'])){
        $dataS->insertSchedule();
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

    <title>FTeF | Schedule</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" src="../../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../../resources/scripts/Chart.bundle.js"></script>
    <script type="text/javascript" src="../../resources/scripts/jQuery.js"></script>

</head>

<body class="bg-blue-900 font-sans leading-normal tracking-normal mt-12">

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

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5 h-screen">

            <div class="flex flex-wrap bg-blue-700 p-2 shadow text-xl text-white mb-6 sticky">
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <div class="text-left justify-start cursor-pointer">
                    <a href="course.php?param=<?=urlencode($roww['courseFull'])?>"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                    Manage Schedule for <?=$roww['courseFull']?>
                </h1>
            </div>
            <div class="mt-2 h-10 w-10/12 flex-wrap mx-auto justify-center space-x-4">
                <div x-data={show:false} class="bg-white content-center border shadow-lg">
                    <div class="flex my-auto w-2/3 mx-auto">
                        <h1 class="flex m-2 mt-4 my-auto font-semibold justify-start">
                            Current Schedule
                        </h1>
                    </div>
                    <div class="flex relative m-2 w-2/3 mx-auto pb-2">
                        <table class="table-fixed w-full text-left text-sm">
                            <tr>
                                <th class="text-right pr-10">Day</th>
                                <td class=""><?=$day?></td>
                                <td class="" rowspan="2">
                                    <div @click="show=!show" class="text-left justify-start cursor-pointer">
                                    <a href="#"><button class="font-semibold text-white text-sm h-8 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                        EDIT
                                    </button></a>
                                    </div>  
                                </td>
                            </tr>
                            <tr>
                                <th class="text-right pr-10">Time</th>
                                <td class=""><?=$time12?></td>
                            </tr>
                            <tr>
                                <th class="text-right pr-10">Location</th>
                                <td class=""><?=$place?></td>
                            </tr>
                            <?php
                            
                            ?>
                        </table>
                    </div>
                    <div x-show="show">
                        <div class="flex-1 my-auto w-2/3 mx-auto pt-3">
                            <h1 class="text-center p-3 mb-4 font-semibold">
                                Update Schedule for 
                            </h1>
                        </div>
                        <form  class="mx-auto" method="POST" action="">
                            <div class="flex flex-col m-2 w-2/3 mx-auto pb-2">
                                <table class="table-fixed w-full text-left">
                                    <tr class="mb-8">
                                        <td class="w-1/6 px-2">
                                            <label for="code" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Day</label>
                                        </td>
                                        <td class="px-2">
                                            <select type="text" name="day" id="day" required
                                            class="w-full mb-2 flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                                <option value="" selected>--Day--</option>
                                                <option value="Monday" name="Monday">Monday</option>
                                                <option value="Tuesday" name="Tuesday">Tuesday</option>
                                                <option value="Tuesday" name="Tuesday">Wednesday</option>
                                                <option value="Thursday" name="Thursday">Thursday</option>
                                                <option value="Friday" name="Friday">Friday</option>
                                                <option value="Saturday" name="Saturday">Saturday</option>
                                                <option value="Sunday" name="Sunday">Sunday</option>
                                            </select>
                                        </td>
                                        <td class="px-2 my-auto" colspan="2">
                                            <p class="flex-2 pr-4 text-left justify-left text-gray-400 text-xs font-semibold mb-1 ml-3">
                                            Please choose the time correctly.</p>
                                            <p class="flex-2 pr-4 text-left justify-left text-gray-400 text-xs font-semibold mb-1 ml-3">
                                            Read the rules.</p>
                                        </td>
                                    </tr>
                                    <tr class="mb-8">
                                        <td class="w-1/6 px-2">
                                            <label for="code" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Time</label>
                                        </td>
                                        <td class="px-2">
                                            <input type="time" name="time" id="time" required placeholder="00:00 AM"
                                                class="w-full flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                        </td>
                                        <td class="w-1/6 px-2">
                                            <label for="place" class="flex-2 pl-12 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Location</label>
                                        </td>
                                        <td class="px-2">
                                            <input type="text" name="place" id="place" required placeholder="Location .."
                                                class="w-full flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <p class="mx-5 m-2 text-gray-400 font-semibold text-xs">Please read the rules:</p>
                                            <p class="mx-5 m-2 text-gray-400 font-semibold text-xs">If you choose weekday, please select time between 08:00PM untul 10:00PM.</p>
                                            <p class="mx-5 m-2 text-gray-400 font-semibold text-xs">If you choose weekeend, please select time between 09:00AM untul 10:00PM.</p>
                                            <p class="mx-5 m-2 text-gray-400 font-semibold text-xs">The class is weekly class. So, you will have to teach every week (4 times for a month).</p>
                                            <p class="mx-5 m-2 text-gray-400 font-semibold text-xs">One (1) subject will be charges to student RM30 a month.</p>
                                        </td>
                                    </tr>
                                </table>
                                <input type="text" class="hidden" name="username" value="<?=$roww['tutorUsername']?>"/>
                                <input type="text" class="hidden" name="course" value="<?=$roww['courseFull']?>"/>
                                <button class="mt-4 bg-indigo-700 hover:bg-indigo-800 text-sm text-white font-semibold py-2 mx-auto px-6 rounded shadow-lg hover:shadow-xl transition duration-200" 
                                        type="submit" name="addSchedule" value="addSchedule">
                                        Update Schedule
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        tConvert ('<?=time?>');
        function tConvert (time) {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join ('time1'); // return adjusted time or original string
            }

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