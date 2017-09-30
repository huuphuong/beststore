<template>
 <!-- ========== Left Sidebar Start ========== -->
		<div class="left side-menu">
			<div class="slimscroll-menu" id="remove-scroll">
				<!--- Sidemenu -->
				<div id="sidebar-menu">
					<!-- Left Menu Start -->
					<ul class="metisMenu nav" id="side-menu">
						<li class="menu-title">CRM</li><!-- /.header -->
						<router-link tag="li" :to="{ name: 'RoleCreate' }"><a><i class="fi-air-play"></i> Dashboard</a></router-link>
						<li>
							<a href="javascript: void(0);"><i class="fi-share"></i> <span>Roles</span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level nav">
										<router-link tag="li" :to="{ name: 'RoleCreate' }"><a>Create Role</a></router-link>
										<router-link tag="li" :to="{ name: 'RoleList' }"><a>List Role</a></router-link>
							</ul>
					 </li>

					 <li>
							<a href="javascript: void(0);"><i class="fi-share"></i> <span>User/Customers</span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level nav">
										<router-link tag="li" :to="{ name: 'UserCreate' }"><a>Create User</a></router-link>
										<router-link tag="li" :to="{ name: 'UserList' }"><a>List User</a></router-link>
							</ul>
					 </li>
					
					<li>
							<a href="javascript: void(0);"><i class="fi-share"></i> <span>Category</span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level nav">
									<router-link tag="li" :to="{ name: 'Category' }"><a>Category Create</a></router-link>
									<router-link tag="li" :to="{ name: 'Category' }"><a>Category List</a></router-link>
							</ul>
					 </li>

					

					<li>
							<a href="javascript: void(0);"><i class="fi-share"></i> <span>Product</span> <span class="menu-arrow"></span></a>
							<ul class="nav-second-level nav">
										<router-link tag="li" :to="{ name: 'ProductCreate' }"><a>Create Product</a></router-link>
										<router-link tag="li" :to="{ name: 'ProductList' }"><a>List Product</a></router-link>
							</ul>
					 </li>

					<li>

					</li>
					</ul>
				</div>
				<!-- Sidebar -->
				<div class="clearfix"></div>
			</div>
			<!-- Sidebar -left -->
		</div>
		<!-- Left Sidebar End -->
</template>

<script>
	export default {
		name: 'sidebar'
	}
</script>