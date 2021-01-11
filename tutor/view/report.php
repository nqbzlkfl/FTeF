<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/feedbackController.php';

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
    $report = new feedbackController();
    if(isset($_POST['report'])){
        $report->reportCreate();
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

    <title>FTeF | Report Problem</title>
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

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12 h-screen max-h-auto z-0">

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
                <h3 class="font-bold pl-2">Report</h3>
            </div>
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <!-- <div class="text-left justify-start cursor-pointer">
                    <a href="course.php?param=<?=urlencode($roww['courseFull'])?>"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div> -->
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                <span class="fa fa-exclamation-circle my-auto"></span>&nbsp Report Your Problem 
                </h1>
            </div>
            <!-- Start -->
            <div class="mt-2 w-10/12 mx-auto border-b border-gray-300 shadow-lg p-4 bg-white">
                <div class="md:flex md:flex-row sm:flex-none sm:flex-col sm:mx-auto space-x-4 mx-auto justify-center">
                    <form  method="POST" action="" enctype="multipart/form-data">
                        <table class="mb-4 table-fixed w-10/12 mx-auto">
                            <tr>
                                <td width="150px" class="h-24">
                                    <label for="title" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Title</label>
                                </td>
                                <td>
                                    <input type="text" name="title" id="title" required
                                    class="w-full flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                    placeholder="Problem allowance, error & etc.. ">
                                </td>  
                            </tr>
                            <tr>
                                <td  width="150px"  class="h-14">
                                    <label for="desc" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Description</label>
                                </td>
                                <td>
                                    <textarea type="text" name="desc" id="desc" required
                                    class="-mb-1 w-full h-48 flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                    placeholder="Mention your problem &#10;-If does not receive allowance, please mention Invoice ID &#10;-If problem with course registeration, mention the error &#10;-Or mention other error"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px" class="h-24">
                                    <label for="fileInput" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3"><h1 class="ml-3">Photo of Error<h1 class="ml-3 text-gray-600 text-xs">(Optional)</h1></h1>
                                    </label>
                                </td>
                                <td>
                                    <input type="file" name="fileInput" id="fileInput"
                                    class="w-full flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"/>
                                </td>  
                            </tr>
                        </table>
                        <input type="hidden" name="username" value="<?=$username?>">
                        <input type="hidden" name="name" value="<?=$name?>">
                        <button class="mx-auto text-center flex mb-4 font-semibold text-sm text-white p-3 px-4 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" 
                        type="submit" name="report" value="report">
                            CREATE
                        </button>
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