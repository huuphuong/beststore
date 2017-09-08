import Vue from 'vue'
import Toasted from 'vue-toasted';
Vue.use(Toasted)

class Common {
	setToast (message, type) {
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

}

export default new Common();