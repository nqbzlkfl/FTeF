<div class="px-1 w-11/12  mx-auto justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                        <table class="px-8 w-full text-md bg-white rounded shadow-lg">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Course</th>
                                    <th class="text-left p-3 px-5"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                      $i=1;
                      foreach($dataa as $roww){
                          echo  "<tr class='border-b hover:bg-blue-100 bg-gray-100 shadow'>"
                                  . "<td class='font-semibold bg-white text-left p-3 px-5'>".$roww['courseFull']."</td>"
                                  . "<td class='font-semibold bg-white border-l text-left p-3 '><form action='' method='POST'>"
                                  . "<input type='hidden' name='courseCode' value='".$roww['courseFull']."'>";
                                  
                                  echo  "&nbsp;&nbsp
                                        
                                        <input type='submit' name='delete' 
                                        class='h-9 px-5 m-2 text-md text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                        value='DELETE COURSE'>
                                        </form></td>
                                </tr>";
                        $i++;
                      }
                      ?>
                            </tbody>
                        </table>
                    </div>