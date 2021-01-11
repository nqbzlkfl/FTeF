<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/feedbackController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/paymentController.php';

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
    $pm = new paymentController();
    $success = $pm->viewSuccess();
    $successCount = $pm->getSuccess();
    $successTotal = $successCount * 30;
    $pending = $pm->viewCoursePending();
    $pendingCount = $pm->getCoursePending();
    $refund = $pm->viewRefund();
    $refundCount = $pm->getRefund();

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

    <title>FTeF | Earning (Tutor)</title>
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

        <div class="main-content flex-1 bg-gray-100 h-screen mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Earning</h3>
            </div>

            <div class="mt-6 bg-white w-10/12 flex mx-auto justify-center py-6 space-x-2 border shadow-lg">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-1 text-right md:text-left">
                                <h5 class="font-bold uppercase text-gray-600">Total Revenue</h5>
                                <h3 class="font-bold text-3xl">RM <?=$successTotal?> <span class="text-green-600"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-blue-100 border-b-4 border-blue-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-1 text-right md:text-left">
                                <h5 class="font-bold uppercase text-gray-600">Successful</h5>
                                <h3 class="font-bold text-3xl"><?=$successCount?> <span class="text-blue-600"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-1 text-right md:text-left">
                                <h5 class="font-bold uppercase text-gray-600">Pending</h5>
                                <h3 class="font-bold text-3xl"><?=$pendingCount?><span class="text-yellow-600"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>
            <!-- Second -->
            <div class="mt-2 bg-white w-10/12 flex mx-auto justify-center py-4 space-x-2 border shadow-lg px-2">
                <div class="flex-none w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600 text-center">Total Transaction</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-4"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Success", "Cancel"],
                                        "datasets": [{
                                            "label": "Issues",
                                            "data": [300, 100],
                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(255, 205, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="flex-1 w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="flex space-x-12 my-auto -pr-3">
                        <div class="flex my-auto">
                            <h1 class="flex-auto text-md justify-start m-2 -mr-0.5 font-semibold">Billing Management</h1> 
                            <h1 class=" my-auto text-sm text-gray-600 font-semibold">&nbsp(Unsuccessful)</h1>
                        </div>
                        <div class="flex">
                            <a class="-mr-3 -ml-1" href="earning.php"><button class="text-sm text-right font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                Success(<?=$successCount?>)
                            </button></a>
                            <a class="" href="earningPending.php"><button class="text-sm text-right font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                Pending(<?=$pendingCount?>)
                            </button></a>
                            <!-- <a href="earningRefund.php"><button class="text-sm font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                Failed
                            </button></a> -->
                            <a href="report.php"><button class="text-sm font-semibold text-red-500 border border-red-500 h-10 px-5 m-2 rounded bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                                Report
                            </button></a>
                        </div>
                    </div>
                    <div class="overflow-y-scroll h-96 border">
                        <table class="table-fixed">
                            <thead>
                                <tr class="border-b text-sm">
                                    <th class="text-center py-3 px-2 border-r border-gray-200" width="40px">No</th>
                                    <th class="text-center py-3 border-r border-gray-200" width="110px">Invoice No</th>
                                    <th class="text-left py-3 px-5 border-r border-gray-200" width="170px">Course</th>
                                    <th class="text-left py-3 px-5 border-r border-gray-200" width="180px">Student</th>
                                    <th class="text-center py-3 border-r border-gray-200" width="90px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($refund as $roww){
                                    if ($refundCount > 0){
                                        if($roww['paymentStatus'] == 3 && $roww['paymentTutor'] == 0){
                                            $status = "PENDING";
                                            echo "<tr class='border-b hover:bg-blue-100 bg-gray-100'>"
                                            . "<td class='cursor-default text-xs text-center py-3 px-3 font-semibold border-r border-gray-200'>".$i."</td>"
                                            . "<td width='100px' class='cursor-default text-xs text-center font-semibold border-r border-gray-200'>".$roww['paymentID']."
                                            <p class=' text-center mx-auto flex'></p></td>"
                                            . "<td class='cursor-default text-xs text-left py-3 px-4 font-semibold border-r border-gray-200'>". $roww['courseFull']."</p>" 
                                            ." </td>"
                                            . "<td class='cursor-default text-xs text-left py-3 px-5 font-semibold border-r border-gray-200'>
                                            <p>".$roww['tutorName']."</p><p class='text-gray-600'>@"
                                            .$roww['tutorUsername']."</p>" 
                                            . "</td>
                                            <td width='100px' class='cursor-default text-xs text-center font-bold text-red-700 border-r border-gray-200'><h1 class='p-1 mx-2 bg-red-200 rounded rounded-lg '>FAILED</h1></p>
                                            </tr>";
                                            $i++;
                                        }
                                        else{
                                            $status = "INACTIVE";
                                        }
                                    } else if ($refundCount == 0){
                                        echo  "<tr class='border-b hover:bg-blue-100 bg-gray-100'>"
                                        . "<td colspan='5' class='text-left py-3 px-2 font-normal border-r border-gray-200'>No new user</td>"
                                        . "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Earning</h5>
                                <h3 class="font-bold text-3xl">RM 6<span class="text-green-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-orange-100 border-b-4 border-orange-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-orange-600"><i class="fas fa-hand-holding-usd fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Pending</h5>
                                <h3 class="font-bold text-3xl">RM 0 <span class="text-orange-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-coins fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Successful</h5>
                                <h3 class="font-bold text-3xl">RM 6 <span class="text-yellow-600"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-row flex-wrap flex-grow mt-2">

                

                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                        "datasets": [{
                                            "label": "Likes",
                                            "data": [65, 59, 80, 81, 56, 55, 40],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Table</h5>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                    <tr>
                                        <th class="text-left text-blue-900">Class</th>
                                        <th class="text-left text-blue-900">Total Students</th>
                                        <th class="text-left text-blue-900">Revenue</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>BCS2133</td>
                                        <td>2</td>
                                        <td>RM 14</td>
                                    </tr>
                                    <tr>
                                        <td>BCS3133</td>
                                        <td>2</td>
                                        <td>RM 12</td>
                                    </tr>
                                    <tr>
                                        <td>BCS2233</td>
                                        <td>3</td>
                                        <td>RM 10</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="py-2"><a href="#">Load more...</a></p>

                        </div>
                    </div>
                </div> -->
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
        /*Filter dropdown options
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
        }*/
    </script>


</body>

</html>