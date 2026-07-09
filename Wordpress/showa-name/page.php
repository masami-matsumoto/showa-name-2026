<?php
/**
 * 固定ページ（デフォルト）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main" role="main">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<?php
	while ( have_posts() ) :
		the_post();
		$lead_meta = get_post_meta( get_the_ID(), 'showa_page_hero_lead', true );
		$lead        = $lead_meta ? $lead_meta : ( has_excerpt() ? get_the_excerpt() : '' );
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
				<?php if ( $lead ) : ?>
					<div class="page-hero__divider" aria-hidden="true"></div>
					<div class="page-hero__lead"><?php echo wp_kses_post( wpautop( $lead ) ); ?></div>
				<?php endif; ?>
			</div>
		</section>
		<section class="section">
			<div class="section-inner">
				<div class="entry-content">
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
