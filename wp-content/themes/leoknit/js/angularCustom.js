var app = angular.module('leoKnitApp', ['angular-loading-bar', 'ngAnimate']);

app.config(function(cfpLoadingBarProvider) {
  cfpLoadingBarProvider.includeSpinner = true;
});

app.controller('ArticleList', function ($scope, $http) {
  /** GLOBAL VARS **/
	var isAnimating = false,
  	  current = -1,
      gridEl = document.getElementById('theGrid'),
      docElem = window.document.documentElement,
      bodyEl = document.body,
      support = { transitions: Modernizr.csstransitions },
  		// transition end event name
  		transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
  		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
  		onEndTransition = function( el, callback ) {
  			var onEndCallbackFn = function( ev ) {
  				if( support.transitions ) {
  					if( ev.target != this ) return;
  					this.removeEventListener( transEndEventName, onEndCallbackFn );
  				}
  				if( callback && typeof callback === 'function' ) { callback.call(this); }
  			};
  			if( support.transitions ) {
  				el.addEventListener( transEndEventName, onEndCallbackFn );
  			}
  			else {
  				onEndCallbackFn();
  			}
  		},
      contentItemsContainer = gridEl.querySelector('section.content'),
      sidebarEl = document.getElementById('theSidebar'),
      menuCloseCtrl = sidebarEl.querySelector('.close-button'),
      closeCtrl = contentItemsContainer.querySelector('.close-button'),
      menuCtrl = document.getElementById('menu-toggle'),
      gridItemsContainer = gridEl.querySelector('section.grid'),
      gridItems = gridItemsContainer.querySelectorAll('.grid__item');

  $scope.articles = [];
  var offset = 0;
  $scope.showMore = 0;

  var grabMoreArticle = function() {
    $scope.showMore = 0;
    $http.get('api/article.json?offset=' + offset).success(function(data) {
      if(data.length > 0){
        $scope.showMore = 1;
      }else{
        $scope.showMore = 0;
      }
      $scope.articles = $scope.articles.concat(data);
    });
    offset++;
  }

  grabMoreArticle();

  $scope.loadMaoreArticles = function() {
    grabMoreArticle();
  }

  /** TRANSITION MANAGER **/

  var getViewport = function( axis ) {
    var client, inner;
    if( axis === 'x' ) {
      client = docElem['clientWidth'];
      inner = window['innerWidth'];
    }
    else if( axis === 'y' ) {
      client = docElem['clientHeight'];
      inner = window['innerHeight'];
    }

    return client < inner ? inner : client;
  }

  var scrollX = function() { return window.pageXOffset || docElem.scrollLeft; }
  var scrollY = function() { return window.pageYOffset || docElem.scrollTop; }

  $scope.showContent = function($event) {
    var item = $event.target;
    var pos = jQuery(item).data('pos');
    if(isAnimating || current === pos) {
      return false;
    }
    isAnimating = true;
    // index of current item
    current = pos;
    // simulate loading time..
    classie.add(item, 'grid__item--loading');
    setTimeout(function() {
      classie.add(item, 'grid__item--animate');
      // reveal/load content after the last element animates out (todo: wait for the last transition to finish)
      setTimeout(function() {
        loadContent(item);
      }, 500);
    }, 1000);
  }

  var initEvents = function() {
		closeCtrl.addEventListener('click', function() {
			// hide content
			hideContent();
		});

		// keyboard esc - hide content
		document.addEventListener('keydown', function(ev) {
			if(!isAnimating && current !== -1) {
				var keyCode = ev.keyCode || ev.which;
				if( keyCode === 27 ) {
					ev.preventDefault();
					if ("activeElement" in document)
    					document.activeElement.blur();
					hideContent();
				}
			}
		} );

		// hamburger menu button (mobile) and close cross
		menuCtrl.addEventListener('click', function() {
			if( !classie.has(sidebarEl, 'sidebar--open') ) {
				classie.add(sidebarEl, 'sidebar--open');
			}
		});

		menuCloseCtrl.addEventListener('click', function() {
			if( classie.has(sidebarEl, 'sidebar--open') ) {
				classie.remove(sidebarEl, 'sidebar--open');
			}
		});
	}

  initEvents();

  var loadContent  = function(item) {
		// add expanding element/placeholder
		var dummy = document.createElement('div');
		dummy.className = 'placeholder';

		// set the width/heigth and position
		dummy.style.WebkitTransform = 'translate3d(' + (item.offsetLeft - 5) + 'px, ' + (item.offsetTop - 5) + 'px, 0px) scale3d(' + item.offsetWidth/gridItemsContainer.offsetWidth + ',' + item.offsetHeight/getViewport('y') + ',1)';
		dummy.style.transform = 'translate3d(' + (item.offsetLeft - 5) + 'px, ' + (item.offsetTop - 5) + 'px, 0px) scale3d(' + item.offsetWidth/gridItemsContainer.offsetWidth + ',' + item.offsetHeight/getViewport('y') + ',1)';

		// add transition class
		classie.add(dummy, 'placeholder--trans-in');

		// insert it after all the grid items
		gridItemsContainer.appendChild(dummy);

		// body overlay
		classie.add(bodyEl, 'view-single');

		setTimeout(function() {
			// expands the placeholder
			dummy.style.WebkitTransform = 'translate3d(-5px, ' + (scrollY() - 5) + 'px, 0px)';
			dummy.style.transform = 'translate3d(-5px, ' + (scrollY() - 5) + 'px, 0px)';
			// disallow scroll
			window.addEventListener('scroll', noscroll);
		}, 25);

		onEndTransition(dummy, function() {
			// add transition class
			classie.remove(dummy, 'placeholder--trans-in');
			classie.add(dummy, 'placeholder--trans-out');
			// position the content container
			contentItemsContainer.style.top = scrollY() + 'px';
			// show the main content container
			classie.add(contentItemsContainer, 'content--show');
			// show content item:
      // Reinitialize contentItems
      var contentItems = contentItemsContainer.querySelectorAll('.content__item');
			classie.add(contentItems[current], 'content__item--show');
			// show close control
			classie.add(closeCtrl, 'close-button--show');
			// sets overflow hidden to the body and allows the switch to the content scroll
			classie.addClass(bodyEl, 'noscroll');

			isAnimating = false;
		});
	}

	var hideContent = function() {
    // Reinitialize contentItems
    var contentItems = contentItemsContainer.querySelectorAll('.content__item');
    var gridItems = gridItemsContainer.querySelectorAll('.grid__item');
		var gridItem = gridItems[current], contentItem = contentItems[current];
    console.log(gridItem);

		classie.remove(contentItem, 'content__item--show');
		classie.remove(contentItemsContainer, 'content--show');
		classie.remove(closeCtrl, 'close-button--show');
		classie.remove(bodyEl, 'view-single');

		setTimeout(function() {
			var dummy = gridItemsContainer.querySelector('.placeholder');

			classie.removeClass(bodyEl, 'noscroll');

			dummy.style.WebkitTransform = 'translate3d(' + gridItem.offsetLeft + 'px, ' + gridItem.offsetTop + 'px, 0px) scale3d(' + gridItem.offsetWidth/gridItemsContainer.offsetWidth + ',' + gridItem.offsetHeight/getViewport('y') + ',1)';
			dummy.style.transform = 'translate3d(' + gridItem.offsetLeft + 'px, ' + gridItem.offsetTop + 'px, 0px) scale3d(' + gridItem.offsetWidth/gridItemsContainer.offsetWidth + ',' + gridItem.offsetHeight/getViewport('y') + ',1)';

			onEndTransition(dummy, function() {
				// reset content scroll..
				contentItem.parentNode.scrollTop = 0;
				gridItemsContainer.removeChild(dummy);
				classie.remove(gridItem, 'grid__item--loading');
				classie.remove(gridItem, 'grid__item--animate');
				lockScroll = false;
				window.removeEventListener( 'scroll', noscroll );
			});

			// reset current
			current = -1;
		}, 25);
	}

	var noscroll = function() {
		if(!lockScroll) {
			lockScroll = true;
			xscroll = scrollX();
			yscroll = scrollY();
		}
		window.scrollTo(xscroll, yscroll);
	}

});