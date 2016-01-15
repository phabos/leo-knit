/******** INIT APP / SET DEPENDENCE ********/
var app = angular.module('leoKnitApp', ['ngRoute', 'angular-loading-bar', 'ngAnimate', 'ngSanitize', 'angular-carousel']);
/******** CONFIG ********/
// Loader
app.config(function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
});
// Router
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/', {
                templateUrl: '/wp-content/themes/leoknit/partials/article-list.html',
                controller: 'ArticleCtrl'
            })
            /*.
                    when('/article/:articleId', {
                        templateUrl: '/wp-content/themes/leoknit/partials/article-detail.html',
                        controller: 'ArticleDetailCtrl'
                    })*/
        ;
        /*.
              otherwise({
                redirectTo: '/phones'
              });*/
    }
]);
/******** ARTICLE CONTROLLER ********/
app.controller('ArticleCtrl', function($scope, $http, $routeParams, getHttp, mainDomain, animateArticle) {
    $scope.pageClass = 'page-home';
    $scope.offset = 0;
    $scope.showMore = 0;
    $scope.showNoMore = 0;

    // More article button
    $scope.loadMoreArticles = function() {
        grabMoreArticle();
    }
    // Global functio to get the article
    var grabMoreArticle = function() {
        $scope.showMore = 0;
        getHttp.httpRequest(mainDomain.name + '/api/article.json?offset=' + $scope.offset).success(function(data, status, headers, config) {
            if (data.length > 0) {
                $scope.showMore = 1;
            } else {
                $scope.showMore = 0;
            }
            if (data.length == 0) {
                $scope.showNoMore = 1;
            }
            if (angular.isUndefined($scope.articles)) $scope.articles = [];
            $scope.articles = $scope.articles.concat(data);
        });
        $scope.offset++;
    }
    // Fire when controller is called
    grabMoreArticle();
    $scope.loadDetailArticle = function(elt) {
        animateArticle.beforeShowDetail(elt);
    }
    $scope.hideContent = function() {
        animateArticle.hideDetail();
    }
    /*$scope.$on("$locationChangeStart", function(event) {
        var elt = jQuery('#grid_item_' + event.targetScope.$id);
        animateArticle.beforeShowDetail(elt);
    });*/
});
/******** ARTICLE DETAIL CONTROLLER ********/
/*app.controller('ArticleDetailCtrl', function($scope, $http, $routeParams, $location, getHttp, mainDomain, animateArticle) {
    $scope.pageClass = 'page-detail';
    getHttp.httpRequest(mainDomain.name + '/api/article.json?offset=' + $scope.offset).success(function(data, status, headers, config) {
        articleId = $routeParams.articleId;
        console.log(data[articleId].gallery);
        if (angular.isUndefined(data[articleId])) $location = '/';
        $scope.article = data[articleId];
        animateArticle.showDetail();
    });
    $scope.$on("$locationChangeStart", function(event) {
        animateArticle.hideDetail();
    });
});*/
/******** Factory ********/
app.value('lockScroll', false);
app.value('xscroll', '');
app.value('yscroll', '');
app.value('isAnimating', false);
app.factory('animateArticle', function(lockScroll, xscroll, yscroll, isAnimating) {
    this.showDetail = function() {
        var bodyEl = jQuery(document.body);
        bodyEl.addClass('view-single');
        jQuery('section.content').addClass('content--show');
        // show content item:
        jQuery('article.content__item').addClass('content__item--show');
        // show close control
        jQuery('section.content .close-button').addClass('close-button--show');
        // sets overflow hidden to the body and allows the switch to the content scroll
        bodyEl.addClass('noscroll');
    };
    this.hideDetail = function() {
        console.log('close');
        /*var gridItem = gridItems[current], contentItem = contentItems[current];

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
        }, 25);*/
    };
    this.beforeShowDetail = function(elt) {
        jQuery('#' + elt).addClass('grid__item--loading');
        var obj = this;
        setTimeout(function() {
            jQuery('#' + elt).addClass('grid__item--animate');
            setTimeout(function() { obj.loadContent(elt); }, 500);
        }, 1000);
    };
    this.loadContent = function(elt) {
        var item = jQuery('#' + elt);
        var gridEl = document.getElementById('theGrid');
        var gridItemsContainer = gridEl.querySelector('section.grid');
        var bodyEl = document.body;
        var obj = this;
        // add expanding element/placeholder
        var dummy = document.createElement('div');
        dummy.className = 'placeholder';

        // set the width/heigth and position
        jQuery(dummy).css('WebkitTransform', 'translate3d(' + (item.offsetLeft - 5) + 'px, ' + (item.offsetTop - 5) + 'px, 0px) scale3d(' + item.offsetWidth/gridItemsContainer.offsetWidth + ',' + item.offsetHeight/this.getViewport('y') + ',1)');
        jQuery(dummy).css('transform', 'translate3d(' + (item.offsetLeft - 5) + 'px, ' + (item.offsetTop - 5) + 'px, 0px) scale3d(' + item.offsetWidth/gridItemsContainer.offsetWidth + ',' + item.offsetHeight/this.getViewport('y') + ',1)');

        // add transition class
        jQuery(dummy).addClass('placeholder--trans-in');

        // insert it after all the grid items
        gridItemsContainer.appendChild(dummy);

        // body overlay
        jQuery(bodyEl).addClass('view-single');

        setTimeout(function() {
            // expands the placeholder
            jQuery(dummy).css('WebkitTransform', 'translate3d(-5px, ' + (obj.scrollY() - 5) + 'px, 0px)');
            jQuery(dummy).css('transform', 'translate3d(-5px, ' + (obj.scrollY() - 5) + 'px, 0px)');
            // disallow scroll
            window.addEventListener('scroll', obj.noscroll(obj));
        }, 25);

        jQuery(dummy).removeClass('placeholder--trans-in');
        jQuery(dummy).addClass('placeholder--trans-out');
        // position the content container
        jQuery('section.content').css('top', this.scrollY());
        this.showDetail();
    };
    this.getViewport = function( axis ) {
        var docElem = window.document.documentElement;
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
    };
    this.scrollX = function() {
        var docElem = window.document.documentElement;
        return window.pageXOffset || docElem.scrollLeft;
    };
    this.scrollY = function() {
        var docElem = window.document.documentElement;
        return window.pageYOffset || docElem.scrollTop;
    };
    this.noscroll = function(obj) {
        if(!lockScroll) {
            lockScroll = true;
            xscroll = obj.scrollX();
            yscroll = obj.scrollY();
        }
        window.scrollTo(xscroll, yscroll);
    };
    /*function hideContent() {
        var gridItem = gridItems[current], contentItem = contentItems[current];

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
    }*/
    return this;
});
app.factory('getHttp', function($http) {
    this.httpRequest = function(url) {
        return $http.get(url, {
            cache: true
        }).error(function(data, status, headers, config) {
            alert('Une erreur s\'est produite !');
        });
    };
    this.postHttpRequest = function(url, postData) {
        return $http.post(url, postData).error(function(data, status, headers, config) {
            alert('Une erreur s\'est produite !');
        });
    };
    return this;
});
app.factory('mainDomain', function($location) {
    return {
        name: $location.protocol() + "://" + $location.host()
    };
});
/* formulaire inscription newsletter */
/*tfjassApp.controller('contactFormController', function($scope, gethttp) {
    $scope.update = function(ctemail, ctmessage) {
        gethttp.postHttpRequest("{{ app.url_generator.generate('dataContact') }}", {
            email: ctemail,
            message: ctmessage
        }).success(function(data, status, headers, config) {
            alert(data.msg);
        });
        $scope.reset();
    };
    $scope.reset = function() {
        $scope.ctemail = '';
        $scope.ctmessage = '';
    };
    $scope.reset();
});*/