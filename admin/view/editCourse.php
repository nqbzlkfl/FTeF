<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/adminController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/admin/controller/courseController.php';

if(isset($_SESSION['username'])){
    $admin = new adminController();
    $data = $admin->getfullName();
    foreach($data as $row){
        $name = $row['adminName'];
    }

    $course = new courseController();
    $dataa = $course->courseDetails($_GET['param']);
    foreach($dataa as $details){
        $code = $details['courseCode'];
        $cName = $details['courseName'];
        $desc = $details['courseDesc'];
    }
    if(isset($_POST['update'])){
        $course->updateSubject();
    }
}
else{
    header("Location:../manage_course.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Edit Course</title>
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
                <h3 class="font-bold pl-2">Edit Course(s)</h3>
            </div>
            <div class="bg-white my-5 pb-5 mx-auto w-4/6 border-1 border rounded shadow-xl ">
                <div class="inline-flex space-x-8 px-4 pt-8 pb-5 mx-auto">
                    <a href="manageCourse.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                    <h2 class="text-lg font-bold text-center text-gray-800 my-auto">Edit course details (Description Only)</h2>
                </div>
                <div class="mx-8 px-8">
                    <form  method="POST" action="">
                        <div class="flex w-2/3 mb-6 pt-3 mx-auto">
                            <label for="code" class="flex-2 pr-4 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Course Code</label>
                            <input type="text" name="code" id="code" readonly
                                class="flex-1 pt-2 bg-gray-300 rounded text-gray-700 focus:outline-none border-b-4 cursor-not-allowed border-blue-600 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                value="<?=$code?>">
                        </div>
                        <div class="flex w-2/3 mb-6 pt-3 mx-auto">
                            <label for="name" class="flex-2 pr-3 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">Course Name</label>
                            <input type="text" name="name" id="name" readonly
                                class="flex-1 pt-2 bg-gray-300 rounded text-gray-700 focus:outline-none border-b-4 cursor-not-allowed border-blue-600 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                value="<?=$cName?>">
                        </div>
                        <div class="flex w-2/3 mb-6 pt-3 mx-auto">
                            <label for="desc" class="flex-2 pr-6 pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1 ml-3">
                                <p>Course</p>
                                <p>Description</p>
                            </label>
                            <textarea name="desc" id="desc" rows="5" required
                            class="text-left flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                            ><?=$desc?></textarea>
                        </div>
                        <button class="block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 mx-auto px-6 rounded shadow-lg hover:shadow-xl transition duration-200" 
                        type="submit" name="update" value="update">
                        Update
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