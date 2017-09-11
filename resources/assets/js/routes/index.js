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

Vue.use(VueRouter);

export default new VueRouter({

	routes: [
		{ path: '/roles/create', name: 'RoleCreate', component: RoleCreate },
		{ path: '/roles', name: 'RoleList', component: RoleList },
		{ path: '/roles/detail/:id', name: 'RoleDetail', component: RoleDetail },
		{ path: '/roles/edit/:id', name: 'RoleEdit', component: RoleEdit },
		{ path: '/users/create', name: 'UserCreate', component: UserCreate },
		{ path: '/users/detail/:id', 'name': 'UserDetail', component: UserDetail }
	],
	mode: 'history'
})
