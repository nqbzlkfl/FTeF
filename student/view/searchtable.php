	<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
	  <!--Replace with your tailwind.css once created--> 
	  

	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	 
	  <style>
		
		/*Overrides for Tailwind CSS */
		
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			padding-left: 1rem; 		/*pl-4*/
			padding-right: 1rem; 		/*pl-4*/
			padding-top: .5rem; 		/*pl-2*/
			padding-bottom: .5rem; 		/*pl-2*/
			line-height: 1.25; 			/*leading-tight*/
			border-width: 2px; 			/*border-2*/
			border-radius: .25rem; 		
			
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;	/*bg-indigo-100*/
		}
		
		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button		{
			font-weight: 700;				/*font-bold*/
			border-radius: .25rem;			/*rounded*/
			border: 1px solid transparent;	/*border border-transparent*/
		}
		
		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}
		
		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}
		
		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important; /*bg-indigo-500*/
		}
		
      </style>
	  
 

   </head>
   <body class="bg-white tracking-wider leading-normal">
      

      <!--Container-->
      <div class="container w-full xl:w-full  mx-auto px-2">
			
			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
			 
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1"></th>
							<th data-priority="2"></th>
							<th data-priority="3"></th>
						</tr>
					</thead>
                    <?php
                    $ii= 0;
                    foreach($data1 as $row){
                    $ii++;?>
					<tbody>
						<tr>
                            <td class="right-0 w-24 px-2 mx-auto justify-right content-right bg-white">
                                <a href="profileTutor.php?param=<?=$row['tutorName']?>" class="rounded-full">
                                <img class= "mx-auto rounded-full" src="../../img/Profile/<?=$row['tutorPhoto']?>"></a>
                            </td>
							<td class="px-2 flex flex-col bg-white">
								<h2 class="flex font-bold">
									<?=$row['courseFull']?>
                                </h2>
                                <h2 class="text-blue-500 font-semibold text-md hover:text-blue-600 hover:underline">
                                	<a href="#"><?=$row['tutorName']?></a>
                                </h2>
                                <ul>
                                    <li>
                                    <?=$row['tutorFaculty']?>
                                    </li>
                                    <li>
									<?=$row['teachDay']?>, <?php 
									$time = $row['teachTime'];
									$time12  = date("g:i A", strtotime("$time"));
									echo $time12; ?>
                                    </li>
                                </ul>
                            </td>
							<td class="w-3/12 bg-white">
                                <ul>
                                    <li class="list-none">
                                        <div class="flex-auto text-center justify-center cursor-pointer">
                                            <a href="request.php?tutor=<?=urlencode($row['tutorUsername'])?>&course=<?=urlencode($row['courseFull'])?>">
                                            <button class="font-semibold text-white text-xs h-10 px-5 m-2 rounded border border-blue-700 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">
                                            Request Lesson
                                            </button></a>
                                        </div>
                                    </li>
                                    <li><h1 class="text-center">Feedback ***</h1></li>
                                </ul>
                            </td>
						</tr>
					</tbody>
					<?php
                    }?>
					
				</table>
				
				
			</div>
			<!--/Card-->


      </div>
      <!--/container-->
	  
	  



	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {
			
			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

		$(document).ready(function() {
		$('#example').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "scripts/post.php",
				"type": "POST"
			},
			"columns": [
				{ "data": "" },
				{ "data": "<?=$row['tutorName']?>" },
				{ "data": "" }
			]
			} );
		} );
	
	</script>

   </body>
