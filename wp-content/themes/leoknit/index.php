<?php get_header(); ?>

<div id="theGrid" class="main" ng-controller="ArticleList">
  <section class="grid" section>
    <a class="grid__item" ng-repeat="article in articles" ng-click="showContent($event)" data-pos="{{article.pos}}">
      <div class="padding-title">
        <h2 class="title title--preview">{{article.title}}</h2>
        <div class="loader"></div>
        <span class="category">{{article.description}}</span>
      </div>
      <div class="meta meta--preview">
        <img class="meta__avatar" src="{{article.smallthumb}}" />
        <span class="meta__date"><i class="fa fa-calendar-o"></i> {{article.date}}</span>
        <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
      </div>
    </a>
    <footer class="page-meta">
      <span ng-click="loadMaoreArticles()" ng-hide="showMore == false">Load more...</span>
    </footer>
  </section>
  <section class="content">
    <div class="scroll-wrap">
        <article class="content__item" ng-repeat="article in articles">
          <span class="category category--full">{{ article.tags }}</span>
          <h2 class="title title--full">{{ article.title }}</h2>
          <div class="meta meta--full" style="background-image:url('{{ article.bigthumb }}')">
            <!--img class="meta__avatar" src="<?php echo Post::getThumbnail( $post->ID, 'full' )[0] ; ?>" alt="author01" /-->
            <!--span class="meta__author">Matthew Walters</span-->
            <span class="meta__date"><i class="fa fa-calendar-o"></i> {{ article.date }}</span>
            <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
          </div>
          <p>{{ article.content }}</p>
          <div class="slickslider">{{ article.gallery }}</div>
        </article>
    </div>
    <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
  </section>
</div>
</div><!-- /container -->

<?php get_footer(); ?>
