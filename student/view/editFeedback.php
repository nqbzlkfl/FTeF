<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/tutorController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/feedbackController.php';

if(!empty($_SESSION['username'])){
    $student = new studentController();
    $data = $student->getStudentInfo();
    foreach($data as $row){
        $email = $row['studentEmail'];
        $username = $row['studentUsername'];
        $password = $row['studentPass'];
        $name = $row['studentName'];
        $matricid = $row['studentMatricid'];
        $phone = $row['studentPhone'];
        $bod = $row['studentBOD'];
        $gender = $row['studentGender'];
        $faculty = $row['studentFaculty'];
        $program = $row['studentProgram'];
        $yos = $row['studentYOS'];
        if ($row['studentStatus'] == "1"){
            $status = "ACTIVE";
        }
        else{
            $status = "Deactive";
        }
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bod), date_create($today));
    }
    
    $td = new tutorController();
    $tutor = $td->viewMyTutor();
    foreach ($tutor as $feed){
        $feedback = $feed['feedback'];
    }
    $tutorD = $td->tutorDetails($_GET['id'],$_GET['course']);
    $tutorU = $_GET['id'];
    foreach ($tutorD as $rowD){
        if ($rowD['tutorUsername'] == $tutorU){
            $email = $rowD['tutorEmail'];
            $usernameT = $rowD['tutorUsername'];
            $password = $rowD['tutorPass'];
            $nameT = $rowD['tutorName'];
            $matricid = $rowD['tutorMatricid'];
            $phone = $rowD['tutorPhone'];
            $bod = $rowD['tutorBOD'];
            $gender = $rowD['tutorGender'];
            $faculty = $rowD['tutorFaculty'];
            $program = $rowD['tutorProgram'];
            $yos = $rowD['tutorYOS'];
            $photo = $rowD['tutorPhoto'];
            $course = $rowD['courseFull'];
            $day = $rowD['teachDay'];
            $time = $rowD['teachTime'];
            $place = $rowD['teachPlace'];

            $time12  = date("g:i A", strtotime("$time"));
        }
    }
 
    $fb = new feedbackController();
    $feedb = $fb->viewFeedbackCourse($usernameT, $course);
    foreach ($feedb as $fbData){
        $fStar = $fbData['ratingFeedback'];
        $fTutor = $fbData['tutorUsername'];
        $fStudent = $fbData['studentUsername'];
        $fCourse = $fbData['courseFull'];
        $fFeedback = $fbData['studentFeedback'];
    }
    if(isset($_POST['saveFeedback'])){
        $fb->saveFeedback();
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

    <title>FTeF | Edit feedback for <?=$course?></title>
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

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-10/12 p-4 mt-6 flex-col mx-auto border shadow-lg items-center">
                <div class="inline-flex w-full space-x-12 items-center">
                    <div class="flex-1 flex text-left cursor-pointer">
                        <a href="tutor.php?id=<?=urlencode($usernameT)?>&course=<?=urlencode($course)?>"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                            Back
                        </button></a>
                        <h1 class="flex-auto capitalize text-left my-auto text-lg font-semibold justify-start">
                            &nbsp Edit your feedback  
                        </h1>
                    </div>
                </div>
                <div class="flex-auto"> 
                
                <div class="md:flex md:flex-row sm:flex-none sm:flex-col sm:mx-auto space-x-4 mx-auto justify-center">
                <form  method="POST" action="" enctype="multipart/form-data">
                        <table class="mb-4 table-fixed w-8/12 mx-auto">
                            <tr>
                                <td width="115  px" class="h-10">
                                    <label for="nameT" class=" pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Tutor Name</label>
                                </td>
                                <td>
                                    <input type="text" name="nameT" id="nameT" readonly
                                    class="text-md text-gray-900 font-bold w-full cursor-default flex-1 pt-2 bg-blue-200 rounded text-gray-700 outline-none border-b-4 border-blue-600 px-3 pb-3"
                                    value="<?=$nameT?>">
                                </td>  
                            </tr>
                            <tr>
                                <td width="115  px" class="h-10">
                                    <label for="userT" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Tutor Username</label>
                                </td>
                                <td>
                                    <input type="text" name="userT" id="userT" readonly
                                    class="text-md text-gray-900 font-bold w-full cursor-default flex-1 pt-2 bg-blue-200 rounded text-gray-700 outline-none border-b-4 border-blue-600 px-3 pb-3"
                                    value="<?=$usernameT?>">
                                </td>  
                            </tr>
                            <tr>
                                <td width="115  px" class="h-10">
                                    <label for="course" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Course</label>
                                </td>
                                <td>
                                    <input type="text" name="course" id="course" readonly
                                    class="text-md text-gray-900 font-bold w-full cursor-default flex-1 pt-2 bg-blue-200 rounded text-gray-700 outline-none border-b-4 border-blue-600 px-3 pb-3"
                                    value="<?=$course?>">
                                </td>  
                            </tr>
                            <tr>
                                <td  width="115 px"  class="h-14">
                                    <label for="feed" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Feedback</label>
                                </td>
                                <td>
                                    <textarea type="text" name="feed" id="feed" required
                                    class="font-semibold mt-4 -mb-1 w-full h-48 flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3"
                                    placeholder=""><?=$fFeedback ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td width="115px" class="h-14">
                                    <label for="rate" class="my-auto pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Rate (Stars)
                                    </label>
                                </td>
                                <td>
                                    <select name="rate" id="rate" class="font-semibold -mb-1 w-full  flex-1 pt-2 bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                                        <option class="font-semibold" required value="5">5 Stars</option>
                                        <option class="font-semibold" value="4">4 Stars</option>
                                        <option class="font-semibold" value="3">3 Stars</option>
                                        <option class="font-semibold" value="2">2 Stars</option>
                                        <option class="font-semibold" value="1">1 Stars</option>
                                    </select>
                                </td>  
                            </tr>
                        </table>
                        <input type="hidden" name="userS" value="<?=$username?>">
                        <input type="hidden" name="nameS" value="<?=$name?>">
                        <button class="mx-auto text-center flex mb-4 font-semibold text-sm text-white p-3 px-4 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" 
                        type="submit" name="saveFeedback" value="saveFeedback">
                            SAVE
                        </button>
                    </form>
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