<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

if(!empty($_SESSION['username'])){
  
    $course = new courseController();
    if(isset($_POST['addCourse'])){
        $course->insertSubject();
    }

    
    $dataa = $course->courseList();
    
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

    <title>FTeF | Add Course</title>
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
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto border shadow-lg items-center">
            <div class="text-left justify-start cursor-pointer">
                    <a href="manageCourse.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                    Register New Course
                </h1>
            </div>
            <div class="bg-white mt-2 w-10/12 px-4 py-2 flex mx-auto border shadow-lg items-center">
                <div class="flex flex-wrap mx-auto justify-center w-2/3 pt-1 space-y-4">
                    <form class="p-4 pt-8 m-4 flex-1 flex-col bg-white border-2 rounded" method="POST" action="#" enctype="multipart/form-data">
                        <div class="mb-1 pt-3 rounded bg-gray-200">
                                <label for="course" class="block text-gray-700 text-sm font-bold mb-1 ml-3">Add Subject to Teach</label>
                                <select type="text" name="course" id="course"
                                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                    <option value="" selected>--Subject to Choose--</option>
                                    <?php
                                        $ii= 0;
                                        foreach($dataa as $row){
                                            $ii++;
                                            echo 
                                            "<option value='". $row['courseCode'] . ' ' .$row['courseName'] ."'>" .$row['courseCode']. ' ' .$row['courseName'] ."</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="mb-1 pt-3 rounded bg-gray-200 border-b-4 border-gray-300 focus:border-blue-600 transition duration-500">
                            <div class="my-2 text-center flex-inline flex">
                                <div class="flex-1">
                                    <div class="flex-inline">
                                            <label 
                                                for="fileInput1"
                                                type="button"
                                                class="flex-1 cursor-pointer inline-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">                
                                                Upload Result
                                            </label>
                                            <input class="flex-1 mx-auto text-gray-700 text-md text-center cursor-default focus:outline-none bg-transparent"
                                                id="disp" type="text" value="File name" readonly />
                                        </div>
                                    <div class="mx-auto w-9/12 text-gray-500 text-xs text-justify pt-2">Please upload your examination result based on the semester that included the subject you applied in PDF format only, as the proof of eligibility.</div>
                                </div>
                                <input 
                                required name="tutorGrad" id="fileInput1" class="hidden" accept="application/pdf"  type="file">
                            </div>
                        </div>
                        <div class="mb-1 pt-3 rounded bg-gray-200">
                                <label for="course" class="block text-gray-700 text-sm font-bold mb-1 ml-3">Day to Teach</label>
                                <select type="text" name="tDay" id="tDay"
                                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                    <option value="" selected>--Day--</option>
                                        <option value="Monday">MONDAY</option>
                                        <option value="Tuesday">TUESDAY</option>
                                        <option value="Wednesday">WEDNESDAY</option>
                                        <option value="Thursday">THURSDAY</option>
                                        <option value="Saturday">SATURDAY</option>
                                        <option value="Sunday">SUNDAY</option>
                                </select>
                        </div>
                        <div class="mb-1 pt-3 rounded bg-gray-200">
                                <label for="course" class="block text-gray-700 text-sm font-bold mb-1 ml-3">Time to Teach</label>
                                <input type="time" name="tTime" id="tTime"
                                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                        </div>
                        <td colspan="2">
                            <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">Please read:</p>
                            <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">If you choose weekday, please select time between 08:00PM untul 10:00PM</p>
                            <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">If you choose weekeend, please select time between 09:00AM untul 10:00PM</p>
                            <p class="mx-5 m-2 text-gray-400 font-semibold text-sm">The class is weekly class. So, you will have to teach every week (4 times for a month)</p>
                        </td>
                        <div class="pt-3">
                            <button class="block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 mx-auto px-6 rounded shadow-lg hover:shadow-xl transition duration-200" 
                            type="submit" name="addCourse" value="addCourse">
                            Add Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        //File PDF
        document.getElementById('fileInput1').onchange = uploadOnChange;
        function uploadOnChange() {
            var filename = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            document.getElementById('disp').value = filename;
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