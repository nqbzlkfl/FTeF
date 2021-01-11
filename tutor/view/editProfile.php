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
        if ($row['tutorStatus'] == "1"){
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

    <title>FTeF | Edit Your Profile</title>
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
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <div class="text-left justify-start cursor-pointer">
                    <a href="profile.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                    Edit Your Profile
                </h1>
            </div>
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-10/12 pt-4 px-4 flex-col mx-auto border shadow-lg items-center">
                <div class="flex-auto"> 
                    <form class="px-4 pb-4 m-4 flex-wrap bg-white rounded" method="POST" action="#">
                        <table class="border-red-500 mx-auto w-2/3">
                            <tr>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-left">Account Details</th>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Username</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$username?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Email</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$email?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <th colspan="3" class="text-left pt-4">Personal Details</th>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Name</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$name?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Matric ID</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$matricid?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Birth of Date</td>
                                <td colspan="2"><input type="date" class="w-full border border-gray-700 pl-2" value="<?=$bod?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Contact Number</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$phone?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Gender</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$gender?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Faculty</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$faculty?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Program</td>
                                <td colspan="2"><input class="w-full border border-gray-700 pl-2" value="<?=$program?>" required/></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1">Year of Study</td>
                                <td colspan="2"><input type="number" min="1" max="6" class="w-full border border-gray-700 pl-2" value="<?=$yos?>" required/></td>
                            </tr>
                        </table>
                        <div class="flex flex-wrap w-4/6 mx-auto pt-5">
                                <button class="font-semibold text-center mx-auto text-white h-10 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" 
                                value="update" name="saveProfile" type="submit">Save</button>
                        </div>  
                    </form>
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