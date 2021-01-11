<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $row){
        $email = $row['studentEmail'];
        $username = $row['studentUsername'];
        $password = $row['studentPass'];
        $name = $row['studentName'];
        $matricid = $row['studentMatricid'];
        $phone = $row['studentPhone'];
        $bod = $row['studentBOD'];
        $gender = $row['studentGender'];
        $faculty = $row['studentFaculty'];
        $program = $row['studentProgram'];
        $yos = $row['studentYOS'];
        if ($row['studentStatus'] == "1"){
            $status = "ACTIVE";
        }
        else{
            $status = "Deactive";
        }
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bod), date_create($today));
    }
    /* $y1 = $row['tutorBOD']->date('Y');
    $y2 = date('Y'); */
    if(isset($_POST['update'])){
        $student->edit();
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

    <title>FTeF | Tutor Profile </title>
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

        <div class="main-content flex-1 bg-gray-100 mt-12 pt-6 md:mt-2 pb-24 md:pb-5">
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-8/12 p-4 flex-col mx-auto border shadow-lg items-center">
                <div class="inline-flex w-full space-x-12 items-center">
                    <h1 class="flex-1 pl-2 text-lg font-semibold justify-start">
                        Account Status: <?=$status?>
                    </h1>
                    <div class="flex-1 text-right cursor-pointer r">
                        <a href="editProfile.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            Edit Profile
                        </button></a>
                    </div>
                </div>
                <div class="flex-auto"> 
                    <div class="p-4 pt-8 m-4 flex-wrap bg-white border-2 roundedr" method="POST" action="#">
                        <table class="border-red-500 mx-auto w-2/3">
                            <tr>
                                <th colspan="5" class="text-left">Account Details</th>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Username</td>
                                <td colspan="4"><?=$username?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Email</td>
                                <td><?=$email?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input class="outline-none cursor-default" type="password" value="<?=$password?>" readonly/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="5">
                                    <div class="mb-4 text-center cursor-pointer justify-start">
                                        <a href="changePassword.php"><button class="font-semibold text-sm text-blue-500 border border-blue-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                                            Change Password
                                        </button></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="h-10">
                                <th colspan="5" class="text-left pt-4">Personal Details</th>
                            </tr>
                            <tr class="h-10">
                                <td>Name</td>
                                <td><?=$name?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Matric ID</td>
                                <td><?=$matricid?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Age</td>
                                <td>
                                    <?php $today = date("Y-m-d");
                                    $diff = date_diff(date_create($bod), date_create($today));
                                    echo $diff->format('%y'); ?>
                                </td>
                            </tr>
                            <tr class="h-10">
                                <td>Birth of Date</td>
                                <td><?=$bod?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Contact Number</td>
                                <td><?=$phone?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Gender</td>
                                <td><?=$gender?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Faculty</td>
                                <td><?=$faculty?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Program</td>
                                <td><?=$program?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Year of Study</td>
                                <td><?=$yos?></td>
                            </tr>
                        </table>
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