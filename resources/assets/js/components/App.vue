<template>
  <!-- Begin page -->
  <div id="wrapper">
		<topbar></topbar>
		<sidebar></sidebar>

    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container">
          <breadcrumb></breadcrumb>
          <router-view></router-view>
        </div>
        <!-- container -->
      </div>
      <!-- content -->
			<footer-page></footer-page>
    </div>
  </div>
</template>

<!-- Script VueJS -->
<script>
	import Topbar from './Topbar'
	import Sidebar from './Sidebar'
	import Breadcrumb from './Breadcrumb'
	import FooterPage from './FooterPage'

	export default {
		components: { Topbar, Sidebar, Breadcrumb, FooterPage }
	}
</script>