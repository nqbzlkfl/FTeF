<div class="text-gray-900 bg-white font-bold">
                    <div class="p-4 flex">
                        <h1 class="text-xl">
                            Student List (<?=$studentNum?>)
                        </h1>
                    </div>
                    <div class="px-3 py-4 flex justify-center overflow-x-auto overflow-y-auto" style="height: 405px;">
                        <table class="w-full text-md bg-white shadow-md rounded border border-2 mb-4 table-fixed">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-center p-3 border-r border-gray-200" width="40px">No</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="120px">Username</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="210px">Name</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="180px">Email</th>
                                    <th class="text-center p-3 border-r border-gray-200" width="60px">Status</th>
                                    <th class="text-left p-3 px-5 border-r border-gray-200" width="230px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($student as $roww){
                                    if($roww['studentStatus'] == 1){
                                        $status = "ACTIVE";
                                    }
                                    else{
                                        $status = "INACTIVE";
                                    }
                                    echo "<tr class='cursor-default border-b hover:bg-blue-100 bg-gray-100'>"
                                        . "<td class='text-sm text-center p-3 font-semibold border-r border-gray-200'>".$i."</td>"
                                        . "<td class='text-sm text-left p-3 px-5 font-semibold border-r border-gray-200'>".$roww['studentUsername']."</td>"
                                        . "<td class='text-sm text-left p-3 px-5 font-semibold border-r border-gray-200'>".$roww['studentName']."</td>"
                                        . "<td class='text-sm text-left p-3 px-5 font-semibold text-gray-600 border-r border-gray-200'>".$roww['studentEmail']."</td>"
                                        . "<td class='text-sm text-center p-3 font-bold text-green-600 border-r border-gray-200'>".$status."</td>"
                                        . "<td class='flex mx-auto justify-center'><form action='' method='POST'>"
                                        . "<input type='hidden' name='studentUsername' value='".$roww['studentUsername']."'>";
                                        echo "&nbsp;&nbsp;<input type='submit' name='resetS' 
                                                class='cursor-pointer text-xs h-9 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700' 
                                                value='RESET PASSWORD'>
                                                &nbsp;<input type='submit' name='deleteS' 
                                                class='cursor-pointer text-xs h-9 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800' 
                                                value='DELETE'>
                                                </form></td>
                                                </tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>