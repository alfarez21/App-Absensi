<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

include('Plugin.php');
include('SidebarHeader.php');
include('NavbarHeader.php');
include('SidebarMenu.php');
include('Footer.php');

if(!isset($_SESSION['login'])){
	$Komponen->Redirect('');
	die;
}

echo "
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>$JdSite</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		$CSS
		<link rel='shortcut icon' href='images/$IcoBrowser'/>
	</head>
	<body class='hold-transition skin-$SkinDashboard fixed sidebar-mini'>
		<!-- Site wrapper -->
		<div class='wrapper'>

			<header class='main-header'>
				<!-- Logo -->
				$SidebarHeader
				<!-- Header Navbar: style can be found in header.less -->
				<nav class='navbar navbar-static-top'>
					<!-- Sidebar toggle button-->
					<a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</a>

					<div class='navbar-custom-menu'>
						<ul class='nav navbar-nav'>
							<!-- User Account: style can be found in dropdown.less -->
							$NavbarHeader
						</ul>
					</div>
				</nav>
			</header>

		  <!-- =============================================== -->

		  <!-- Left side column. contains the sidebar -->
		  <aside class='main-sidebar'>
			<!-- sidebar: style can be found in sidebar.less -->
			<section class='sidebar'>
			  $SidebarMenu
			</section>
			<!-- /.sidebar -->
		  </aside>

		  <!-- =============================================== -->

		  <!-- Content Wrapper. Contains page content -->
		  <div class='content-wrapper'>
		   
			<!-- Main content -->
			<section class='content'>
		   
				$Konten

			</section>
			<!-- /.content -->
		  </div>
		  <!-- /.content-wrapper -->

		  <footer class='main-footer'>
			$Footer
		  </footer>

		  
		  <!-- /.control-sidebar -->
		  <!-- Add the sidebar's background. This div must be placed
			   immediately after the control sidebar -->
		  <div class='control-sidebar-bg'></div>
		</div>
		$Javascript
	</body>
</html>
";

?>