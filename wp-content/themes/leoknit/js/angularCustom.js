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
      });/*.
      otherwise({
        redirectTo: '/phones'
      });*/
  }
]);

/******** ARTICLE CONTROLLER ********/
app.controller('ArticleCtrl', function ($scope, $http) {

  $scope.articles = [];
  $scope.offset = 0;
  $scope.showMore = 0;
  $scope.showNoMore = 0;

  $scope.loadMoreArticles = function() {
    grabMoreArticle();
  }

  var grabMoreArticle = function() {
    $scope.showMore = 0;
    $http.get('http://leosknit.fr/api/article.json?offset=' + $scope.offset).success(function(data) {
      if(data.length > 0){
        $scope.showMore = 1;
      }else{
        $scope.showMore = 0;
      }

      if(data.length == 0){
        $scope.showNoMore = 1;
      }

      $scope.articles = $scope.articles.concat(data);
    });

    $scope.offset++;
  }

  $scope.showContact = function($event, articleId) {
    $scope.showContent($event, articleId);
  }

  $scope.showContent = function($event, articleId) {
    //classie.add($scope.item, 'grid__item--loading');
    //classie.add($scope.item, 'grid__item--animate');
  }

  grabMoreArticle();

});
