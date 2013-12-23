
			<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin9/top.css"></script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>SOSsystem</title>

  <link rel="stylesheet" href="<?php echo base_url();?>css/foundation.css">
  
  <script src="js/vendor/custom.modernizr.js"></script>
</head>
<body>
	<!-- Menu Bar Large Resolution -->
	<nav class="top-bar">
      
        <li class="name">
          <h1>
           <a href="index.html"><img src="<?php echo base_url();?>images/sos_logo_tran.png" width="120" height="40" border="0" alt=""></a>
          </h1>	  
		</li>
		<div class="icon-profile" onclick="showProfile()">
			<img src="<?php echo base_url();?>images/iUser.png" width="32" height="32" border="0" alt="">
		</div>
		<p><a href="#" onclick="showNotifications()" class="small secondary button notifications">Notifications</a></p>
	 </nav>
	 <!--icon-button & text search -->
	 <div class="search-box hide-for-small"><input type="text" id="" name="" placeholder="search"></div>
	 <div class="search-icon hide-for-small"><img src="<?php echo base_url();?>images/search-32.png" width="32" height="32" border="0" alt=""></div>
	 <!--icon-button & text search -->

	 <!-- Menu Bar Large Resolution -->
	 <!-- Menu Small Resolution -->
	 <div class="row show-for-small small-menu">
	  <div class="large-6 columns">
		<section>
			<div style="float:left;" onclick="showMenu()"><h6><a><img src="<?php echo base_url();?>images/menu-wht.png" width="25" height="auto" border="0" alt="">Notifications</a></h6></div>
			<div id="menu-small" style="display:none;">
				 <hr />
				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
  				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
				 <li><a href="#">xxxxxxxxxxxxxx</a></li><hr />
  				 <li><a href="#">more</a></li>

				<center><div style="cursor:pointer;" onclick="hideMenu()"><img src="<?php echo base_url();?>images/arrow-up-01-16.png" width="24" height="24" border="0" alt="">
				</div></center>
			</div>
		</section>
	   </div>
	  </div>
	  <!-- Menu Small Resolution -->
	 
	<!-- line under status -->
	<section class="carousel-line">
		<div class="row">
			<div class="large-12 columns">	
			<hr />
			</div>	
		</div>
	</section>
	<!-- line under status -->
	<!-- main Content -->
	<div class="row">
		<div class="large-8 columns">
			<p><a href="createproject/index" class="button" ">Create New Project</a></p>
			<!-- New Project Box-->
			<div id="newproject"  style="display:none;" class="" >
				<div class="panel">
					<h5>Create New Project</h5><hr />

						<h5>Project Name : </h5>
						<input type="text" id="" name="">
						<h5>Detail : </h5>
						<textarea></textarea>
						<h5>Member : </h5>
						<input type="number" id="" name=""  min="1" max="20" style="width:150px">
						<h5>Time : </h5>
						<input type="date" id="" name="" style="width:150px;float:left;margin-right:5px;">
						<input type="date" id="" name="" style="width:150px;">
						<input type="submit" class="button success" value="Create">
						<button class="alert" onclick="hideNewproject()">Cancel</button>
		
				</div>
			</div>
			<!-- New Project Box-->


		<div class="tabs_holder large-12 columns">
		<ul>
			<li class="tab_selected"><a href="#myproject">My Project</a></li>
			<li ><a href="#myteam">My Team</a></li>
			<li ><a href="#mysuccess">My Success</a></li>
		</ul>
			<div class="content_holder">
			<div id = "myproject">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Duration</th></tr></thead>
				<tbody>
				<?php
				if (count ( $myProject ) == 0) { // ตรวจสอบว่าข้อมูลถูกส่งมาหรือไหม
					echo "<tr><td colspan = '4' align='center'> -- no data --</td></tr>";
					} else {
				$no = 1;
				foreach ( $myProject as $mp ) {
					echo "<tr>";
					echo "<td align='center'>$no</td>";
					echo "<td>"  . anchor ( "project/index/" . $mp['PID'], $mp ['PROJECT']  ) . "</td>";
					$duration =  $mp ['ENDDATE'] - $mp['STARTDATE'];
					echo "<td>" .$duration . "</td>";
					$no++;
				}
			}
			 ?>
			
				</tbody>
				</table>
			</div>	
			</div>
			
			<div id = "myteam">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Project Manager</th><th>Role</th></tr></thead>
				<tbody>
				<?php
				if (count ( $myTeam) == 0) { // ตรวจสอบว่าข้อมูลถูกส่งมาหรือไหม
					echo "<tr><td colspan = '4' align='center'> -- no data --</td></tr>";
					} else {
				$no = 1;
				foreach ( $myTeam as $mt ) {
					echo "<tr>";
					echo "<td align='center'>$no</td>";
					echo "<td>"  . anchor ( "project/index/" . $mt['PID'], $mt ['PROJECT']  ) . "</td>";
					echo "<td>" .$mt['NAME'] ."</td>";
					echo "<td>" .$mt['ROLE'] ."</td>";
					$no++;
				}
			}
			 ?>
			
				</tbody>
				</table>
			</div>	
			</div>

			<div id = "mysuccess">
			<div class="datagrid">
			<table>
				<thead><tr><th>List</th><th>Project Name</th><th>Project Manager</th><th>Role</th><th>Duration</th></tr></thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Project X</td>
					<td>Wooddy</td>
					<td>Tester</td>
					<td>6 Months</td>
				</tr>
				<tr class="alt">
					<td>2</td>
					<td>Project Y</td>
					<td>Atom</td>
					<td>Test Designer</td>
					<td>2 Months</td>
				</tr>
							
				</tbody>
				</table>
			</div>	
			</div>
			
			</div>

	
			</div><!-- /.content_holder -->
			</div><!-- /.tabs_holder -->

	<!-- main Content -->
	<!-- Side Profile -->
		