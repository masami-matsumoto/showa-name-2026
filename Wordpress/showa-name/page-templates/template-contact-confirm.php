<?php
/**
 * Template Name: お問い合わせ（確認画面）
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
		<section class="section" aria-labelledby="contact-confirm-title">
			<div class="section-inner contact-page__inner" id="contact-confirm-title">
				<?php
				// 確認画面はMW WP Formのショートコードを固定ページ本文に置く運用を想定。
				$page_content = trim( (string) get_post_field( 'post_content', get_the_ID() ) );

				if ( $page_content !== '' ) {
					$content = do_blocks( $page_content );
					$content = shortcode_unautop( $content );
					$content = do_shortcode( $content );
					echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					echo '<p>' . esc_html__( '確認画面の表示内容（MW WP Formのショートコード）を、この固定ページの本文に入力してください。', 'showa-name' ) . '</p>';
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

