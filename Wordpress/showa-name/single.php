<?php
/**
 * 投稿（お知らせ詳細）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<?php
	while ( have_posts() ) :
		the_post();
		$cats = get_the_category();
		$lab  = ! empty( $cats ) ? $cats[0]->name : __( 'お知らせ', 'showa-name' );
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="section">
			<div class="section-inner">
				<p class="news-meta">
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
					<span class="news-label"><?php echo esc_html( $lab ); ?></span>
				</p>
				<div class="post-body entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
