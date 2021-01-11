<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/courseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';

$data = new courseController();
$dataa = $data->courseDrop();

$student = new studentController();

if(isset($_POST['register'])){
    $student->regstudent();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Sign Up for Tutor</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" src="../../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../../resources/scripts/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="../../resources/scripts/jQuery.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #F5F5F5 0%, #F7F7F7 74%);
        }
    </style>
</head>
<body class="body-bg min-h-screen pt-8 md:pt-9 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <img class="w-4/12 justify-center mx-auto" src="img/logo-black.png" alt="logo" id="logo-startup">
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-8 my-5 rounded-lg shadow-lg">
        <section>
            <h3 class="font-bold text-2xl text-center">Welcome to <span class="text-indigo-600">FK Tutor eFinder</span></h3>
            <p class="text-gray-600 pt-2 text-center">Are your student? Create your account now.</p>
        </section>

        <section class="mt-6">
            <form class="flex flex-col h-auto" method="POST" action="#">
                <?php
                require_once 'registerForm.php';
                ?>
            </form>
        </section>
    </main>

    <footer class="">
        <div class="max-w-lg mx-auto text-center mt-8">
                <p class="text-blue-600">Already register? <a href="../" class="font-bold hover:underline">Login here</a>.</p>
        </div></br>
        <a class="max-w-lg mx-auto flex justify-center text-blue-600" href="../../" class="hover:underline">Back to Homepage</a>
    </footer>
</body>
</html>