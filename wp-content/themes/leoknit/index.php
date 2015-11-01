<?php get_header(); ?>

<div id="theGrid" class="main">
  <section class="grid">
    <?php foreach(PostCollection::getPosts() as $post) : ?>
    <a class="grid__item" href="#">
      <div class="padding-title">
        <h2 class="title title--preview"><?php echo $post->post_title; ?></h2>
        <div class="loader"></div>
        <span class="category"><?php echo Post::getDescription($post->ID); ?></span>
      </div>
      <div class="meta meta--preview">
        <img class="meta__avatar" src="<?php echo Post::getThumbnail( $post->ID )[0] ; ?>" />
        <span class="meta__date"><i class="fa fa-calendar-o"></i> <?php echo Helper::dateToDatetime($post->post_date)->format('d-m-y'); ?></span>
        <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
      </div>
    </a>
  <?php endforeach; ?>
    <footer class="page-meta">
      <span>Load more...</span>
    </footer>
  </section>
  <section class="content">
    <div class="scroll-wrap">
      <?php foreach(PostCollection::getPosts() as $post) : ?>
        <article class="content__item">
          <span class="category category--full"><?php echo Post::getTags( $post->ID ); ?></span>
          <h2 class="title title--full"><?php echo $post->post_title; ?></h2>
          <div class="meta meta--full" style="background-image:url('<?php echo Post::getThumbnail( $post->ID, 'full' )[0] ; ?>')">
            <!--img class="meta__avatar" src="<?php echo Post::getThumbnail( $post->ID, 'full' )[0] ; ?>" alt="author01" /-->
            <!--span class="meta__author">Matthew Walters</span-->
            <span class="meta__date"><i class="fa fa-calendar-o"></i> <?php echo Helper::dateToDatetime($post->post_date)->format('d-m-y'); ?></span>
            <!--span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span-->
          </div>
          <p><?php echo $post->post_content; ?></p>
          <div class="slickslider"><?php echo plugins\ImgGal\ImgGalFront::PH_build_gallery($post->ID); ?></div>
        </article>
      <?php endforeach; ?>
    </div>
    <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
  </section>
</div>
</div><!-- /container -->

<?php get_footer(); ?>
