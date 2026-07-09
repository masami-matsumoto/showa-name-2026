<?php
/**
 * フロント：お知らせ（投稿5件）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$news_q = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 5,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$page_for_posts = (int) get_option( 'page_for_posts' );
$archive_url    = $page_for_posts ? get_permalink( $page_for_posts ) : '';
$archive_url    = $archive_url ? $archive_url : showa_get_news_archive_url();
?>
<!-- ================= News ================= -->
<section id="news" class="section section-news">
	<div class="section-inner">
		<header class="section-header">
			<p class="section-label-en">News</p>
			<h2 class="section-title"><?php esc_html_e( 'お知らせ', 'showa-name' ); ?></h2>
		</header>

		<div class="news-list">
			<?php
			if ( $news_q->have_posts() ) :
				while ( $news_q->have_posts() ) :
					$news_q->the_post();
					$dt = get_the_date( 'Y.m.d' );
					?>
					<article class="news-item">
						<a href="<?php the_permalink(); ?>" class="news-link">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" class="news-date"><?php echo esc_html( $dt ); ?></time>
							<span class="news-label"><?php esc_html_e( 'お知らせ', 'showa-name' ); ?></span>
							<span class="news-title"><?php the_title(); ?></span>
						</a>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<div class="section-more">
			<a href="<?php echo esc_url( $archive_url ); ?>" class="button-more"><?php esc_html_e( '一覧を見る', 'showa-name' ); ?></a>
		</div>
	</div>
</section>
