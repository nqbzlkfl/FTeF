<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

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
    
    $data = new courseController();
    $dataa = $data->courseDisplay();
    $countP = $data->courseCount();
    $counterPending = 0;
    foreach ($countP as $dum){
        $status = $dum['status'];
        if ($status == "2"){
            $counterPending = $counterPending + 1;
        }
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

    <title>FTeF | Manage Course</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
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

        <div class="main-content flex-1 bg-gray-100 h-screen mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="flex flex-wrap bg-blue-700 p-2 shadow text-xl text-white mb-6">
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto border shadow-lg items-center">
                <h1 class="flex-auto flex text-xl font-semibold justify-start">
                    Your Register Course
                </h1>
                <div class="flex justify-end text-right cursor-pointer">
                <a href="pendingCourse.php"><button class="font-semibold text-white h-10 px-5 m-2 rounded bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50">
                        Pending Course (<?=$counterPending?>)
                    </button></a>
                </div>
                <div class="flex justify-end text-right cursor-pointer">
                    <a href="addCourse.php"><button class="font-semibold text-white h-10 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        + Add Course
                    </button></a>
                </div>
            </div>
            <div class="mt-2 bg-white w-10/12 flex flex-wrap mx-auto justify-center pt-8 space-x-4 border shadow-lg">
                <?php
                foreach($dataa as $roww){
                $time = $roww['teachTime'];
                $time12  = date("g:i A", strtotime("$time"));
                    if($roww['status'] == 1){
                        if ($roww['teachDay'] == NULL || $time12 == NULL){
                        echo 
                        "<a href='course.php?param=".urlencode($roww['courseFull'])."' class='h-1/6 mb-8 w-2/3 md:w-1/2 xl:w-5/12'>
                            <div class='w-full mx-auto bg-red-100 border-b-4 border-red-600 rounded-lg shadow-lg p-5'>
                                <div class='flex flex-row items-center'>
                                    <div class='flex-shrink pr-4'>
                                        <div class='rounded-full p-5 bg-red-600'><i class='fas fa-book fa-2x fa-inverse'></i></div>
                                    </div>
                                    <div class='flex-1 text-right md:text-center'>
                                        <h5 class='text-left font-bold uppercase text-black'>".$roww['courseFull']."</h5>
                                        <p class='text-left text-red-700 font-bold'>Please Choose Time to Teach</p>
                                    </div>
                                </div>
                            </div>
                        </a>";} else {
                            echo 
                        "<a href='course.php?param=".urlencode($roww['courseFull'])."' class='h-1/6 mb-8 w-2/3 md:w-1/2 xl:w-5/12'>
                            <div class='w-full mx-auto bg-blue-100 border-b-4 border-blue-600 rounded-lg shadow-lg p-5'>
                                <div class='flex flex-row items-center'>
                                    <div class='flex-shrink pr-4'>
                                        <div class='rounded-full p-5 bg-blue-600'><i class='fas fa-book fa-2x fa-inverse'></i></div>
                                    </div>
                                    <div class='flex-1 text-right md:text-center'>
                                        <h5 class='text-left font-bold uppercase text-black'>".$roww['courseFull']."</h5>
                                        <p class='text-left text-blue-700 font-bold'>".$roww['teachDay']." ".$time12."</p>
                                    </div>
                                </div>
                            </div>
                        </a>";
                        }
                    }
                }
                ?>
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