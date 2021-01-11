<nav class="flex items-center flex-wrap justify-between bg-gradient-to-b from-blue-600 to-blue-700 p-6 fixed w-full z-20 top-0 pt-2 md:pt-1 pb-3 px-1 mt-0 h-auto">
		<div class="flex-shrink-0 w-auto">
			<a class="w-auto mx-right" href="dashboard.php">
				<img class="w-6/12 mx-right pointer-events-none" src="img/logo-vertical-allwhite.png" alt="logo" id="logo-startup">
			</a>
		</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-200 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="flex-col lg:flex lg:items-end hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="dashboard.php"><span class="fa fa-chart-area"></span> Dashboard</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="search.php"><span class="fa fa-search"></span> Search</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="mytutor.php"><span class="fa fa-chalkboard-teacher"></span> MyTutor</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="profile.php"><span class="fa fa-user-circle"></span> My Profile</a>
				</li>
				<li class="mr-3">
					<a class="modal-open inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#"><span class="fa fa-sign-out-alt"></span> Log Out</a>
				</li>
			</ul>
		</div>
	</nav>

    <?php require_once 'logoutModal.php'
	?>

	<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    
  	</script>