<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

if(!empty($_SESSION['username'])){
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

    <title>FTeF | Pending Course</title>
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

            <div class="flex flex-wrap bg-blue-700 p-2 shadow text-xl text-white mb-6">
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="flex bg-white w-10/12 px-4 py-2 mx-auto border shadow-lg">
                <a href="manageCourse.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                    Back
                </button></a>
                <h1 class="text-xl font-semibold my-auto pl-2">
                    Status of registered course
                </h1>
                
            </div>
            <div class="mt-2 bg-white w-10/12 flex flex-wrap mx-auto h-screen justify-center pt-4 space-x-4 border shadow-lg">
                    <div class="px-3 py-4 flex justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                        <table class="w-full text-md bg-white shadow-md rounded border border-2 mb-4 table-fixed">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-center p-3 border-r border-gray-200" width="40px">No</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="210px">Course</th>
                                    <th class="text-center p-3 border-r border-gray-200" width="60px">Status</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="300px">Description</th>
                                    <th class="text-center p-3 border-r border-gray-200" width="80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($dataa as $roww){
                                    if($roww['status'] == 2){
                                        $status = "PENDING";
                                    echo "<tr class='cursor-default border-b hover:bg-blue-100 bg-gray-100'>"
                                        . "<td class='text-center text-sm p-3 px-5 font-normal border-r border-gray-200'>".$i."</td>"
                                        . "<td class='cursor-default text-sm text-left py-3 px-4 font-semibold border-r border-gray-200'>". $roww['courseFull']."</p>" 
                                            . "<p><a class='text-center text-blue-700 font-bold'  target='_blank'
                                                href='../../img/Grad/".$roww['tutorGrad']."'>View Your Result</a></p></td>"
                                        . "<td class='text-center text-sm font-bold text-yellow-600 border-r border-gray-200'>".$status."</td>"
                                        . "<td class='text-left text-sm p-3 px-5 font-semibold text-gray-600 border-r border-gray-200'>You application to register new subject not been approved yet.</td>"
                                        . "<td class='text-center my-auto'><form action='' method='POST'>"
                                        . "<input type='hidden' name='tutorUsername' value='".$roww['tutorUsername']."'>";
                                        /*if($status == "ACTIVE"){
                                            echo "<input type='submit' name='status' class='btn-warning' value='BLOCK'>";
                                        }
                                        else{
                                            echo "<input type='submit' name='status' class='btn-success' value='UNBLOCK'>";
                                        }*/
                                        echo "&nbsp;&nbsp;<input type='submit' name='delete' 
                                                class='cursor-pointer -ml-2 text-sm h-9 px-4 text-red-100 transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-red-700' 
                                                value='CANCEL'>
                                                </form></td>
                                                </tr>";
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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