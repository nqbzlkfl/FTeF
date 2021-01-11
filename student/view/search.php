<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $roww){
        $name = $roww['studentName'];
        $studentid = $roww['studentMatricid'];
    }
    $tutor = new tutorController();
    $data1 = $tutor->viewTutor();
    /* $tutorNum = $admin->getTutor(); */
}
else{
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Search</title>
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
        
        <div class="main-content flex-1 bg-gray-100 h-full mt-12 md:mt-2 pb-24 md:pb-5 relative">

            <div class="mt-4 w-2/3 mx-auto h-auto border-b border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white">
                <div class="mx-auto grid grid-cols-1 md:grid-cols-1 gap-1 w-1/2 justidy-center">
                    <div class="grid grid-cols-1 gap-1 border">
                        <div class="flex border rounded bg-gray-300 items-center p-2 ">
                            <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui"
                                      d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/>
                            </svg>
                            <input type="text" placeholder="Enter course name..."
                                   class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                        </div>
                        <div class="flex flex-col md:flex-row mx-auto"><!-- 
                                <div class="p-2 rounded px-6">
                                    <h2 class="text-lg">
                                        Filter
                                    </h2>
                                </div>
                                <div class="pt-6 md:pt-0 md:pl-6 px-6">
                                    <select class="border p-2 rounded">
                                        <option>Search by course</option>
                                        <option>BCN3153</option>
                                        <option>BCS2133</option>
                                    </select>
                                </div> -->
                            <div class="p-2 rounded px-6">
                                <h2 class="text-lg">
                                    Sort by
                                </h2>
                            </div>
                            <div class="pt-6 md:pt-0 md:pl-6">
                                <select class="border p-2 rounded">
                                    <option>Sort</option>
                                    <option>Rating</option>
                                    <option>Name</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result -->
            <div class="w-2/3 mx-auto h-auto border-b border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white">
                <div class="mx-auto h-auto bg-white">
                    <div class="mx-auto items-center">
                        <?php require_once 'searchtable.php' ?>
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