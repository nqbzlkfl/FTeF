<?php
session_start();
session_destroy();
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/tutor/controller/tutorController.php';

$tutor = new tutorController();
if(isset($_POST['login'])){
    $tutor->login();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Login (Tutor)</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="../img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../resources/scripts/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="../resources/scripts/jQuery.js"></script>
    
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #F5F5F5 0%, #F7F7F7 74%);
        }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="body-bg min-h-screen pt-8 md:pt-9 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <img class="w-4/12 justify-center mx-auto" src="../img/logo-black.png" alt="logo" id="logo-startup">
        </a>
    </header>

    <main class="bg-white max-w-sm mx-auto p-8 md:p-8 my-5 rounded-lg shadow-lg">
        <section>
            <h3 class="font-bold text-2xl text-center"><span class="text-blue-700">FK Tutor eFinder</span> Tutor Login</h3>
            <p class="text-gray-600 pt-2 text-center">Sign in to your account.</p>
        </section>

        <section class="mt-6">
            <form class="flex flex-col" method="POST" action="">
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="username">Username</label>
                    <input type="text" id="username" name="username" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                </div>
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 hover:underline mb-6">Forgot your password?</a>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="login" value="LOGIN">Sign In</button>
               
            </form>
            <div class="max-w-lg mx-auto text-center mt-8">
                <p class="text-blue-700">Don't have an account? <a href="view/register.php" class="font-bold hover:underline">Sign up</a>.</p>
            </div>
        </section>
    </main>

    <footer class="max-w-lg flex-col mx-auto flex item-center justify-center text-blue-500">
        <a href="../" class="text-center hover:underline">Back to Homepage</a>
        </br>
        <a href="../admin/" class="h-10 px-3 pt-2 w-1/4 mx-auto text-center text-blue-100 transition-colors duration-150 bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Admin Section</a>
    </footer>
</body>
</html>