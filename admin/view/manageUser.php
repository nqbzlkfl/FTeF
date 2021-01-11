<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/adminController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/courseController.php';

if(!empty($_SESSION['username'])){
    $admin = new adminController();
    $data = $admin->getfullName();
    foreach($data as $row){
        $name = $row['adminName'];
    }

    $admin = new adminController();
    $tutor = $admin->viewTutor();
    $tutorNum = $admin->getTutor();
    $student = $admin->viewStudent();
    $studentNum = $admin->getStudent();
    $tutorCount = $admin->viewTutorNew();
    $counter = 0;
    $course = $admin->viewCourseNew();
    $courseN = $admin->getCourseNew();
    $counterC = 0;
    foreach ($tutorCount as $dum){
        $nameS = $dum['tutorUsername'];
        $counter = $counter + 1;
    }
    foreach ($course as $dum1){
        $name1 = $dum1['tutorUsername'];
        $counterC = $counterC + 1;
    }

    if(isset($_POST['deleteT'])){
        $admin->deleteTutor();
    }

    if(isset($_POST['deleteS'])){
        $admin->deleteStudent();
    }

} else{
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Manage User</title>
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
    <?php
        require_once 'navbar.php';
    ?>

    <!-- Content -->
    <div class="flex flex-col md:flex-row pt-2">
        
        <!-- Sidebar -->
        <?php
            require_once 'sidebar.php';
        ?>
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Users</h3>
            </div>

            <div class="flex flex-wrap">
            <!-- Tab -->
                <div 
                    x-data="{
                    openTab: 1,
                    activeClasses: 'bg-blue-300 border-b-2 border-blue-400 rounded-tl-lg rounded-tr-lg p-2',
                    inactiveClasses: 'text-blue-500 hover:text-blue-800'
                    }" 
                    class="pt-6 px-6 w-full"
                >
                    <ul class="flex border-b">
                    <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                        <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="rounded-tl-lg rounded-tr-lg bg-white inline-block py-2 px-4 font-semibold" href="#">
                            Tutors (<?=$tutorNum?>)
                        </a>
                    </li>
                    <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                        <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="rounded-tl-lg rounded-tr-lg bg-white inline-block py-2 px-4 font-semibold" href="#">
                            Students (<?=$studentNum?>)
                        </a>
                    </li>
                    </ul>
                    <div class="w-full">

                    <!-- Tutor Tab -->
                    <div x-show="openTab === 1">
                    <?php
                        require_once 'tableTutor.php';
                    ?>
                    </div>

                    <!-- Student Tab -->
                    <div x-show="openTab === 2">
                    <?php
                        require_once 'tableStudent.php';
                    ?>
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