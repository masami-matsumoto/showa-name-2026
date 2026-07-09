<?php
/**
 * 404 Not Found
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

status_header( 404 );
nocache_headers();

get_header();
?>
<main id="main" class="site-main" role="main">
	<section class="page-hero" aria-labelledby="page-hero-title">
		<div class="page-hero__inner">
			<p class="section-label-en">404 Not Found</p>
			<h1 class="page-hero__title" id="page-hero-title"><?php esc_html_e( 'ページが見つかりません', 'showa-name' ); ?></h1>
		</div>
	</section>

	<section class="section">
		<div class="section-inner">
			<p class="section-lead">
				<?php esc_html_e( 'お探しのページは移動または削除された可能性があります。URL をご確認のうえ、トップページまたはお知らせ一覧からお探しください。', 'showa-name' ); ?>
			</p>
			<ul class="showa-404-actions">
				<li><a class="button-more" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'トップページへ', 'showa-name' ); ?></a></li>
				<li><a class="button-more" href="<?php echo esc_url( showa_get_news_archive_url() ); ?>"><?php esc_html_e( 'お知らせ一覧へ', 'showa-name' ); ?></a></li>
				<li><a class="button-more" href="<?php echo esc_url( showa_get_contact_url() ); ?>"><?php esc_html_e( 'お問い合わせ', 'showa-name' ); ?></a></li>
			</ul>
			<div class="showa-404-search">
				<h2 class="page-section-title"><?php esc_html_e( 'サイト内検索', 'showa-name' ); ?></h2>
				<?php get_search_form(); ?>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
