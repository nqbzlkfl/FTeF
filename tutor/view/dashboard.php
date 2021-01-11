<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/feedbackController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/scheduleController.php';

if(!empty($_SESSION['username'])){
    $tutor = new tutorController();
    $data = $tutor->getfullName();
    foreach($data as $row){
        $name = $row['tutorName'];
        $photo = $row['tutorPhoto'];
        $bank = $row['tutorBankType'];
        if ($bank == NULL){
            header("Location:bankAccount.php");
        }
    }
    
    if(isset($_POST['update'])){
        $tutor->edit();
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

    <title>FTeF | Dashboard (Tutor)</title>
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

        <div class="main-content flex-1 bg-gray-100 h-screen mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-700 p-2 shadow text-xl text-white mb-6">
                <h3 class="font-bold pl-2">Dashboard</h3>
            </div>
            <?php if($photo == 'default_photo_241325463.jpg'){ ?>
            <div class="bg-red-100 w-10/12 p-2 px-6 mb-2 flex mx-auto space-x-12 rounded border-2 border-red-400 shadow-lg items-right">
                <div class="text-sm text-red-400">
                    <h3 class="font-semibold">Please upload your profile photo to complete your profile. <a class="font-bold" href="profile.php">Click here</a> to update.</h3>
                </div>
            </div>
            <?php }
            else {
            } ?>
            <div class="bg-white w-10/12 p-4 flex mx-auto space-x-12 border shadow-lg items-right">
                <div class="p-2 text-xl text-black">
                    <h3 class="font-semibold">Welcome to dashboard, <a class="font-bold" href="profile.php"><?=$name?></a>.</h3>
                </div>
            </div>
            <div class="bg-white flex flex-wrap w-10/12 mx-auto justify-center mt-2 p-2 border shadow-lg items-right">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <a href="#"><div class="bg-gray-200 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fas fa-user-graduate fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="text-right font-bold uppercase text-gray-600">Total Student</h5>
                                <h3 class="text-right font-bold text-3xl">1 <span class="text-green-500"><i class=""></i></span></h3>
                            </div>
                        </div></a>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <a href="manageCourse.php"><div class="bg-gray-200 border-b-4 border-indigo-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-book fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="text-right font-bold uppercase text-gray-600">Course Teached</h5>
                                <h3 class="text-right font-bold text-3xl">1<span class="text-indigo-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div></a>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-200 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-calendar fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="text-right font-bold uppercase text-gray-600">Upcoming Session</h5>
                                <h3 class="text-right font-bold text-3xl">dd/mm/yy <span class="text-yellow-600"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
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