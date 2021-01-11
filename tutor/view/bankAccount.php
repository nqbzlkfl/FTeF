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
        if ($row['tutorStatus'] == "1"){
            $status = "ACTIVE";
        }
        else{
            $status = "Deactive";
        }
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bod), date_create($today));
    }

    if(isset($_POST['update'])){
        $tutor->updateBank();
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
    <link rel="icon" type="image/png" href="img/logo-icon.png"/>

    <title>FTeF | Update Your Bank Account</title>
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
            <?php if($bank == NULL){ ?>
            <div class="bg-red-100 w-10/12 p-2 px-6 mb-2 flex mx-auto space-x-12 rounded border-2 border-red-400 shadow-lg items-right">
                <div class="text-sm text-red-400">
                    <h3 class="font-semibold">Please update your bank account first for payment process in future, Thank you!</h3>
                </div>
            </div>
            <?php }
            else {
            } ?>
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <div class="text-left justify-start cursor-pointer">
                    <a href="profile.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                    Bank Account Details
                </h1>
            </div>
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-10/12 p-4 flex-col mx-auto border shadow-lg items-center">
                <div class="flex-auto"> 
                    <form class="p-4 pt-8 mx-4 flex-wrap bg-white rounded" method="POST" action="#">
                        <table class="border-red-500 mx-auto w-2/3">
                            <tr class="h-10">
                                <td colspan="1" class="text-right pr-4">Bank Name </td>
                                <td colspan="2"><input required placeholder="Maybank, etc" name="bName" class="border border-gray-700" type="text" value="" /></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="1" class="text-right pr-4">Account Number </td>
                                <td colspan="2"><input required placeholder="Account No" name="bAcc" class="border border-gray-700" type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="" /></td>
                            </tr>
                            <tr class="h-10">
                                <td colspan="5">
                                    <div class="mt-4 text-center cursor-pointer justify-start">
                                    <input type="hidden" name="username" class="w-full border border-gray-700 pl-2" value="<?=$username?>"/>
                                    <input type="hidden" name="email" class="w-full border border-gray-700 pl-2" value="<?=$email?>"/>
                                    <button type="submit" name="update" 
                                        class="font-semibold text-white h-10 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                        Update
                                    </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
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