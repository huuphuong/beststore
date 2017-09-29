import Vue from 'vue';
import Toasted from 'vue-toasted';
import axios from 'axios';
Vue.use(Toasted)

class Common {

	constructor () {
		this.statusCode = {
			_PASS         : 'pass',
			_ERROR        : 'error',
			_SUCCESS      : 'success',
			_OK           : 200,
			_CREATED      : 201,
			_NOCONTENT    : 204,
			_NOTMODIFY    : 304,
			_BADREQUEST   : 400,
			_UNAUTHORIZED : 401,
			_FORBIDDEN    : 403,
			_NOTFOUND     : 404,
			_CONFLICT     : 409,
			_SERVERERROR  : 500
		}
		
		this.components = 1;
	}

	setToast (message, type='info') {
		var self = this;

		Vue.toasted.show(message, {
			type: type,
			action: {
				text : 'Close',
				onClick : (e, toastObject) => {
					console.log(e)
					return toastObject.goAway(0)
				}
			},
			icon : {
				name : self.getIconByType(type)
			}
		}).goAway(5000);
	}

	getIconByType (type) {
		var icon;
		switch (type) {
			case 'success':
				icon = 'done';
			break;

			case 'error':
				icon = 'error';
			break;

			case 'info':
				icon = 'info';
			break;

			default:
				icon = 'info';
			break;
		}

		return icon;
	}


	getComponent (table='', key='', value='') {
		var self = this;

		var url = `/api/v1/components?table=${table}&key=${key}&value=${value}`;
		return axios.get(url);
	}

}

export default new Common();