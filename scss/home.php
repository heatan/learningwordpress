<?php get_header(); ?>
<div class="container">
    <div class="contents">

<?php if(!is_paged()): ?>
  <div class="home-top">
    <?php if(have_posts()): the_post(); ?>
    <article <?php post_class('article-list articletop'); ?>>
    <a href="<?php the_permalink(); ?>">
    <div class="img-wrap">
      <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail('full'); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-image"/>
      <?php endif; ?>
      <?php if(!is_category() && has_category()): ?>
        <span class="cat-data">
          <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
        </span>
      <?php endif; ?>
    </div>

    <div class="text">
      <span class="new-post"><i class="fas fa=star"></i>NEW POST</span>
      <h2><?php the_title(); ?></h2>
      <span class="article-date">
        <i class="fas fa-clock"></i>
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
        <?php echo get_the_date(); ?>
      </time>
      </span>
      <span class="article-author">
        <i class="fas fa-user"></i><?php the_author(); ?>
      </span>
      <?php the_excerpt(); ?>
    </div>
  </a>
  </article>
  <?php endif; ?>
  </div>
  <?php endif; ?>

  <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php get_template_part('loop-content'); ?>
    <?php endwhile; endif; ?>

    <div class="pagination">
    <?php echo paginate_links( array(
        'type' => 'list',
        'mid_size' => '1',
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>'
    )); ?>
    </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>