<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="dashboard.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'dashboard')echo ("active"); ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="Incoming.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'Incoming')echo ("active"); ?>"><i class="lnr lnr-code"></i> <span>Incoming</span></a></li>
						<li><a href="laundry_admin.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'laundry_admin')echo ("active"); ?>"><i class="lnr lnr-inbox"></i> <span>Orders</span></a></li>
						<li><a href="blocks.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'blocks')echo ("active"); ?>"><i class="fa fa-home"></i> <span>Blocks</span></a></li>
						<li><a href="charts.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'charts')echo ("active"); ?>"><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="assign.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'assign')echo ("active"); ?>"><i class="lnr lnr-cog"></i> <span>Assign</span></a></li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-map-marker"></i> <span>Track</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="track_b.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'track_b')echo ("active"); ?>">From Block</a></li>
									<li><a href="track_c.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'track_c')echo ("active"); ?>">Client</a></li>
								</ul>
							</div>
						</li>
						<li><a href="notifications.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'notifications')echo ("active"); ?>"><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="profile.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'profile')echo ("active"); ?>">Profile</a></li>
									<li><a href="login.php" class="">Login</a></li>
									<li><a href="lockscreen.php" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->