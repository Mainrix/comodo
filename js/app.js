const store = BX.Vuex.store({
	state: {
		favorites: [],
		count: 0,

	},
	mutations: {

		setFavorites(state, favorites) {
			state.favorites = favorites;
		},
	},
	actions: {
		async updateFavoritesCount() {
			var request = BX.ajax.runAction('site:main.favorites.get', {
				data: {}
			});
			request.then(function (response) {
				if (response.status == "success")
					store.commit('setFavorites', response.data.elements)
			});
		},
	}
})

store.dispatch('updateFavoritesCount');

BX.Vue.component('favorites', {
	computed: {
		elements() {
			return store.state.favorites
		},
		active() {
			return (this.elements.includes(this.id));
		},
	},
	methods: {
		add: function () {
			var data = {productId: this.id};
			var request = BX.ajax.runAction('site:main.favorites.add', {
				data: data
			});
			this.result(request);
		},
		delete: function () {
			var data = {productId: this.id};
			var request = BX.ajax.runAction('site:main.favorites.delete', {
				data: data
			});
			this.result(request);
		},
		change: function (event) {
			var request = null;
			var data = {productId: this.id};
			if (this.active) {
				this.delete();
			} else {
				this.add();
			}
			event.preventDefault();
			event.stopPropagation();
			return false;
		},
		result: function (request) {
			request.then(function (response) {
				store.commit('setFavorites', response.data.elements)
			});
		}
	},
	props: ['id'],
	template: `
 												<button
                                type="button"
                                aria-label="button"
                                v-on:click="change" :class="{'btn btn-favorite _icon _round _flat':1,'_active':active}"
                        >
                            <svg class="btn__icon" width="24" height="24" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 4C4.46244 4 2 6.46245 2 9.5C2 15 8.5 20 12 21.1631C15.5 20 22 15 22 9.5C22 6.46245 19.5375 4 16.5 4C14.6398 4 12.9953 4.92345 12 6.3369C11.0047 4.92345 9.36015 4 7.5 4Z"
                                      stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>`
});


BX.Vue.create({
	el: '#headerApp',
	computed: {
		elements() {
			return store.state.favorites
		},
	},
	store: store,
});
BX.Vue.create({
	el: '#pageContentApp',
	store: store,
});


BX.ready(function () {

	$('body').on('click', '.js-load-journal', function () {
		var el = $(this);
		var NavNum = el.data('navnum')
		var NavPageCount = el.data('pagecount')
		var NavPageNomer = el.data('page')
		var nextPage = NavPageNomer + 1;
		var data = {};
		data['action'] = 'showMore';
		data['PAGEN_' + NavNum] = nextPage;
		el.closest('.pagenBlock').hide();
		el.data('page', nextPage);

		if (nextPage <= NavPageCount) {
			$.getJSON('/journal/', data, function (data) {
				if (data.items) {
					$('#js-journalitems-block').append(data.items)
					eval("\n\nvar observationOpts = {\n  root: null,\n  rootMargin: '0px',\n  threshold: 0.01\n};\n\nvar cachedImages = [];\nvar lazyImages = [].slice.call(document.querySelectorAll(\"img[data-src]\"));\nvar lazyImagesBg = [].slice.call(document.querySelectorAll(\"[data-src-bg]\"));\n\nif (\"IntersectionObserver\" in window && lazyImages.length > 0) {\n  var lazyImageObserver = new IntersectionObserver(function (entries, observer) {\n    entries.forEach(function (entry) {\n      if (entry.isIntersecting) {\n        var _onFinish = function _onFinish() {\n          card.removeClass('card-lazy');\n          card.find('.block-placeholder').removeClass('block-placeholder');\n          card.removeClass('block-placeholder');\n          card.find('.text-placeholder').removeClass('text-placeholder');\n        };\n\n        var lazyImage = entry.target;\n        var dataset = lazyImage.dataset;\n        var isCached = cachedImages.find(function (src) {\n          return src === dataset.src;\n        });\n        var card = $(lazyImage).closest('.card-lazy');\n\n        lazyImage.src = dataset.src;\n        lazyImage.removeAttribute(\"data-src\");\n\n        if (dataset.srcset) {\n          lazyImage.srcset = dataset.srcset;\n          lazyImage.removeAttribute(\"data-srcset\");\n        }\n\n        if (!isCached) {\n          lazyImage.onload = function () {\n            if (card.length > 0) {\n              _onFinish();\n              cachedImages.push(dataset.src);\n            }\n          };\n\n          lazyImage.onerror = function () {\n            _onFinish();\n          };\n        } else {\n          if (card.length > 0) {\n            _onFinish();\n          }\n        }\n\n        lazyImageObserver.unobserve(lazyImage);\n      }\n    });\n  }, observationOpts);\n\n  lazyImages.forEach(function (lazyImage) {\n    lazyImageObserver.observe(lazyImage);\n  });\n} else {\n  // Possibly fall back to event handlers here\n}\n\nif (\"IntersectionObserver\" in window && lazyImagesBg.length > 0) {\n  var _lazyImageObserver = new IntersectionObserver(function (entries, observer) {\n    entries.forEach(function (entry) {\n      if (entry.isIntersecting) {\n        var lazyImageBg = entry.target;\n        var dataset = lazyImageBg.dataset;\n        var isCached = cachedImages.find(function (src) {\n          return src === dataset.src;\n        });\n        var card = $(lazyImageBg).closest('.card-lazy');\n\n        if (!isCached) {\n          var _onFinish2 = function _onFinish2() {\n            lazyImageBg.style.backgroundImage = \"url(\" + dataset.srcBg + \")\";\n            card.find('.block-placeholder').removeClass('block-placeholder');\n            card.find('.text-placeholder').removeClass('text-placeholder');\n            card.removeClass('card-lazy');\n          };\n\n          var bgImg = new Image();\n\n          bgImg.src = dataset.srcBg;\n\n          bgImg.onload = function () {\n            if (card.length > 0) {\n              _onFinish2();\n            }\n\n            lazyImageBg.removeAttribute(\"data-src\");\n          };\n\n          bgImg.onerror = function () {\n            _onFinish2();\n          };\n        } else {\n          onFinish();\n        }\n\n        lazyImageBg.removeAttribute(\"data-src\");\n        _lazyImageObserver.unobserve(lazyImageBg);\n      }\n    });\n  }, observationOpts);\n\n  lazyImagesBg.forEach(function (lazyImageBg) {\n    _lazyImageObserver.observe(lazyImageBg);\n  });\n} else {\n  // Possibly fall back to event handlers here\n}\n\n//# sourceURL=webpack:///./resources/js/modules/lazyLoad.js?");
					if (nextPage < NavPageCount) el.closest('.pagenBlock').show();
				}
			})
		}
	});



})