<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estore
 */

get_header();
?>

<?php get_template_part( 'template-parts/blocks/block-hero' );

if( is_page('o-nas') ) {
	get_template_part( 'template-parts/blocks/block-about' );
} elseif( is_page('shkola-dj') ) {
	get_template_part( 'template-parts/blocks/block-school' );
} elseif( is_page('galereya') ) {
	get_template_part( 'template-parts/blocks/block-gallery' );
} elseif( is_page('dj-sets') ) {
	get_template_part( 'template-parts/blocks/block-sets' );
} elseif( is_page('event-room') ) {
	get_template_part( 'template-parts/blocks/block-eventroom' );
} elseif( is_page('sobytiya') ) {
	get_template_part( 'template-parts/blocks/block-events' );
} elseif( is_page('kontakty') ) {
	get_template_part( 'template-parts/blocks/block-contactdata' );	

	get_template_part( 'template-parts/blocks/block-contacts' );
} elseif( is_page('vakansii') ) {
	get_template_part( 'template-parts/blocks/block-job' );
} else {
	echo '<section class="dark"><div class="container content">';
	the_content();
	echo '</div></section>';
}
?>

<?php
get_footer();
