
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <title>Welcome to FK Tutor eFinder</title>
      <meta name="author" content="name">
      <meta name="description" content="description here">
      <meta name="keywords" content="keywords,here">

      <link rel="icon" type="image/png" href="img/logo-icon.png"/>
      <link rel="stylesheet" type="text/css" href="resources/styles/tailwind.css"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <script type="text/javascript" src="resources/scripts/alphine.js"></script>
      <script type="text/javascript" src="resources/scripts/Chart.bundle.min.js"></script>
      <script type="text/javascript" src="resources/scripts/jQuery.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased bg-white">

        <!-- start header -->
        <header class="w-full bg-transparent fixed top-0 left-0 z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-6"
          id="navbar">
          <nav class="flex items-center justify-between">
            <div class="">
              <a href='#'>
                <img class="w-5/12 mx-right pointer-events-none" src="img/logo-vertical-black.png" alt="logo" id="logo-startup">
              </a>
            </div>

            <div class="block sm:hidden">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
              </button>
            </div>


            <div class="hidden sm:flex">
                                <ul class="flex flex-col sm:flex-row">
                                                    <li><a href="#" class="sm:px-4 py-2 block">Home</a></li>
                            <li><a href="#" class="sm:px-4 py-2 sm:hidden lg:block">About Us</a></li>
                            <li><a href="student/" class="sm:px-4 py-2 block text-blue-600 border border-gray-400 rounded-lg ml-4">Login</a></li>
                            <li><a href="student/view/register.php" class="sm:px-4 py-2 block bg-blue-600 text-white rounded-lg ml-4">Sign Up</a></li>
                                                                                    
              </ul>
            </div>
          </nav>
        </header>
        <!-- end header -->

        <!-- start hero section -->
        <section
          class="relative bg-blue-200 px-4 pt-32 pb-48 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 sm:pb-64 md:pt-40 md:pb-48 lg:pt-40 xl:pb-64 2xl:pt-56 2xl:pb-96 text-center sm:text-left">
            <div>
              <div class="relative w-full sm:w-2/3 lg:w-1/2 z-10">

                <h1 class="text-3xl lg:text-4xl xl:text-5xl leading-tight font-bold">FK Tutor eFinder lets you find 
                the tutor within the area.</h1>
                <p class="text-base leading-snug text-gray-700 mt-4">Search your tutor, make a session and have physical or  </br> online class with the tutors.</p>
                <a href="student/view/register.php" class="w-full block sm:inline-block mx-auto sm:w-auto m-4 p-40 sm:p-auto py-4 bg-blue-600 text-white rounded-lg mt-8">Get Start</a>
              </div>

              <div class="w-full absolute bottom-0 right-0">
                <img src="img/home-bg.png" alt="background" id="bgh" class="w-screen pointer-events-none"></img>
              </div>
          </div>
        </section>
        <!-- end hero section -->

        <!-- start how it works -->
        <section class="relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-20 text-center">
          <div>
            <h2 class="text-3xl leading-tight font-bold">How FK Tutor eFinder works?</h2>
          </div>

          <div class="flex flex-col md:flex-row items-start justify-between mt-12">
            <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4">
              <img src="images/icon-home-1.svg" alt="" class="mx-auto h-32">
              <h4 class="text-xl font-bold leading-tight mt-8">Create your account</h4>
              <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4 mt-4 md:mt-0">
              <img src="images/icon-home-2.svg" alt="" class="mx-auto h-32">
              <h4 class="text-xl font-bold leading-tight mt-8">Search the tutor</h4>
              <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4 mt-4 md:mt-0">
              <img src="images/icon-home-3.svg" alt="" class="mx-auto h-32">
              <h4 class="text-xl font-bold leading-tight mt-8">Check the session</h4>
              <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>

          <div class="mt-12 md:mt-20 w-full md:max-w-3xl mx-auto mb-8">
            <p class="text-xl mb-6">&ldquo;FairRate is beautiful, elegant and easy to apply. I’ve been able to apply for an
              amazing rate in just a minutes. Thank you very much for creating this impressive service!&rdquo;</p>
          </div>
        </section>
        <!-- end how it works -->

        <!-- start cta -->
        <section class="relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 text-center md:text-left -mt-32">
          <div class="flex flex-col md:flex-row items-center justify-between bg-blue-300 px-12 py-10 rounded-lg shadow-lg">
            <div class="w-full md:w-2/3">
              <h2 class="text-3xl leading-tight font-bold">Need help?</h2>
              <p class="mt-2 md:max-w-md">Contact our Customer Support that is always ready to help you with any possible questions, problems or
                information.</p>
            </div>

            <div class="w-full md:w-1/3 md:text-right mt-6 md:mt-0">
              <a href="#" class="inline-block px-6 py-4 bg-blue-600 text-white rounded-lg">Go to Support</a>
            </div>
          </div>
        </section>
        <!-- end cta -->

        <!-- start footer -->
        <footer class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-12 pb-10 text-center sm:text-left">
          <div class="flex flex-col sm:flex-row sm:flex-wrap">
            <div class="sm:w-1/2 lg:w-1/5">
              <h6 class="text-sm text-gray-600 font-bold uppercase">Career</h6>
              <ul class="mt-4">
                <li><a href="#">Become a Tutor</a></li>
                <li class="mt-2"><a href="tutor/">Tutor Login</a></li>
              </ul>
            </div>

            <div class="mt-8 sm:w-1/2 sm:mt-0 lg:w-1/5 lg:mt-0">
              <h6 class="text-sm text-gray-600 font-bold uppercase">Legal</h6>
              <ul class="mt-4">
                <li><a href="#">About Us</a></li>
                <li class="mt-2"><a href="#">Privacy Policy</a></li>
                <li class="mt-2"><a href="#">Terms of Use</a></li>
              </ul>
            </div>

            <div class="mt-8 sm:w-1/2 sm:mt-12 lg:w-1/5 lg:mt-0">
              <h6 class="text-sm text-gray-600 font-bold uppercase">Contact</h6>
              <ul class="mt-4">
                <li><a href="#">contact@fk.com</a></li>
                <li class="mt-2"><a href="#">+62 202 555 0117</a></li>
              </ul>
            </div>

            <div class="mt-12 sm:w-1/2 lg:w-2/5 lg:mt-0 lg:pl-12">
              <div>
                <img class="w-6/12 justify-right lg:-ml-5 pointer-events-none sm:justify-center" src="img/logo-black.png" alt="logo" id="logo-startup">

              </div>

              <p class="text-base text-gray-600 mt-4">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
                nibh.</p>
            </div>
          </div>

          <div class="mt-16">
            <hr class="mb-8">
            <p class="text-sm text-gray-600 text-center">2020 © FK Tutor eFinder. All rights reserved.</p>
          </div>
        </footer>
        <!-- end footer -->


        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-900 dark:bg-gray-900 sm:items-center sm:pt-0">
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                            <a href="http://127.0.0.1:8000/login" class="text-sm text-gray-700 underline">Login</a>

                                                    <a href="http://127.0.0.1:8000/register" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                                            </div>
            
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                
            </div>
        </div> -->

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script>
    $('.navbar-toggler').click(function () {
      $(this).toggleClass('active');
      $('.navigation-menu').toggleClass('hidden');
      $('#navbar').addClass('bg-white');
    });

    $(function () {
      var navigation = $("#navbar");

      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
          navigation.addClass("bg-white xl:py-4 shadow-md");
          navigation.removeClass("xl:py-8");
        } else {
          navigation.removeClass("bg-white xl:py-4 shadow-md");
          navigation.addClass("xl:py-8");
        }
      });
    });
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131505823-2');
  </script>
    </body>
</html>
