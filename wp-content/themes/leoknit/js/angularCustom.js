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
        controller: 'ArticleCtrl'
      });/*.
      otherwise({
        redirectTo: '/phones'
      });*/
  }
]);

/******** ARTICLE CONTROLLER ********/
app.controller('ArticleCtrl', function ($scope, $http, $routeParams) {

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

      if( angular.isUndefined( $scope.articles ) )
        $scope.articles = [];

      $scope.articles = $scope.articles.concat(data);
    });

    $scope.offset++;
  }

  $scope.showContent = function($event, articleId) {
    //classie.add($scope.item, 'grid__item--loading');
    //classie.add($scope.item, 'grid__item--animate');
  }

  grabMoreArticle();

});


$routeParams.articleId


var tfjassApp = angular.module('tfjassApp', ['ui.bootstrap', 'ngRoute']);

      tfjassApp.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('//');
        $interpolateProvider.endSymbol('//');
      });

      /* factories */
      tfjassApp.factory('gethttp', function($http) {
        this.httpRequest = function(url){
          return $http.get(
            url
          ).error(function(data, status, headers, config) {
            alert('Une erreur s\'est produite !');
          });
        };
        this.postHttpRequest = function(url, postData){
          return $http.post(
            url, postData
          ).error(function(data, status, headers, config) {
            alert('Une erreur s\'est produite !');
          });
        };
        return this;
      });

      tfjassApp.factory('convertDate', function($filter) {
        this.dateYmd = function(dated){
          return $filter('date')(new Date(dated), 'dd-MM-yyyy')
        };
        this.datehm = function(dateh){
          return $filter('date')(new Date(dateh), 'hh:mm')
        };
        return this;
      });

      /* get info for welcome page */
      tfjassApp.controller('indexController', function($scope, $sce, gethttp, convertDate) {

        gethttp.httpRequest("{{ app.url_generator.generate('dataIndex') }}").success(function(data, status, headers, config) {
          data.concertDate = convertDate.dateYmd(data.concertDate.date);
          data.concertHeure = convertDate.datehm(data.concertHeure.date);
          $scope.data = data;
        });

        $scope.bindHtmlContent = function() {
          if($scope.data)
            return $sce.trustAsHtml($scope.data.content);
        };

        $scope.bindNextConcert = function () {
          if($scope.data){
            if($scope.data.concertId)
              return $sce.trustAsHtml($scope.data.concertDate + ' ' + $scope.data.concertHeure + ' : ' + $scope.data.concertLieu + ' - ' + $scope.data.concertPrix);
            else
              return $sce.trustAsHtml('Pas de concert de prévu :(');
          }
        }
      });

      /* getconcerts info */
      tfjassApp.controller('concertController', function($scope, gethttp, convertDate) {
        gethttp.httpRequest("{{ app.url_generator.generate('dataConcerts') }}").success(function(data, status, headers, config) {
          var concerts = [];
          angular.forEach(data, function(value, key) {
            concerts.push({
              'concertLieu': value.concertLieu,
              'concertHeure': convertDate.datehm(value.concertHeure.date),
              'concertDate': convertDate.dateYmd(value.concertDate.date),
              'concertPrix':  value.concertPrix
            });
          });
          $scope.concerts = concerts;
        });
      });

      /* getbio info */
      tfjassApp.controller('bioController', function($scope, gethttp, $sce) {
        gethttp.httpRequest("{{ app.url_generator.generate('dataBio') }}").success(function(data, status, headers, config) {
          $scope.data = data;
        });

        $scope.bindHtmlContent = function() {
          if($scope.data)
            return $sce.trustAsHtml($scope.data.content);
        };
      });

      /* Contact info */
      tfjassApp.controller('contactController', function($scope) {});

      /* Sound control */
      tfjassApp.controller('soundController', function($scope) {
        $scope.sound = 'on';
        $scope.mutesound = function(){
          player.playOrStop();
          if($scope.sound == 'on'){
            $scope.sound = 'off';
          }else{
            $scope.sound = 'on';
          }
        };
      });

      /* carousel ui bootstrap */
      tfjassApp.controller('CarouselCtrl', function ($scope, gethttp) {
        $scope.myInterval = 5000;
        $scope.noWrapSlides = false;
        $scope.slides = [];
        gethttp.httpRequest("{{ app.url_generator.generate('dataPhotos') }}").success(function(data, status, headers, config) {
          $scope.slides = data;
        });
      });

      /* formulaire inscription newsletter */
      tfjassApp.controller('newsletterController', function($scope, gethttp) {
        $scope.newsInscrit = function(newsemail) {
          gethttp.postHttpRequest(
            "{{ app.url_generator.generate('dataNews') }}",
            {email: newsemail}
          ).success(function(data, status, headers, config) {
            alert(data.msg);
          });
          $scope.newsReset();
        };

        $scope.newsReset = function() {
          $scope.newsemail = '';
        };

        $scope.newsReset();
      });

      /* formulaire inscription newsletter */
      tfjassApp.controller('contactFormController', function($scope, gethttp) {
        $scope.update = function(ctemail, ctmessage) {
          gethttp.postHttpRequest(
            "{{ app.url_generator.generate('dataContact') }}",
            {email: ctemail, message: ctmessage}
          ).success(function(data, status, headers, config) {
            alert(data.msg);
          });
          $scope.reset();
        };

        $scope.reset = function() {
          $scope.ctemail = '';
          $scope.ctmessage = '';
        };

        $scope.reset();
      });

      /* configuring routing */
      tfjassApp.config(['$routeProvider',
        function($routeProvider) {
          $routeProvider.
            when('/', {
              templateUrl: '../views/mobile/accueil.html',
              controller: 'indexController'
            }).
            when('/biographie', {
              templateUrl: '../views/mobile/biographie.html',
              controller: 'bioController'
            }).
            when('/concert', {
              templateUrl: '../views/mobile/concert.html',
              controller: 'concertController'
            }).
            when('/contact', {
              templateUrl: '../views/mobile/contact.html',
              controller: 'contactController'
            }).
            otherwise({
              redirectTo: '/'
            });
        }]);