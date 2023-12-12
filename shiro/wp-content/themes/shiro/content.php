<article id="post - <?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php shiro_thumbnail('thumbnail'); ?>
    </div>
    <div class="entry-header">
        <?php shiro_entry_header(); ?>
        <?php shiro_entry_meta(); ?>
    </div>
    <div class="entry-content">
        <?php shiro_entry_content(); ?>
        <?php (is_single() ? shiro_entry_tag() : ''); ?>
    </div>
</article>