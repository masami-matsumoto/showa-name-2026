<?php
/**
 * フロントページ
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main">
	<h1 class="screen-reader-text"><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?> — <?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></h1>
	<?php
	get_template_part( 'template-parts/front-page/section', 'hero' );
	get_template_part( 'template-parts/front-page/section', 'about' );
	get_template_part( 'template-parts/front-page/section', 'works' );
	get_template_part( 'template-parts/front-page/section', 'topics' );
	get_template_part( 'template-parts/front-page/section', 'news' );
	?>
</main>
<?php
get_footer();
