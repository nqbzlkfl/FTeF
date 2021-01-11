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
    if(isset($_POST['savePhoto'])){
        $tutor->editPhoto();
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

    <title>FTeF | Edit Profile Photo</title>
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
            <div class="bg-white w-10/12 px-4 py-2 flex mx-auto space-x-2 border shadow-lg items-center">
                <div class="text-left justify-start cursor-pointer">
                    <a href="profile.php"><button class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                        Back
                    </button></a>
                </div>
                <h1 class="flex-auto flex text-right text-lg font-semibold justify-start">
                    Edit Your Profile Photo
                </h1>
            </div>
                <!-- <img src='../../img/Profile/?=$photo?>'> -->
            <div class="bg-white w-10/12 p-4 flex-col mx-auto border shadow-lg items-center">
                <div class="flex-auto"> 
                    <form class="p-4 pt-4 m-4 flex-wrap bg-white rounded" method="POST" action="#" enctype="multipart/form-data">
                        <table class="border-red-500 mx-auto w-2/3">
                            <tr>
                                <th colspan="5" class="text-center pb-4">Update your photo</th>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <!-- <div class="mx-auto w-32 h-32 border rounded-full relative bg-gray-100 shadow-inset">
                                        <img id="image" class="object-cover w-full h-32 rounded-full" src="../../img/Profile/<?=$photo?>" />
                                    </div>
                                    <div class="mb-4 text-center cursor-pointer">
                                        <a href="editPhoto.php"><button class="font-semibold text-sm text-blue-500 border border-blue-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">
                                            Upload Photo
                                        </button></a>
                                    </div> -->
                                    <div class="mb-5 text-center">
                                        <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                            <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" src="../../img/Profile/<?=$photo?>" />
                                        </div>   
                                        <label 
                                            for="fileInput"
                                            type="button"
                                            class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium"
                                        >
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                <circle cx="12" cy="13" r="3" />
                                            </svg>						
                                            Browse Photo -->
                                        </label>
                                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click upload profile</div>

                                        <input name="tutorPhoto" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0]; 
                                            var reader = new FileReader();
                                            reader.onload = (e) => image = e.target.result;
                                            reader.readAsDataURL(file);">
                                    </div>
                                    <div class="flex flex-wrap w-4/6 mx-auto pt-10">
                                        <button class="font-semibold mx-auto text-white h-10 px-5 m-2 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" 
                                        value="update" name="savePhoto" type="submit">Update</button>
                                    </div>  
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>