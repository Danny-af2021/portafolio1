<?php
/**
* The sidebar containing the main widget area
*/
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'print-on-demand' ); ?>">
	<?php dynamic_sidebar( 'sidebox-1' ); ?>
</aside>