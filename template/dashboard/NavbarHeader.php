<?php
/*
Nusantara Global
Team : Nans, M. Rifki
*/

$NavbarHeader="
<li class='dropdown user user-menu'>
	<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
		<img src='$NHImages' class='user-image' alt='User Image'>
		<span class='hidden-xs'>$NHName</span>
		<i class='fa fa-gears'></i>
	</a>

	<ul class='dropdown-menu'>
		<li class='user-header'>
			<img src='$NHImages' class='img-circle' alt='User Image'>
			<p>$NHKeterangan</p>
		</li>

		<li class='user-footer'>
			<div class='pull-left'>
				<!--<a href='#' class='btn btn-default btn-flat'>Profil</a>-->
			</div>
			<div class='pull-right'>
				<a href='?logout' class='btn btn-default btn-flat'>Sign out</a>
			</div>
		</li>
	</ul>
</li>
";
?>