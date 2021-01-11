
  <!-- Dialog (full screen) -->
  <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >

    <!-- A basic modal dialog with title, body and one button to close -->
    <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
      <div class="flex-1 flex text-left cursor-pointer">
              <button @click="open = false" class="font-semibold text-indigo-500 border border-indigo-500 h-10 px-5 m-2 rounded bg-gray-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                Back
              </button>
              <h1 class="flex-auto capitalize text-left my-auto text-lg font-semibold justify-start">
                            &nbsp View your feedback  
              </h1>
            </div>

        <div class="mt-2">
          <div class="inline-flex w-full space-x-12 items-center">
            
          </div>
          <div class="flex-auto"> 
            <div class="md:flex md:flex-row sm:flex-none sm:flex-col sm:mx-auto space-x-4 mx-auto justify-center justify-center">
              <form  method="POST" action="" enctype="multipart/form-data">
                <table class="mb-4 table-fixed w-full mx-auto">
                  <tr>
                    <td width="115  px" class="h-10">
                      <label for="nameT" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Tutor Name</label>
                    </td>
                    <td>
                      <input type="text" name="nameT" id="nameT" readonly
                        class="text-md text-gray-900 font-bold w-full cursor-default focus:outline-none flex-1 pt-2 rounded text-gray-700 px-3 pb-3"
                        value="<?=$nameT?>">
                      </td>  
                  </tr>
                  <tr>
                      <td width="115  px" class="h-10">
                          <label for="userT" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Tutor Username</label>
                      </td>
                      <td>
                          <input type="text" name="userT" id="userT" readonly
                          class="text-md text-gray-900 font-bold w-full cursor-default focus:outline-none flex-1 pt-2 rounded text-gray-700 px-3 pb-3"
                          value="<?=$usernameT?>">
                      </td>  
                  </tr>
                  <tr>
                      <td width="115  px" class="h-10">
                          <label for="course" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Course</label>
                      </td>
                      <td>
                          <input type="text" name="course" id="course" readonly
                          class="text-md text-gray-900 font-bold w-full cursor-default focus:outline-none flex-1 pt-2 rounded text-gray-700 px-3 pb-3"
                          value="<?=$course?>">
                      </td>  
                  </tr>
                  <tr>
                      <td  width="115 px"  class="h-10">
                          <label for="feed" class="pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Feedback</label>
                      </td>
                      <td>
                          <input type="text" name="feed" id="feed" readonly
                          class="text-md text-gray-900 font-bold w-full cursor-default focus:outline-none flex-1 pt-2 rounded text-gray-700 px-3 pb-3"
                          value="<?=$fFeedback?>">
                      </td>
                  </tr>
                  <tr>
                      <td width="115px" class="h-10">
                          <label for="rate" class="my-auto pt-3 text-left justify-left text-gray-700 text-sm font-bold mb-1">Rate (Stars)
                          </label>
                      </td>
                      <td class="px-3">
                      <?php 
                        for ($x = 1; $x <= $fStar; $x++) {
                          echo "<i class='fa fa-star text-yellow-400'></i>";
                        }
                        ?>
                      </td> 
                  </tr>
              </table>
              <input type="hidden" name="userS" value="<?=$username?>">
              <input type="hidden" name="nameS" value="<?=$name?>">
              
          </form>
      </div>
      </div>
      </div>
    </div>

      <!-- One big close button.  --->
      <div class="mt-5 sm:mt-6">
        <span class="flex w-full rounded-md"><a class="flex mx-auto" href="editFeedback.php?id=<?=urlencode($usernameT)?>&course=<?=urlencode($course)?>">
          <button class="mx-auto text-center flex mb-4 font-semibold text-sm text-white p-3 px-4 rounded bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" 
              type="submit" name="addFeedback" value="addFeedback">
                  EDIT
          </button></a>
          <!-- <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
            Close this modal!
          </button> -->
        </span>
      </div>

    </div>
  </div>
