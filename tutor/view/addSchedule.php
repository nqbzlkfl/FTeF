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
    }
    $schedule = new scheduleController();
    if(isset($_POST['addSchedule'])){
        $schedule->insertSchedule();
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

    <title>FTeF | Add Schedule</title>
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

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="flex flex-wrap bg-blue-700 p-2 shadow text-xl text-white mb-6">
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="mt-2 h-10 infline-flex w-10/12 flex flex-wrap mx-auto justify-center space-x-4">
                <div class="bg-white content-center flex-col border shadow-lg ">
                    <div class="flex my-auto w-2/3 mx-auto pt-3">
                        <div class="flexjustify-start cursor-pointer">
                            <a href="schedule.php?param=<?=$roww['courseFull']?>"><button class="font-semibold text-purple-500 text-sm h-8 px-5 m-2 rounded border border-purple-500 bg-purple-100 hover:bg-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-50">
                            Back
                            </button></a>
                        </div>
                        <h1 class="items-center pt-3 pl-3 font-semibold">
                            Add Schedule for 
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
                                        <select type="text" name="yos" id="yos" required
                                        class="w-full mb-2 flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                            <option value="" selected>--Choose Your Teaching Day--</option>
                                            <option value="Monday" name="Monday">Monday</option>
                                            <option value="Tuesday" name="Tuesday">Tuesday</option>
                                            <option value="Tuesday" name="Tuesday">Wednesday</option>
                                            <option value="Thursday" name="Thursday">Thursday</option>
                                            <option value="Friday" name="Friday">Friday</option>
                                            <option value="Saturday" name="Saturday">Saturday</option>
                                            <option value="Sunday" name="Sunday">Sunday</option>
                                        </select>
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
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">Please read:</p>
                                        <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">If you choose weekday, please select time between 08:00PM untul 10:00PM</p>
                                        <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">If you choose weekeend, please select time between 09:00AM untul 10:00PM</p>
                                        <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">The class is weekly class. So, you will have to teach every week (4 times for a month)</p>
                                    </td>
                                </tr>
                            </table>
                            <input type="text" class="hidden" name="username" value="<?=$roww['tutorUsername']?>"/>
                            <input type="text" class="hidden" name="course" value="<?=$roww['courseFull']?>"/>
                            <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-md text-white font-semibold py-2 mx-auto px-6 rounded shadow-lg hover:shadow-xl transition duration-200" 
                                    type="submit" name="addSchedule" value="addSchedule">
                                    Add Schedule
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        /* $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            $('#date').attr('min', maxDate);
        }); */

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