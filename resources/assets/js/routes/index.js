import Vue from 'vue'
import VueRouter from 'vue-router'
import Admin from '../components/Admin'

// Role
import RoleCreate from '../components/roles/RoleCreate.vue'
import RoleList from '../components/roles/RoleList.vue'
import RoleDetail from '../components/roles/RoleDetail.vue'
import RoleEdit from '../components/roles/RoleEdit.vue'

// User
import UserCreate from '../components/users/UserCreate.vue'
import UserDetail from '../components/users/UserDetail.vue'
import UserList from '../components/users/UserList.vue'
import UserEdit from '../components/users/UserEdit.vue'

// Product
import ProductCreate from '../components/products/ProductCreate.vue'
import ProductDetail from '../components/products/ProductDetail.vue'
import ProductEdit from '../components/products/ProductEdit.vue'
import ProductList from '../components/products/ProductList.vue'

// Category
import Category from '../components/categories/Category.vue'
import CategoryDetail from '../components/categories/CategoryDetail.vue'

Vue.use(VueRouter);

export default new VueRouter({

	routes: [
		{ path: '/roles/create', name: 'RoleCreate', component: RoleCreate },
		{ path: '/roles', name: 'RoleList', component: RoleList },
		{ path: '/roles/detail/:id', name: 'RoleDetail', component: RoleDetail },
		{ path: '/roles/edit/:id', name: 'RoleEdit', component: RoleEdit },


		{ path: '/users/create', name: 'UserCreate', component: UserCreate },
		{ path: '/users/detail/:id', name: 'UserDetail', component: UserDetail },
		{ path: '/users', name: 'UserList', component: UserList },
		{ path: '/users/edit/:id', name: 'UserEdit', component: UserEdit },


		{ path: '/products/create', name: 'ProductCreate', component: ProductCreate },
		{ path: '/products/detail/:id', name: 'ProductDetail', component: ProductDetail },
		{ path: '/products/edit/:id', name: 'ProductEdit', component: ProductEdit },
		{ path: '/products', name: 'ProductList', component: ProductList },

		{ path: '/categories', name: 'Category', component: Category },
		{ path: '/categories/detail/:id', name: 'CategoryDetail', component: CategoryDetail }
	],
	mode: 'history'
})
