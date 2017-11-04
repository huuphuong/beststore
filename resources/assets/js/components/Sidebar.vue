<template>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metisMenu nav" id="side-menu">
                    <li class="menu-title">Quản lý shop</li><!-- /.header -->
                    <router-link tag="li" :to="{ name: 'RoleCreate' }"><a><i class="fi-air-play"></i> Bảng điều khiển</a>
                    </router-link>
                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-key-variant"></i>
                            <span>Quyền hạn</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'RoleCreate' }"><a>Tạo quyền</a></router-link>
                            <router-link tag="li" :to="{ name: 'RoleList' }"><a>Danh sách quyền</a></router-link>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-account-location"></i>
                            <span>Người dùng</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'UserCreate' }"><a>Tạo người dùng</a></router-link>
                            <router-link tag="li" :to="{ name: 'UserList' }"><a>Danh sách người dùng</a></router-link>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class=" mdi mdi-file-tree"></i>
                            <span>Danh mục</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'Category' }"><a>Tạo danh mục</a></router-link>
                            <router-link tag="li" :to="{ name: 'CategoryList' }"><a>Danh sách danh mục</a></router-link>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-cube"></i>
                            <span>Sản phẩm</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'ProductCreate' }"><a>Tạo sản phẩm</a></router-link>
                            <router-link tag="li" :to="{ name: 'ProductList' }"><a>Danh sách sản phẩm</a></router-link>
                            <router-link tag="li" :to="{ name: 'CollectionAdd' }"><a>Tạo bộ sưu tập</a></router-link>
                            <router-link tag="li" :to="{ name: 'ProductCollection' }"><a>Danh sách bộ sưu tập</a>
                            </router-link>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-account-card-details"></i>
                            <span>Nhà cung cấp</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'VendorCreate' }"><a>Thêm nhà cung cấp</a></router-link>
                            <router-link tag="li" :to="{ name: 'VendorList' }"><a>Danh sách nhà cung cấp</a></router-link>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-settings"></i>
                            <span>Cấu hình</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav">
                            <router-link tag="li" :to="{ name: 'Settings' }"><a>Cài đặt</a></router-link>
                            <router-link tag="li" :to="{ name: 'Slideshow' }"><a>Banner slide</a></router-link>
                            <router-link tag="li" :to="{ name: 'Tutorial' }"><a>Hướng dẫn</a></router-link>
                            <router-link tag="li" :to="{ name: 'Navigation' }"><a>Thanh menu</a></router-link>
                        </ul>
                    </li>

                     <li>
                        <a href="/logout">
                            <i class="mdi mdi-logout"></i>
                            <span>Thoát</span>
                        </a>
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