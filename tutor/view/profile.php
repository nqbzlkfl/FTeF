<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/feedbackController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

if(!empty($_SESSION['username'])){
    $tutor = new tutorController();
    $data = $tutor->getfullName();
    foreach($data as $row){
        $email = $row['tutorEmail'];
        $username = $row['tutorUsername'];
        $password = $row['tutorPass'];
        $name = $row['tutorName'];
        $matricid = $row['tutorMatricid'];
        $phone = $row['tutorPhone'];
        $bod = $row['tutorBOD'];
        $gender = $row['tutorGender'];
        $faculty = $row['tutorFaculty'];
        $program = $row['tutorProgram'];
        $yos = $row['tutorYOS'];
        $photo = $row['tutorPhoto'];
        $joined = $row['tJoinedDate'];
        $bank = $row['tutorBankType'];
        if ($bank == NULL){
            header("Location:bankAccount.php");
        }
        if ($row['tutorStatus'] == "1"){
            $status = "ACTIVE";
        }
        else{
            $status = "Deactive";
        }
        if ($row['tutorBankType'] == NULL){
            $bty = "None";
        } else {
            $bty = $row['tutorBankType'];
        }
        if ($row['tutorBankAcc'] == NULL){
            $bno = "None";
        } else {
            $bno = $row['tutorBankAcc'];
        }
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bod), date_create($today));
    }
    /* $y1 = $row['tutorBOD']->date('Y');
    $y2 = date('Y'); */
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

    <title>FTeF | Your Profile</title>
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

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="flex bg-blue-700 p-2 shadow text-xl text-white w-full mb-6">
                <h3 class="flex-1 font-bold pl-2">Profile</h3>
            </div>
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-10/12 p-4 flex-col mx-auto border shadow-lg items-center">
                <div class="px-2 inline-flex w-full items-center">
                    <h1 class="pl-2 text-lg font-semibold justify-start">
                        Account Status:&nbsp;<h1 class="text-sm font-bold text-left bg-green-100 text-green-700 p-2 rounded rounded-full"><?=$status?></h1>
                    </h1>
                    <div class="flex-1 text-right cursor-default">
                        <a href="editProfile.php"><button class="font-semibold mr-2 text-white h-10 px-5 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
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
                            <tr>
                                <td colspan="5">
                                    <div class="mx-auto w-32 h-32 border rounded-full bg-gray-100 shadow-inset">
                                        <img id="image" class="object-cover w-full h-32 rounded-full" src="../../img/Profile/<?=$photo?>" />
                                    </div>
                                    <div class="mb-4 text-center cursor-pointer">
                                        <a href="editPhoto.php"><button class="font-semibold text-sm text-blue-500 border border-blue-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                                            Edit Photo
                                        </button></a>
                                    </div>
                                </td>
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
                            <tr class="h-10">
                                <th colspan="5" class="text-left pt-4">Bank Account Details</th>
                            </tr>
                            <tr class="h-10">
                                <td>Bank Name</td>
                                <td><?=$bty?></td>
                            </tr>
                            <tr class="h-10">
                                <td>Bank Account</td>
                                <td><?=$bno?></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="5">
                                    <div class="mb-4 text-center cursor-pointer justify-start">
                                        <a href="bankAccount.php"><button class="font-semibold text-sm text-blue-500 border border-blue-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                                            Edit Bank Account
                                        </button></a>
                                    </div>
                                </td>
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