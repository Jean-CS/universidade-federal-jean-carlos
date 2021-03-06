<?php get_header(); 

while(have_posts()) {
    the_post(); 
    pageBanner();
    // pageBanner(array(
    //   'title' => 'Hello this is page banner',
    //   'subtitle' => 'Hi, this is subtitle page banner'
    // ));
    ?>

  <div class="container container--narrow page-section">

  <?php 
    // Parent post ID
    $theParent = wp_get_post_parent_id(get_the_ID());

    // Only runs if the current page is a child page
    if ($theParent) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent) ?>
          </a> 
          <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
    <?php } ?>
    
    <?php 
      $pageHasChildren = get_pages(array(
        'child_of' => get_the_ID()
      ));

      // only shows side menu if page has children or has a parent page
      if ($theParent or $pageHasChildren) {
    ?>
      <div class="page-links">
        <h2 class="page-links__title">
          <a href="<?php echo get_permalink(); ?>">
            <?php echo get_the_title($theParent) ?>
          </a>
        </h2>
        <ul class="min-list">
          <?php 
            if ($theParent) {
              $findChildrenOf = $theParent;
            } else {
              $findChildrenOf = get_the_ID();
            }

            wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildrenOf,
              // Order by menu order on ADMIN
              'sort_column' => 'menu_order'
            ));
          ?>
        </ul>
      </div>
    <?php } ?>
    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>

<?php 
    }

    get_footer(); 

?>