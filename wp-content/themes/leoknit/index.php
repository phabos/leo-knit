<?php get_header(); ?>

<div id="theGrid" class="main">
  <section class="grid">
    <a class="grid__item" ng-repeat="article in articles" ng-click="showContent($event, '{{article.uniqId}}')">
      <div class="padding-title">
        <h2 class="title title--preview">{{article.title}}</h2>
        <div class="loader"></div>
        <span class="category">{{article.description}}</span>
      </div>
      <div class="meta meta--preview">
        <img class="meta__avatar" ng-src="{{article.smallthumb}}" />
        <span class="meta__date"><i class="fa fa-calendar-o"></i> {{article.date}}</span>
        <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
      </div>
    </a>
    <footer class="page-meta">
      <span ng-hide="showNoMore == false">No more stories</span>
      <span ng-click="loadMoreArticles()" ng-hide="showMore == false">Older stories...</span>
    </footer>
  </section>
  <section class="content">
    <div class="scroll-wrap">
        <article class="content__item" id="article-contact">
          <h2>Contact form</h2>
          <div>Form</div>
          <div class="clearfix"></div>
        </article>
        <article class="content__item" ng-repeat="article in articles" id="{{article.uniqId}}">
          <span class="category category--full">{{ article.tags }}</span>
          <h2 class="title title--full">{{ article.title }}</h2>
          <div class="meta meta--full" ng-style="{'background-image':'url(\'{{article.bigthumb}}\')'}">
            <!--img class="meta__avatar" src="<?php echo Post::getThumbnail( $post->ID, 'full' )[0] ; ?>" alt="author01" /-->
            <!--span class="meta__author">Matthew Walters</span-->
            <span class="meta__date"><i class="fa fa-calendar-o"></i> {{ article.date }}</span>
            <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
          </div>
          <p>{{ article.content }}</p>
          <div class="carousel-container">
            <ul rn-carousel class="image" rn-carousel-controls>
              <li ng-repeat="image in article.gallery track by $index">
                <div class="layer"><img ng-src="{{ image }}" /></div>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </article>
    </div>
    <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
  </section>
</div>
</div><!-- /container -->

<?php get_footer(); ?>
