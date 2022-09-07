<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="dashboard.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'dashboard')echo ("active"); ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="Incoming.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'Incoming')echo ("active"); ?>"><i class="lnr lnr-code"></i> <span>Incoming</span></a></li>
						<li><a href="laundry_admin.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'laundry_admin')echo ("active"); ?>"><i class="lnr lnr-inbox"></i> <span>Orders</span></a></li>
						<li><a href="blocks.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'blocks')echo ("active"); ?>"><i class="fa fa-home"></i> <span>Blocks</span></a></li>
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
						<li><a href="profile.php" class="<?php if (basename($_SERVER['PHP_SELF'], '.php')== 'profile')echo ("active"); ?>"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
						<li><a href="lockscreen.php" class=""><i class="lnr lnr-lock"></i> <span>Lockscreen</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->