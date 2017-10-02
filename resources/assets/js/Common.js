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

	
	/**
	 * Method lấy khóa chính và name để nhét vào select-option component
	 * @table: tên bảng
	 * @key: cột khóa chính
	 * @value: cột name
	 */

	getComponent (table='', key='', value='') {
		var self = this;

		var url = `/api/v1/components?table=${table}&key=${key}&value=${value}`;
		return axios.get(url);
	}


	hasParamValue(queryString) {
		var params = queryString.split('&');
		for (var param of params)
		{
			if (param.indexOf("=") > -1) {
				let position = param.lastIndexOf('=');
				let result = param.substring(position + 1);
				if (result.length) {
					return true;
				}
			}
		}

		return false;
	}


	changeToSlug(title) {
	    //Đổi chữ hoa thành chữ thường
	    var slug = title.toLowerCase();
	 
	    //Đổi ký tự có dấu thành không dấu
	    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	    slug = slug.replace(/đ/gi, 'd');
	    //Xóa các ký tự đặt biệt
	    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	    //Đổi khoảng trắng thành ký tự gạch ngang
	    slug = slug.replace(/ /gi, " ");
	    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	    slug = slug.replace(/\-\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-/gi, '-');
	    //Xóa các ký tự gạch ngang ở đầu và cuối
	    slug = '@' + slug + '@';
	    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
	    //In slug ra textbox có id “slug”
	    
	    return slug;
	}

} // End class

export default new Common();