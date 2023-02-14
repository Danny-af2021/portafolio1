<?php
/**
 * Displays footer site info
 */

?>
<?php if( get_theme_mod( 'print_on_demand_hide_show_scroll',false) != '' || get_theme_mod( 'print_on_demand_enable_disable_scrolltop',false) != '') { ?>
    <?php $print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_footer_options','Right');
        if($print_on_demand_theme_lay == 'Left align'){ ?>
            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('print_on_demand_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'print-on-demand' ); ?></span></a>
        <?php }else if($print_on_demand_theme_lay == 'Center align'){ ?>
            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('print_on_demand_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'print-on-demand' ); ?></span></a>
        <?php }else{ ?>
            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('print_on_demand_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'print-on-demand' ); ?></span></a>
    <?php }?>
<?php }?>
<div class="site-info">
    <div class="container">
    	<span><?php echo esc_html(get_theme_mod('print_on_demand_footer_text',__('Print On Demand WordPress Theme By ThemesEye','print-on-demand'))); ?></span>
    	<span class="footer_text"><?php echo esc_html_e('Powered By WordPress','print-on-demand') ?></span>
    </div>
</div>