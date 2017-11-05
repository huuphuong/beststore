var vm = new Vue({
	el: '#wrapper',

	data: {
		statusOK: 200,
		productTotal: 0
	},

	methods: {
		addToCart: function (product) {
			var tokenString = $('meta[name="csrf-token"]').attr('content');
			var url = '/addtocart';
			var quantity = $('input[name="quantity"]').val();

			this.$http.post(url, {
				_token: tokenString,
				id: product.product_id,
				name: product.product_name,
				qty: typeof quantity != 'undefined' ? quantity : 1,
				price: product.product_price,
				price_sale: product.product_pricesale
			}).then(function (response) {
				var result = response.data;
				if (result.status == this.statusOK) {
					$('.simpleCart_total').text(result.data.priceSum);
					$('.simpleCart_quantity').text('( ' +result.data.productCount+ ' sp )');
					var message = `Đã thêm sản phẩm "${result.data.cart.name}" vào giỏ hàng.`;
					return showToast(message, 'Thành công', 'success');
				}
			}).catch(function (errors) {
				return showToast(message, 'Thất bại', 'error');
				console.log(errors);
			});
		},


		removeCart: function () {
			var url = '/removecart';

			this.$http.delete(url, {
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			}).then(function (response) {
				if (response.data.status == this.statusOK) {
					$('.simpleCart_total').text('');
					$('.simpleCart_quantity').text('Chưa có sản phẩm');
				}
			}).catch(function (errors) {
				console.log(errors);
			});
		}
	} // End methods
});