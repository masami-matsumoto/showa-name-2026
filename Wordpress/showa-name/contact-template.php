<?php
/**
 * Template Name: お問い合わせ（MW WP Form）
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
				<p class="section-lead">
					<?php esc_html_e( '下記フォームに必要事項をご入力のうえ、「確認画面へ」ボタンを押してください。', 'showa-name' ); ?>
				</p>
			</div>
		</section>
		<section class="section" aria-labelledby="contact-title">
			<div class="section-inner contact-page__inner" id="contact-title">
				<?php
				// 固定ページ本文に [mwform_formkey] を入れる運用を優先（管理画面でフォーム切替しやすい）。
				$page_content = (string) get_post_field( 'post_content', get_the_ID() );
				$page_content = trim( $page_content );

				if ( $page_content !== '' ) {
					// ブロック + ショートコード両対応。ただし wpautop による <p>/<br> 自動挿入で
					// DOM が崩れて静的HTMLとズレやすいので、ここでは the_content は通さない。
					$content = $page_content;
					$content = do_blocks( $content );
					$content = shortcode_unautop( $content );
					$content = do_shortcode( $content );
					echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					$shortcode = (string) get_theme_mod( 'showa_contact_form_shortcode', '[mwform_formkey key=\"\"]' );
					$shortcode = apply_filters( 'showa_contact_form_shortcode', $shortcode );
					echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
