<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Manage Students</title>
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

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Your Student</h3>
            </div>

            <div class="flex flex-wrap mx-auto justify-center pt-1">
                
                <!--<div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <--Metric Card--
                    <div class="bg-yellow-100 border-b-4 border-yellow-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-graduate fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Students</h5>
                                <h3 class="font-bold text-3xl">3 <span class="text-yellow-500"><i class=""></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <--/Metric Card--
                </div>-->

                <!--<div class="text-gray-900 bg-gray-100 font-bold">
                    <div class="p-4 flex">
                        <h1 class="text-3xl">
                            Student List
                        </h1>
                    </div>
                    <div class="p-4 group inline-block">
                        <button
                            class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
                        >
                            <span class="pr-1 font-semibold flex-1">Dropdown</span>
                            <span>
                            <svg
                                class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                />
                            </svg>
                            </span>
                        </button>
                        <ul
                            class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                        transition duration-150 ease-in-out origin-top min-w-32"
                        >
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Programming</li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">DevOps</li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                            <button
                                class="w-full text-left flex items-center outline-none focus:outline-none"
                            >
                                <span class="pr-1 flex-1">Langauges</span>
                                <span class="mr-auto">
                                <svg
                                    class="fill-current h-4 w-4
                                    transition duration-150 ease-in-out"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                    />
                                </svg>
                                </span>
                            </button>
                            <ul
                                class="bg-white border rounded-sm absolute top-0 right-0 
                        transition duration-150 ease-in-out origin-top-left
                        min-w-32
                        "
                            >
                                <li class="px-3 py-1 hover:bg-gray-100">Javascript</li>
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button
                                    class="w-full text-left flex items-center outline-none focus:outline-none"
                                >
                                    <span class="pr-1 flex-1">Python</span>
                                    <span class="mr-auto">
                                    <svg
                                        class="fill-current h-4 w-4
                                        transition duration-150 ease-in-out"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                    </span>
                                </button>
                                <ul
                                    class="bg-white border rounded-sm absolute top-0 right-0 
                            transition duration-150 ease-in-out origin-top-left
                            min-w-32
                            "
                                >
                                    <li class="px-3 py-1 hover:bg-gray-100">2.7</li>
                                    <li class="px-3 py-1 hover:bg-gray-100">3+</li>
                                </ul>
                                </li>
                                <li class="px-3 py-1 hover:bg-gray-100">Go</li>
                                <li class="px-3 py-1 hover:bg-gray-100">Rust</li>
                            </ul>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Testing</li>
                        </ul>
                        </div>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Username</th>
                                    <th class="text-left p-3 px-5">Name</th>
                                    <th class="text-left p-3 px-5">Email</th>
                                    <th class="text-left p-3 px-5">Status</th>
                                    <th></th>
                                </tr>
                                <tr class="border-b hover:bg-blue-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.username" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.status" class="bg-transparent">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-blue-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.username" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.status" class="bg-transparent">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-blue-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.username" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.status" class="bg-transparent">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-blue-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.username" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.status" class="bg-transparent">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                                <tr class="border-b hover:bg-blue-100 bg-gray-100">
                                    <td class="p-3 px-5"><input type="text" value="user.username" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.name" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" value="user.email" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select value="user.status" class="bg-transparent">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>-->

                <div class="flex flex-row flex-wrap flex-grow mt-2">

            <div class="container mx-auto py-6 px-4 rounded-md">
                    <h1 class="text-3xl py-4 border-b mb-4">List o Student</h1>
                    
                    <div class="mb-4 flex justify-between items-center">
                        <div class="flex-1 pr-4">
                            <div class="relative md:w-1/3">
                                <input type="search"
                                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    placeholder="Search...">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto bg-gray-200 rounded-t-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-gray-200 table-striped">
                            <tbody>
                                <tr class="bg-gray-200 top-0 border-b border-gray-200 px-6 py-4 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                    <th class="text-left p-3 px-5">From</th>
                                    <th class="text-left p-3 px-5">Course</th>
                                    <th class="text-left p-3 px-5">Rate</th>
                                    <th class="text-left p-3 px-5">   </th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="overflow-x-auto bg-white rounded-b-lg shadow overflow-y-auto relative" style="height: 405px;">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped">
                            <tbody>
                                
                                <tr class="border-dashed border-b border-gray-200 px-6 py-4">
                                    <td class="text-left p-3 px-5"><input type="text" value="student.name" class="bg-transparent"></td>
                                    <td class="text-left p-3 px-5"><input type="text" value="course.name" class="bg-transparent"></td>
                                    <td class="text-left p-3 px-5"><input type="text" value="feedback.rate" class="bg-transparent"></td>
                                    <td class="mx-auto p-3 px-5 py-3 flex justify-center border-dashed border-l">
                                    <button type="button" 
                                    class="mr-3 px-4 py-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    View</button>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

            </div>
        </div>
    </div>
    
    <style>
    /* since nested groupes are not supported we have to use 
        regular css for the nested dropdowns 
    */
    li>ul                 { transform: translatex(100%) scale(0) }
    li:hover>ul           { transform: translatex(101%) scale(1) }
    li > button svg       { transform: rotate(-90deg) }
    li:hover > button svg { transform: rotate(-270deg) }

    /* Below styles fake what can be achieved with the tailwind config
        you need to add the group-hover variant to scale and define your custom
        min width style.
        See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
        for implementation with config file
    */
    .group:hover .group-hover\:scale-100 { transform: scale(1) }
    .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
    .scale-0 { transform: scale(0) }
    .min-w-32 { min-width: 8rem }
    </style>

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