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
        }).
        when('/article/:articleId', {
            templateUrl: '/wp-content/themes/leoknit/partials/article-detail.html',
            controller: 'ArticleDetailCtrl'
        });
        /*.
              otherwise({
                redirectTo: '/phones'
              });*/
    }
]);
/******** ARTICLE CONTROLLER ********/
app.controller('ArticleCtrl', function($scope, $http, $routeParams, getHttp, mainDomain) {
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
});
/******** ARTICLE DETAIL CONTROLLER ********/
app.controller('ArticleDetailCtrl', function($scope, $http, $routeParams, $location, getHttp, mainDomain, animateArticle) {
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
});

/******** Factory ********/
app.factory('animateArticle', function() {
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
        var bodyEl = jQuery(document.body);
        jQuery('article.content__item').removeClass('content__item--show');
        jQuery('section.content').removeClass('content--show');
        jQuery('section.content .close-button').removeClass('close-button--show');
        bodyEl.removeClass('view-single');
    };
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