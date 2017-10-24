import Common from '../../Common';
import NavigationList from './NavigationList.vue';

export default {
	name: 'navigation',

	components: { NavigationList },

	data () {
		return {
			nav: {
				image: '',
				display: 1,
				parent_id: '',
				text_link: '',
				url: '',
				position: 1
			},

			parents: []
		}
	},


	mounted () {
		document.title = 'Navigation';
		this.getParents();
	},


	methods: {
		showModal () {
			$('#myModal').modal('show');
		},


		onFileChange(e) {
			var files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createImage(files[0]);
		},


		createImage(file) {
			var image = new Image();
			var reader = new FileReader();
			var vm = this;

			reader.onload = (e) => {
				vm.nav.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},


		removeImage: function (e) {
			this.nav.image = '';
		},


		onSubmit () {
			var vm = this;
			var url = baseUrl + 'navigations';
			axios.post(url, vm.nav).then(function (response) {
				console.log(response);
			}).catch(function (errors) {
				console.log(errors);
			});
		},


		getParents () {
			var vm = this;
			var url = baseUrl + 'navigations/parents';
			axios.get(url).then(function (response) {
				vm.parents = response.data.data;
			}).catch(function (errors) {
				console.log(errors);
			});
		},
	},

	computed: {
		slugTitle () {
			var title = this.nav.text_link;
			var stringArrayUrl = Common.changeToSlug(title).split(" ");;
			this.nav.url = stringArrayUrl.join('-');
		}
	}
} // End class