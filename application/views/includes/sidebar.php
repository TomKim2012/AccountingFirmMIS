<aside ng-include="'app/views/partials/sidebar.html'"
	ng-controller="SidebarController" class="aside ng-scope">
	<!-- Inline template with sidebar items markup and ng-directives-->

	<script type="text/ng-template" id="sidebar-renderer.html"
		class="ng-scope">
   <span ng-if="item.heading">{{(item.translate | translate) || item.text}}</span><a ng-if="!item.heading" ng-href="{{$state.href(item.sref, item.params)}}" title="{{item.text}}"><em ng-if="item.icon" class="{{item.icon}}"></em><div ng-if="item.alert" ng-class="item.label || 'label label-success'" class="pull-right">{{item.alert}}</div><span>{{(item.translate | translate) || item.text}}</span></a><ul ng-if="item.submenu" collapse="isCollapse(pIndex)" ng-init="addCollapse(pIndex, item)" class="nav sidebar-subnav"><li class="sidebar-subnav-header">{{(item.translate | translate) || item.text}}</li><li ng-repeat="item in item.submenu" ng-include="'sidebar-renderer.html'" ng-class="getMenuItemPropClasses(item)" ng-init="pIndex=(pIndex+'-'+$index); inSubmenu = true" ng-click="toggleCollapse(pIndex)"></li></ul>
	</script>


	<div class="aside-inner ng-scope">
		<nav class="sidebar" ng-transclude="" sidebar=""
			sidebar-anyclick-close="">
			<!-- START sidebar nav-->
			<ul class="nav ng-scope">
				<!-- START user info-->
				<li class="has-user-block">
					<div collapse="userBlockVisible"
						ng-controller="UserBlockController" class="ng-scope collapse"
						style="height: 0px;">
						<div class="item user-block">
							<!-- User picture-->
							<div class="user-block-picture">
								<div class="user-block-status">
									<img ng-src="app/img/user/02.jpg" alt="Avatar" width="60"
										height="60" class="img-thumbnail img-circle"
										src="app/img/user/02.jpg">
									<div class="circle circle-success circle-lg"></div>
								</div>
							</div>
							<!-- Name and Job-->
							<div class="user-block-info">
								<span class="user-block-name ng-binding">Welcome John</span> <span
									class="user-block-role ng-binding">ng-developer</span>
							</div>
						</div>
					</div>
				</li>
				<!-- END user info-->
				<!-- Iterates over all sidebar items-->
				<!-- ngRepeat: item in menuItems -->
				<!-- ngInclude: 'sidebar-renderer.html' -->

				<li class="ng-scope nav-heading"><span class="ng-binding ng-scope">Main
						Navigation</span></li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 8){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/dashboard')?>"><em
						ng-if="item.icon" class="icon-speedometer"></em>Home</a>
				</li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 2){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/events')?>"><em
						class="fa fa-tags"></em>Seminars and Events</a>
				</li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 3){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/mycpd')?>"><em
						class="fa fa-graduation-cap"></em> My C.P.D</a>
				</li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 4){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/statements')?>"> <em
						class="fa fa-list-alt"></em> My Statement
				</a>
				</li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 5){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/offences')?>"> <em
						class="fa fa-user-secret"></em> My Offences
				</a>
				</li>
				<li role="presentation"
					class="<?php if(isset($active)){if($active == 6){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/enquiries')?>"> <em
						class="fa fa-bullhorn"></em> Make an Enquiry
				</a>
				</li>

				<li role="presentation"
					class="<?php if(isset($active)){if($active == 1){ echo "active";}} ?>">
					<a href="<?php echo site_url('application/profile')?>"> <em
						class="icon-user"></em> My Profile
				</a>
				</li>

				<li role="presentation"><a
					href="<?php echo site_url('auth/logout')?>"> <em
						class="fa fa-power-off"></em> Logout
				</a></li>
				<!-- end ngRepeat: item in menuItems -->
				<!-- ngInclude: 'sidebar-renderer.html' -->
			</ul>
			<!-- END sidebar nav-->
		</nav>
	</div>
</aside>

<section class="ng-scope">
	<div ui-view="" autoscroll="false" ng-class="app.viewAnimation"
		class="content-wrapper ng-scope ng-fadeInUp">
		<h3 class="ng-scope">
			<?php if(isset($page_title)){ echo $page_title;} ?>
		</h3>