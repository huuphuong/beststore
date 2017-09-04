import Vue from 'vue'
import VueRouter from 'vue-router'
import Admin from '../components/Admin'
import RoleCreate from '../components/roles/RoleCreate'
import RoleList from '../components/roles/RoleList'
import RoleDetail from '../components/roles/RoleDetail'

import UserCreate from '../components/users/UserCreate'

Vue.use(VueRouter);

export default new VueRouter({

	routes: [
		{ path: '/roles/create', name: 'RoleCreate', component: RoleCreate },
		{ path: '/roles', name: 'RoleList', component: RoleList },
		{ path: '/roles/detail/:id', name: 'RoleDetail', component: RoleDetail },
		{ path: '/users/create', name: 'UserCreate', component: UserCreate },
	],
	mode: 'history'
})
