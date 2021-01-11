<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/feedbackController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

if(!empty($_SESSION['username'])){
    $tutor = new tutorController();
    $dataN = $tutor->getfullName();
    foreach($dataN as $row){
        $name = $row['tutorName'];
        $photo = $row['tutorPhoto'];
        $bank = $row['tutorBankType'];
        if ($bank == NULL){
            header("Location:bankAccount.php");
        }
    }
    

    $data = new feedbackController();
    $dataa = $data->feedbackList();
    
    
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

    <title>FTeF | Feedback View</title>
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

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">View Feedback</h3>
            </div>

            <div class="flex flex-wrap mx-auto justify-center pt-12">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-comment fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Feedback</h5>
                                <h3 class="font-bold text-3xl">0 <span class="text-green-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-yellow-100 border-b-4 border-yellow-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-star fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Average Stars</h5>
                                <h3 class="font-bold text-3xl">0 <span class="text-yellow-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                
                
            </div>

            <div class="flex flex-row flex-wrap flex-grow mt-2">

            <div class="container mx-auto py-6 px-4 rounded-md">
                    <h1 class="text-3xl py-4 border-b mb-10">List of Feedback</h1>
                    <!-- <div class="mb-4 flex justify-between items-center">
                        <div class="flex-1 pr-4">
                            <div class="relative md:w-1/3">
                                <input type="search"
                                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    placeholder="Search...">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="bg-gray-200 rounded-t-lg shadow relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-gray-200 table-striped">
                            <tbody>
                                <tr class="bg-gray-200 top-0 border-b border-gray-200 px-6 py-4 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                    <th class="text-left p-3 flex-1">From</th>
                                    <th class="text-left p-3 flex-1">Course</th>
                                    <th class="text-center p-3 flex-1">Rate</th>
                                    <th class="text-center p-3 flex-1">Action</th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="overflow-x-auto bg-white rounded-b-lg shadow overflow-y-auto relative" style="height: 405px;">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped">
                            <tbody>
                            <?php
                                $ii= 0;
                                foreach($dataa as $row){
                                $ii++;
                                echo "<tr class='flex border-dashed border-b border-gray-200 px-6 py-4'>"
                                 ."<td class='text-left p-3 flex-1'>".$row['studentUsername']."</td>"
                                 ."<td class='text-left p-3 flex-1'>".$row['courseFull']."</td>"
                                 ."<td class='text-center p-3 flex-1'>".$row['ratingFeedback']."</td>";
                                
                            ?>   <td class="text-center p-3 flex-1"><button type="button" 
                                    class="mx-auto px-4 py-2 text-sm bg-blue-500 hover:bg-blue-700 text-white ounded focus:outline-none focus:shadow-outline"
                                    onclick="window.location='feedbackDetail.php?param=<?=$row['feedbackID']?>'"
                                    >View</button></td>
                            
                            <?php
                            }
                            ?>
                                <!--<tr class="border-dashed border-b border-gray-200 px-6 py-4">
                                    <td class="text-left p-3 px-5"><input type="text" value="student.name" class="bg-transparent"></td>
                                    <td class="text-left p-3 px-5"><input type="text" value="course.name" class="bg-transparent"></td>
                                    <td class="text-left p-3 px-5"><input type="text" value="feedback.rate" class="bg-transparent"></td>
                                    <td class="mx-auto p-3 px-5 py-3 flex justify-center border-dashed border-l">
                                    <button type="button" 
                                    class="mr-3 px-4 py-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    View</button>
                                </tr>-->
                                
                            </tbody>
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