<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FTeF | Manage Schedule</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="icon" type="image/png" href="img/logo-icon.png"/>
    <link rel="stylesheet" type="text/css" href="../../resources/styles/tailwind.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" src="../../resources/scripts/alphine.js"></script>
    <script type="text/javascript" src="../../resources/scripts/Chart.bundle.js"></script>
    <script type="text/javascript" src="../../resources/scripts/jQuery.js"></script>

    <style>
		[x-cloak] {
			display: none;
		}
	</style>
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

        <!-- Content -->
        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-700 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Schedule</h3>
            </div>
            <div class="flex flex-wrap justify-center pt-12 pb-10">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fa fa-calendar fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Next session</h5>
                                    <h3 class="font-bold text-3xl">dd/mm/yy <span class="text-green-500"><i class=""></i></span></h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                </div>
            

            <!-- Test -->
            <div class="antialiased sans-serif bg-gray-100 h-1/2">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="container mx-auto px-4 py-2 md:py-1 ">
                    
                    <div class="font-bold text-gray-800 text-xl mb-4">
                        Your schedule
                    </div> 

                    <div class="bg-white rounded-lg shadow overflow-hidden">

                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" 
                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                    :disabled="month == 0 ? true : false"
                                    @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>  
                                </button>
                                <div class="border-r inline-flex h-6"></div>		
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" 
                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                    :disabled="month == 11 ? true : false"
                                    @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>									  
                                </button>
                            </div>
                        </div>	

                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">	
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div
                                            x-text="day" 
                                            class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div 
                                        style="width: 14.28%; height: 120px"
                                        class="text-center border-r border-b px-4 pt-2"	
                                    ></div>
                                </template>	
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                    <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                        <div
                                            @click="showEventModal(date)"
                                            x-text="date"
                                            class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                        ></div>
                                        <div style="height: 80px;" class="overflow-y-auto mt-1">
                                            <!-- <div 
                                                class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
                                                x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
                                                x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->

                                            <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">	
                                                <div
                                                    class="px-2 py-1 rounded-lg mt-1 overflow-hidden border"
                                                    :class="{
                                                        'border-blue-200 text-blue-800 bg-blue-100': event.event_theme === 'blue',
                                                        'border-red-200 text-red-800 bg-red-100': event.event_theme === 'red',
                                                        'border-yellow-200 text-yellow-800 bg-yellow-100': event.event_theme === 'yellow',
                                                        'border-green-200 text-green-800 bg-green-100': event.event_theme === 'green',
                                                        'border-purple-200 text-purple-800 bg-purple-100': event.event_theme === 'purple'
                                                    }"
                                                >
                                                    <p x-text="event.event_title" class="text-sm truncate leading-tight"></p>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
                    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                            x-on:click="openEventModal = !openEventModal">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                            </svg>
                        </div>

                        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                            
                            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Add Event Details</h2>
                        
                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Event title</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_title">
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Event date</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_date" readonly>
                            </div>

                            <div class="inline-block w-64 mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Select a theme</label>
                                <div class="relative">
                                    <select @change="event_theme = $event.target.value;" x-model="event_theme" class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700">
                                            <template x-for="(theme, index) in themes">
                                                <option :value="theme.value" x-text="theme.label"></option>
                                            </template>
                                        
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
        
                            <div class="mt-8 text-right">
                                <button type="button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2" @click="openEventModal = !openEventModal">
                                    Cancel
                                </button>	
                                <button type="button" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm" @click="addEvent()">
                                    Save Event
                                </button>	
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
            </div>    
            </div>                                     
        </div>

    </div>

    <script>
        // Calendar Script  
        const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

		function app() {
			return {
				month: '',
				year: '',
				no_of_days: [],
				blankdays: [],
				days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

				events: [
					{
						event_date: new Date(2020, 3, 1),
						event_title: "April Fool's Day",
						event_theme: 'blue'
					},

					{
						event_date: new Date(2020, 3, 10),
						event_title: "Birthday",
						event_theme: 'red'
					},

					{
						event_date: new Date(2020, 3, 16),
						event_title: "Upcoming Event",
						event_theme: 'green'
					}
				],
				event_title: '',
				event_date: '',
				event_theme: 'blue',

				themes: [
					{
						value: "blue",
						label: "Blue Theme"
					},
					{
						value: "red",
						label: "Red Theme"
					},
					{
						value: "yellow",
						label: "Yellow Theme"
					},
					{
						value: "green",
						label: "Green Theme"
					},
					{
						value: "purple",
						label: "Purple Theme"
					}
				],

				openEventModal: false,

				initDate() {
					let today = new Date();
					this.month = today.getMonth();
					this.year = today.getFullYear();
					this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
				},

				isToday(date) {
					const today = new Date();
					const d = new Date(this.year, this.month, date);

					return today.toDateString() === d.toDateString() ? true : false;
				},

				showEventModal(date) {
					// open the modal
					this.openEventModal = true;
					this.event_date = new Date(this.year, this.month, date).toDateString();
				},

				addEvent() {
					if (this.event_title == '') {
						return;
					}

					this.events.push({
						event_date: this.event_date,
						event_title: this.event_title,
						event_theme: this.event_theme
					});

					console.log(this.events);

					// clear the form data
					this.event_title = '';
					this.event_date = '';
					this.event_theme = 'blue';

					//close the modal
					this.openEventModal = false;
				},

				getNoOfDays() {
					let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

					// find where to start calendar day of week
					let dayOfWeek = new Date(this.year, this.month).getDay();
					let blankdaysArray = [];
					for ( var i=1; i <= dayOfWeek; i++) {
						blankdaysArray.push(i);
					}

					let daysArray = [];
					for ( var i=1; i <= daysInMonth; i++) {
						daysArray.push(i);
					}
					
					this.blankdays = blankdaysArray;
					this.no_of_days = daysArray;
				}
			}
		}

    </script>


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