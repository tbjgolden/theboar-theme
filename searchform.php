<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <label>
    <span class="screen-reader-text">Search</span>
    <input type="text" class="search-field" placeholder="Search" value="<?php the_search_query(); ?>" name="s">
  </label>
  <button type="submit" class="search-submit">
    <?php echo twentynineteen_get_icon_svg( 'search', 22 ); ?>
  </button>
</form>