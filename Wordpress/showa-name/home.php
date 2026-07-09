<?php
/**
 * 投稿一覧（投稿ページ）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();

$hero_title = __( 'お知らせ一覧', 'showa-name' );
?>
<main id="main" class="site-main" role="main">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<section class="page-hero" aria-labelledby="page-hero-title">
		<div class="page-hero__inner">
			<h1 class="page-hero__title" id="page-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
		</div>
	</section>

	<section id="news" class="section section-news">
		<div class="section-inner">
			<?php if ( have_posts() ) : ?>
				<div class="news-list">
					<?php
					while ( have_posts() ) :
						the_post();
						$dt   = get_the_date( 'Y.m.d' );
						$cats = get_the_category();
						$lab  = ! empty( $cats ) ? $cats[0]->name : __( 'お知らせ', 'showa-name' );
						?>
						<article class="news-item">
							<a href="<?php the_permalink(); ?>" class="news-link">
								<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" class="news-date"><?php echo esc_html( $dt ); ?></time>
								<span class="news-label"><?php echo esc_html( $lab ); ?></span>
								<span class="news-title"><?php the_title(); ?></span>
							</a>
						</article>
						<?php
					endwhile;
					?>
				</div>

				<?php
				global $wp_query;
				if ( $wp_query && (int) $wp_query->max_num_pages > 1 ) :
					$links = paginate_links(
						array(
							'type'      => 'array',
							'mid_size'  => 1,
							'prev_text' => __( '前へ', 'showa-name' ),
							'next_text' => __( '次へ', 'showa-name' ),
						)
					);
					if ( is_array( $links ) ) :
						?>
						<div class="section-more">
							<nav class="navigation pagination" role="navigation" aria-label="<?php esc_attr_e( 'ページ送り', 'showa-name' ); ?>">
								<div class="nav-links">
									<?php
									foreach ( $links as $html ) {
										echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									}
									?>
								</div>
							</nav>
						</div>
						<?php
					endif;
				endif;
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
