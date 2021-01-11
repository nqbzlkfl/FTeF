<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/adminController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/courseController.php';

if(!empty($_SESSION['username'])){
    $admin = new adminController();
    $data = $admin->getfullName();
    foreach($data as $row){
        $name = $row['adminName'];
    }

    $course = new courseController();
    $dataa = $course->viewcourse();
    $courseNum = $course->getCourse();

    if(isset($_POST['delete'])){
        $course->deleteCourse();
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

    <title>FTeF | Manage Course</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/responsive.dataTables.min.css"/>
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
                <h3 class="font-bold pl-2">Courses</h3>
            </div>
            <div class="my-5 pb-5 mx-auto w-full px-6 ">
                <div class="bg-white text-gray-900 font-bold border-1 border rounded shadow-xl ">
                    <div class="pt-5 px-6 flex space-x-8 mx-auto justify-center pb-5 w-5/12">
                        <div class="bg-blue-100 flex-1 border-b-4 border-blue-500 rounded-lg shadow-lg p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 px-6 bg-blue-600"><i class="fas fa-book fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-left text-gray-800">Total Course</h5>
                                    <h3 class="font-bold uppercase text-left text-gray-800 text-3xl"><?=$courseNum?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 flex space-x-12 w-10/12 mx-auto">
                        <h1 class="flex-auto flex my-auto text-xl justify-start">
                            Available Course 
                        </h1>
                        <div class="flex">
                            <a href="addCourse.php"><button class="font-semibold text-white h-10 px-5 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                                Add Course
                            </button></a>
                        </div>
                    </div>
                    <div class="w-10/12 mx-auto px-3 py-4 flex justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                         <table class="w-full text-md bg-white shadow-md rounded mb-4 border border-2 table-fixed">
                             <thead>
                                <tr class="border-b text-sm">
                                    <th class="text-center py-3 px-2 border-r border-gray-200" width="40px">No</th>
                                    <th class="text-center py-3 px-5 border-r border-gray-200" width="100px">Code</th>
                                    <th class="text-left py-3 px-5 border-r border-gray-200" width="210px">Name</th>
                                    <th class="text-left py-3 px-3 border-r border-gray-200">Description</th>
                                    <th class="text-center py-3 border-r border-gray-200" width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($dataa as $roww){
                                    if ($courseNum > 0){
                                        echo "<tr class='border-b hover:bg-blue-100 bg-gray-100'>"
                                            . "<td class='cursor-default text-sm text-center py-3 px-3 font-semibold border-r border-gray-200'>".$i."</td>"
                                            . "<td class='cursor-default text-sm text-center py-3 px-4 font-semibold border-r border-gray-200'>". $roww['courseCode']." </td>"
                                            . "<td class='cursor-default text-sm text-left py-3 px-5 font-semibold border-r border-gray-200'>". $roww['courseName']."</td>"
                                            . "<td class='cursor-default text-sm text-left text-gray-600 py-3 px-3 font-semibold border-r border-gray-200'>". $roww['courseDesc']."</td>"
                                            . "<td class='cursor-default text-center space-y-2 justify-center'><form action='' method='POST'>"
                                            . "<input type='hidden' name='courseCode' value='".$roww['courseCode']."'>";
                                            $code = $roww['courseCode']; 
                                            echo "&nbsp;&nbsp;<input type='button' name='edit' onclick=window.location='editCourse.php?param={$code}'
                                                    class='cursor-pointer text-xs h-9 px-5 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700' 
                                                    value='EDIT'>
                                                    &nbsp;<input type='submit' name='delete' 
                                                    class='cursor-pointer text-xs h-9 px-5 my-auto text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                                    value='DELETE'>
                                                    </form></td>
                                                    </tr>";
                                        $i++;
                                    } else if ($courseNum == 0){
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