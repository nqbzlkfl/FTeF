<?php
session_start();
session_destroy();
require_once $_SERVER['DOCUMENT_ROOT'].'/ftef/student/controller/studentController.php';

$student = new studentController();
if(isset($_POST['login'])){
    $student->login();
}

$student = new studentController();
if(isset($_POST['register'])){
    $student->register();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF| Login (Student)</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" src="../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../resources/scripts/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="../resources/scripts/jQuery.js"></script>
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
            <img class="w-5/12 justify-center mx-auto" src="../img/logo-black.png" alt="logo" id="logo-startup">
        </a>
    </header>

    <main class="bg-white max-w-sm mx-auto p-8 md:p-8 my-5 rounded-lg shadow-lg">
        <section>
            <h3 class="font-bold text-2xl">Welcome to <span class="text-blue-700">FK Tutor eFinder</span></h3>
            <p class="text-gray-600 pt-2">Sign in to your account.</p>
        </section>

        <section class="mt-6">
            <form class="flex flex-col" method="POST" action="">
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="username">Username</label>
                    <input type="text" id="username" name="username" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="email">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="password" required autocomplete="current-password">
                </div>
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 hover:underline mb-6">Forgot your password?</a>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="login" value="LOGIN">Sign In</button>
            </form>
            <div class="max-w-lg mx-auto text-center mt-8">
                <p class="text-blue-700">Don't have an account? <a href="../student/view/register.php" class="font-bold hover:underline">Sign up</a>.</p>
            </div>
        </section>
    </main>

    <footer class="max-w-lg mx-auto flex justify-center text-blue-500">
        <a href="../" class="hover:underline">Back to Homepage</a>
    </footer>
</body>
</html>