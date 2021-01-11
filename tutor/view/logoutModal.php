
  <!--Modal-->
  <div class="modal opacity-0 absolute pointer-events-none w-full max-h-auto h-screen flex items-center justify-center">
    <div class="fixed h-full max-h-auto modal-overlay w-full bg-gray-900 opacity-50 z-40"></div>
    
    <div class="absolute modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-xl font-bold border-b">You about to logout from current session</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <p>Are you sure want to logout?</p>
        <p>Select "Logout" below if you are ready to end your current session.</p>

        <!--Footer-->
        <div class="flex justify-center pt-2 space-x-4">
          <button class="modal-close px-4 bg-gray-500 p-3 rounded-lg text-white hover:bg-gray-700">Cancel</button>
          <button class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-700 mr-2">
          <a class="text-white" href="../">Logout</a>
          </button>
        </div>
        
      </div>
    </div>
  </div>
