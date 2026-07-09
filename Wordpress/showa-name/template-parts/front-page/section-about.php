<?php
/**
 * フロント：About グリッド
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$links = array(
	array( 'url' => home_url( '/about/' ), 'img' => 'top-about1.png', 'title' => __( '昭和ネームの想い', 'showa-name' ) ),
	array( 'url' => home_url( '/quality/' ), 'img' => 'top-about2.png', 'title' => __( '品質へのこだわり', 'showa-name' ) ),
	array( 'url' => home_url( '/eco/' ), 'img' => 'top-about3.png', 'title' => __( '環境への取り組み', 'showa-name' ) ),
	array( 'url' => home_url( '/works/' ), 'img' => 'top-about4.png', 'title' => __( 'ものづくりの強み', 'showa-name' ) ),
	array( 'url' => home_url( '/results/' ), 'img' => 'top-about5.png', 'title' => __( '多彩な製品展開', 'showa-name' ) ),
);
?>
<!-- ================= About ================= -->
<section id="about" class="section section-about">
	<div class="section-inner">
		<header class="section-header">
			<p class="section-label-en">About Showa Nameplate</p>
			<h2 class="section-title"><?php esc_html_e( '昭和ネームプレートについて', 'showa-name' ); ?></h2>
			<p class="section-lead">
				<?php esc_html_e( '昭和ネームプレートは、シルク印刷を中心に、さまざまな素材や形状の製品に印刷を行っています。', 'showa-name' ); ?>
			</p>
		</header>

		<div class="about-grid">
			<?php foreach ( $links as $row ) : ?>
				<a href="<?php echo esc_url( $row['url'] ); ?>" class="about-card">
					<div class="about-card-icon">
						<img src="<?php echo esc_url( showa_asset_url( 'img/' . $row['img'] ) ); ?>" alt="" width="120" height="120" loading="lazy" decoding="async" />
					</div>
					<p class="about-card-title"><?php echo esc_html( $row['title'] ); ?></p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
