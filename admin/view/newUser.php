<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/adminController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/courseController.php';

if(!empty($_SESSION['username'])){
    $admin = new adminController();
    $data = $admin->getfullName();
    foreach($data as $row){
        $name = $row['adminName'];
    }
    $tutor = $admin->viewTutorNew();
    $tutorN = $admin->getTutorNew();

    $course = new courseController();
    $courseR = $course->regCourseNew();

    if(isset($_POST['approve'])){
        $admin->approveTutor();
        $course->approveRegCourse();
    }
    if(isset($_POST['delete'])){
        $admin->ignoreTutor();
    }

} else{
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | New Tutor Registration Approval</title>
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

    <!-- Content -->
    <div class="flex flex-col md:flex-row pt-2">
        
        <!-- Sidebar -->
        <?php
            require_once 'sidebar.php';
        ?>
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Tutor Approval</h3>
            </div>        
            <div class="my-5 pb-5 mx-auto w-full px-6 ">
                <div class="bg-white text-gray-900 font-bold border-1 border rounded shadow-xl ">
                    <div class="p-4 flex space-x-12">
                        <a href="manageUser.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            Back
                        </button></a>
                        <h1 class="flex-auto flex my-auto text-xl justify-start">
                            New Tutor (<?=$tutorN?>)
                        </h1>
                    </div>
                    <div class="px-3 py-4 flex justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                         <table class="w-full text-md bg-white shadow-md rounded mb-4 border border-2 table-fixed">
                             <thead>
                                <tr class="border-b text-sm">
                                    <th class="text-center py-3 border-r border-gray-200" width="40px">No</th>
                                    <th class="text-left py-3 px-5 border-r border-gray-200" width="230px">Account Details</th>
                                    <th class="text-left py-3 px-3 border-r border-gray-200" width="180px">Course Requested</th>
                                    <th class="text-center py-3 border-r border-gray-200" width="50px">Status</th>
                                    <th class="text-center py-3 border-r border-gray-200" width="140px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $tutorN = $tutorN;
                                foreach($tutor as $roww){
                                    if ($tutorN > 0){
                                        if($roww['tutorStatus'] == 2){
                                            $status = "PENDING";
                                        }
                                        else{
                                            $status = "INACTIVE";
                                        }
                                        echo "<tr class='border-b hover:bg-blue-100 bg-gray-100'>"
                                            . "<td class='cursor-default text-sm text-left py-3 px-3 font-semibold border-r border-gray-200'>".$i."</td>"
                                            . "<td class='cursor-default text-sm text-left py-3 px-5 font-semibold border-r border-gray-200'>
                                            <p>".$roww['tutorName']."</p><p class='text-gray-600'>"
                                            . "@".$roww['tutorUsername']."</p>" 
                                            . "<p class='text-gray-600'>".$roww['tutorEmail']."</p>
                                            </td>"
                                            . "<td class='cursor-default text-sm text-left py-3 px-4 font-semibold border-r border-gray-200'>". $roww['courseFull']."</p>" 
                                            . "<p><a class='text-center text-blue-700 font-bold'  target='_blank'
                                                href='../../img/Grad/".$roww['tutorGrad']."'>View Result</a></p></td>"
                                            . "<td width='100px' class='cursor-default text-sm text-center py-3 font-bold text-yellow-500 border-r border-gray-200'>".$status."</td>"
                                            . "<td class='cursor-default text-center my-auto justify-center'><form action='' method='POST'>"
                                            . "<input type='hidden' name='tutorUsername' value='".$roww['tutorUsername']."'>";
                                            /*if($status == "ACTIVE"){
                                                echo "<input type='submit' name='status' class='btn-warning' value='BLOCK'>";
                                            }
                                            else{
                                                echo "<input type='submit' name='status' class='btn-success' value='UNBLOCK'>";
                                            }*/
                                            echo "&nbsp;&nbsp;<input type='submit' name='approve' 
                                                    class='cursor-pointer text-xs h-9 px-5 font-semibold text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700' 
                                                    value='APPROVE'>
                                                    &nbsp;<input type='submit' name='delete' 
                                                    class='cursor-pointer text-xs h-9 px-5 font-semibold text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                                    value='DELETE'>
                                                    </form></td>
                                                    </tr>";
                                        $i++;
                                    } else if ($tutorN == 0){
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