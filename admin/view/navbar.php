	<style>
		.modal {
		transition: opacity 0.25s ease;
		}
		body.modal-active {
		overflow-x: hidden;
		overflow-y: visible !important;
		}
	</style>

	<nav class="flex items-center justify-between flex-wrap bg-blue-900 p-6 fixed w-full z-20 top-0 pt-2 md:pt-1 pb-3 px-1 mt-0 h-auto">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
			<a class="justify-right pl-4 pt-2 w-5/12" href="dashboard.php">
				<img class="w-full pointer-events-none" src="img/logo-vertical-white.png" alt="logo" id="logo-startup">
			</a>
		</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#"><span class="fa fa-user-circle"></span> <?=$name?></a>
				</li>
				<li class="mr-3">
					<a class="modal-open inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#" data-toggle="modal" data-target="#logoutModal"><span class="fa fa-sign-out-alt"></span> Log Out</a>
				</li>
				<?php
					require_once 'logoutModal.php';
				?>
			</ul>
		</div>
	</nav>

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

	