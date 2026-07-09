<?php
/**
 * フロント：トピックス（固定ページ・テンプレート指定分）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$templates = showa_get_topic_page_templates();

$count_q = new WP_Query(
	array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'no_found_rows'  => true,
		'meta_query'     => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => $templates,
				'compare' => 'IN',
			),
		),
	)
);

$topics_q = new WP_Query(
	array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => 8,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => $templates,
				'compare' => 'IN',
			),
		),
	)
);

$total       = (int) $count_q->found_posts;
$more_url    = showa_get_news_archive_url();
$placeholder = showa_asset_url( 'img/topics-banner1.jpg' );
?>
<!-- ================= Topics ================= -->
<section id="topics" class="section section-topics">
	<div class="section-inner">
		<header class="section-header">
			<p class="section-label-en">Topics</p>
			<h2 class="section-title"><?php esc_html_e( 'トピックス', 'showa-name' ); ?></h2>
		</header>

		<div class="topics-grid">
			<?php
			if ( $topics_q->have_posts() ) :
				while ( $topics_q->have_posts() ) :
					$topics_q->the_post();
					$pid      = get_the_ID();
					$cat      = get_post_meta( $pid, 'showa_topic_category', true );
					$cat_disp = $cat ? $cat : __( 'Topics', 'showa-name' );
					$title = get_the_title( $pid );
					$thumb = get_the_post_thumbnail_url( $pid, 'medium_large' );
					if ( ! $thumb ) {
						$thumb = $placeholder;
					}
					?>
					<article class="topics-card">
						<a href="<?php the_permalink(); ?>" class="topics-link">
							<div class="topics-thumb">
								<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="640" height="360" loading="lazy" decoding="async" />
							</div>
							<div class="topics-body">
								<p class="topics-category"><?php echo esc_html( $cat_disp ); ?></p>
								<p class="topics-text"><?php echo esc_html( $title ); ?></p>
							</div>
						</a>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<?php if ( $total > 8 ) : ?>
			<div class="section-more">
				<a href="<?php echo esc_url( $more_url ); ?>" class="button-more"><?php esc_html_e( 'もっと見る', 'showa-name' ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
