<?php
/**
 * ヘッダー（index.html 準拠）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- ================= Header ================= -->
<header class="site-header">
	<div class="header-inner">
		<div class="header-main">
			<div class="header-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<picture>
							<source media="(width < 500px)" srcset="<?php echo esc_url( showa_asset_url( 'img/logo_sp.svg' ) ); ?>">
							<img src="<?php echo esc_url( showa_asset_url( 'img/logo.svg' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo-image" width="400" height="120" />
						</picture>
					<?php endif; ?>
				</a>
			</div>

			<button class="nav-toggle" type="button" aria-label="<?php esc_attr_e( 'メニューを開閉', 'showa-name' ); ?>" aria-expanded="false">
				<span class="nav-toggle-bar"></span>
				<span class="nav-toggle-bar"></span>
				<span class="nav-toggle-bar"></span>
			</button>

			<nav class="global-nav" aria-label="<?php esc_attr_e( 'グローバルナビゲーション', 'showa-name' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => false,
						'menu_class'      => 'nav-list',
						'fallback_cb'     => 'showa_fallback_nav',
						'walker'          => new Showa_Walker_Nav_Menu(),
					)
				);
				?>
			</nav>
		</div>
		<nav class="global-nav-sp" aria-label="<?php esc_attr_e( 'グローバルナビゲーション', 'showa-name' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'nav-list',
					'fallback_cb'    => 'showa_fallback_nav_sp',
					'depth'          => 2,
					'walker'         => new Showa_Walker_Nav_Menu_SP(),
				)
			);
			?>
		</nav>
		<a class="header-sub" href="<?php echo esc_url( showa_get_contact_url() ); ?>"><?php esc_html_e( 'お問い合わせ', 'showa-name' ); ?></a>
	</div>
</header>
