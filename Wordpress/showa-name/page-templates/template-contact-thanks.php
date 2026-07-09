<?php
/**
 * Template Name: お問い合わせ（送信完了）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/breadcrumbs' );
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="section" aria-labelledby="contact-thanks-title">
			<div class="section-inner contact-page__inner" id="contact-thanks-title">
				<?php
				// 送信完了は、本文にメッセージ or MW WP Formの完了ショートコードを置けるようにする。
				$page_content = trim( (string) get_post_field( 'post_content', get_the_ID() ) );

				if ( $page_content !== '' ) {
					$content = do_blocks( $page_content );
					$content = shortcode_unautop( $content );
					$content = do_shortcode( $content );
					echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					?>
					<p><?php esc_html_e( 'お問い合わせありがとうございました。内容を確認のうえ、担当者よりご連絡いたします。', 'showa-name' ); ?></p>
					<p><a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'トップへ戻る', 'showa-name' ); ?></a></p>
					<?php
				}
				?>
			</div>
		</section>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();

