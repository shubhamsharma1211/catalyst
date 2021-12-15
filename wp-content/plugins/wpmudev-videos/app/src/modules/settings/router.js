import Vue from 'vue'
import Data from './tabs/data'
import Router from 'vue-router'
import Display from './tabs/display'
import Permissions from './tabs/permissions'
import ImportExport from './tabs/import-export'
import { isNetwork } from '@/helpers/utils'

Vue.use(Router)

let routes = [
	{
		path: '/',
		name: 'Display',
		component: Display,
	},
]

// Permission is not required in network.
if (!isNetwork()) {
	routes.push({
		path: '/permissions',
		name: 'Permissions',
		component: Permissions,
	})
}

routes.push({
	path: '/import-export',
	name: 'ImportExport',
	component: ImportExport,
})

routes.push({
	path: '/data',
	name: 'Data',
	component: Data,
})

export default new Router({
	linkActiveClass: 'current',
	routes: routes,
})
