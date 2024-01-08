<?php 
  get_header();
  ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');?>)"></div>
          <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Welcome to our blog</h1>
            <div class="page-banner__intro">
            <p>Keep up with our latest news.</p>
            </div>
          </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 
      while(have_posts()){
        the_post();
        ?>
          <div class="post-item">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p>Posted by <?php the_author_posts_link(); ?></p>
            <div class="metabox">
              <p><?php echo get_the_time('d/m/Y');?></p>
              <p>Thể loại: <?php echo get_the_category_list(', ');?></p>
            </div>
            <p><?php the_excerpt(); ?></p>
            <p class="btn btn--blue"><a href="<?php the_permalink(); ?>" style="color: white!important">Xem bài viết</a></p>
          </div>
        <?php
      }
      ?><div class="paginate-container">
          <?php echo paginate_links(); ?>
      </div><?php
      ?>
    </div>
  <?php
  get_footer();
?>