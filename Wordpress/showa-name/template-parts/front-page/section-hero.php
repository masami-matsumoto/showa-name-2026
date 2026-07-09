<?php
/**
 * フロント：ヒーロー
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$home = home_url( '/' );
?>
<!-- ================= Hero ================= -->
<section id="hero" class="hero">
	<div class="hero-inner">
		<a href="<?php echo esc_url( $home ); ?>" class="hero-visual hero-vertical">
			<img src="<?php echo esc_url( showa_asset_url( 'img/main2.jpg' ) ); ?>" alt="<?php esc_attr_e( '製品写真', 'showa-name' ); ?>" class="hero-image" width="800" height="600" />
			<p class="hero-label"><span><?php esc_html_e( '表示の品質を', 'showa-name' ); ?></span></p>
		</a>
		<a href="<?php echo esc_url( $home ); ?>" class="hero-visual hero-small1">
			<img src="<?php echo esc_url( showa_asset_url( 'img/main3.jpg' ) ); ?>" alt="<?php esc_attr_e( '製品写真', 'showa-name' ); ?>" class="hero-image" width="400" height="300" />
			<p class="hero-label"><span><?php esc_html_e( 'あらゆる製品に', 'showa-name' ); ?></span></p>
		</a>
		<a href="<?php echo esc_url( $home ); ?>" class="hero-visual hero-small2">
			<img src="<?php echo esc_url( showa_asset_url( 'img/main4.jpg' ) ); ?>" alt="<?php esc_attr_e( '製品写真', 'showa-name' ); ?>" class="hero-image" width="400" height="300" />
			<p class="hero-label"><span><?php esc_html_e( '安心を伝える', 'showa-name' ); ?></span></p>
		</a>
		<a href="<?php echo esc_url( $home ); ?>" class="hero-visual hero-landscape">
			<img src="<?php echo esc_url( showa_asset_url( 'img/main5.jpg' ) ); ?>" alt="<?php esc_attr_e( '製品写真', 'showa-name' ); ?>" class="hero-image" width="1200" height="400" />
			<p class="hero-label"><span><?php esc_html_e( '製品の信頼を刻む', 'showa-name' ); ?></span></p>
		</a>
		<a href="<?php echo esc_url( $home ); ?>" class="hero-visual hero-large">
			<img src="<?php echo esc_url( showa_asset_url( 'img/main1.jpg' ) ); ?>" alt="<?php esc_attr_e( '製品写真', 'showa-name' ); ?>" class="hero-image" width="1200" height="800" />
			<p class="hero-label"><span><?php esc_html_e( '製品の“顔”をつくる', 'showa-name' ); ?></span></p>
		</a>
	</div>
</section>
