<?php
/**
 * フロント：Works / マップ
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$marker_url = showa_asset_url( 'img/top-map-img/map-marker.png' );
$popups     = showa_get_map_popup_items();
?>
<!-- ================= Works ================= -->
<section id="works" class="section section-works">
	<div class="section-inner">
		<header class="section-header">
			<p class="section-label-en">Showa Nameplate – Production Works</p>
			<h2 class="section-title"><?php esc_html_e( '身近で活躍する、昭和ネーム製品', 'showa-name' ); ?></h2>
		</header>
		<p><?php esc_html_e( '青いマークをクリックすると、製品の使用例をご覧いただけます。', 'showa-name' ); ?></p>
		<div class="map-section-wrap">
			<section class="map-section" aria-label="map-section">
				<img class="panel-map-img" src="<?php echo esc_url( showa_asset_url( 'img/top-map-img/panel-map-img.png' ) ); ?>" alt="MAP" width="1120" height="700" />

				<?php for ( $i = 1; $i <= 12; $i++ ) : ?>
					<?php
					$num = sprintf( '%02d', $i );
					/* translators: %s: marker number */
					$alabel = sprintf( __( 'marker %s', 'showa-name' ), $num );
					?>
					<button class="map-marker map-marker-<?php echo esc_attr( $num ); ?>" type="button" data-popup-target="<?php echo esc_attr( $num ); ?>" aria-label="<?php echo esc_attr( $alabel ); ?>">
						<img src="<?php echo esc_url( $marker_url ); ?>" alt="" width="40" height="40" />
					</button>
				<?php endfor; ?>
			</section>
		</div>

		<div class="map-section-sp" aria-label="map-section-sp">
			<img src="<?php echo esc_url( showa_asset_url( 'img/top-map-img/panel-map-img-sp.png' ) ); ?>" class="panel-map-img-sp" alt="MAP SP" width="750" height="600" />

			<?php for ( $i = 1; $i <= 12; $i++ ) : ?>
				<?php
				$num = sprintf( '%02d', $i );
				/* translators: %s: marker number */
				$alabel = sprintf( __( 'marker sp %s', 'showa-name' ), $num );
				?>
				<button class="map-marker-sp map-marker-sp-<?php echo esc_attr( $num ); ?>" type="button" data-popup="<?php echo esc_attr( $num ); ?>" aria-label="<?php echo esc_attr( $alabel ); ?>"></button>
			<?php endfor; ?>
		</div>

		<div class="map-popup" aria-hidden="true">
			<div class="map-overlay" data-close-overlay></div>

			<?php foreach ( $popups as $idx => $item ) : ?>
				<?php
				$n   = $idx + 1;
				$num = sprintf( '%02d', $n );
				?>
				<div class="map-popup-item map-popup-<?php echo esc_attr( $num ); ?>" role="dialog" aria-modal="true" aria-label="<?php echo esc_attr( 'map-popup-' . $num ); ?>">
					<div class="map-popup-left">
						<img src="<?php echo esc_url( showa_asset_url( 'img/top-map-img/map-popup-' . $num . '.png' ) ); ?>" alt="" width="400" height="300" loading="lazy" decoding="async" />
					</div>
					<div class="map-popup-right">
						<button class="map-popup-close" type="button" aria-label="<?php esc_attr_e( '閉じる', 'showa-name' ); ?>">
							<img src="<?php echo esc_url( showa_asset_url( 'img/top-map-img/map-popup-close.png' ) ); ?>" alt="" width="32" height="32" />
						</button>
						<h3 class="map-popup-title"><?php echo nl2br( esc_html( $item['title'] ) ); ?></h3>
						<img class="map-popup-divider" src="<?php echo esc_url( showa_asset_url( 'img/top-map-img/popup-divider.png' ) ); ?>" alt="" />
						<p class="map-popup-text">
							<?php
							foreach ( $item['lines'] as $line ) {
								echo esc_html( $line );
								echo '<br />';
							}
							?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="works-layout">
			<p><?php esc_html_e( '機械や設備に欠かせない銘板・ネームプレートをはじめ、操作性と視認性を兼ね備えたフロントパネル・スイッチパネル、各種表記ラベルやステッカー、さらにプレス加工・金属加工による部品製作まで、用途に合わせて幅広く対応しています。', 'showa-name' ); ?></p>
			<div class="works-category-grid">
				<a href="<?php echo esc_url( home_url( '/results/#results1' ) ); ?>" class="works-category-card">
					<div class="works-category-icon">
						<img src="<?php echo esc_url( showa_asset_url( 'img/top-work1.png' ) ); ?>" alt="" width="140" height="140" loading="lazy" decoding="async" />
					</div>
					<p class="works-category-title"><?php esc_html_e( '銘板・ネームプレート', 'showa-name' ); ?></p>
				</a>
				<a href="<?php echo esc_url( home_url( '/results/#results2' ) ); ?>" class="works-category-card">
					<div class="works-category-icon">
						<img src="<?php echo esc_url( showa_asset_url( 'img/top-work2.png' ) ); ?>" alt="" width="140" height="140" loading="lazy" decoding="async" />
					</div>
					<p class="works-category-title"><?php esc_html_e( 'フロントパネル・スイッチパネル', 'showa-name' ); ?></p>
				</a>
				<a href="<?php echo esc_url( home_url( '/results/#results3' ) ); ?>" class="works-category-card">
					<div class="works-category-icon">
						<img src="<?php echo esc_url( showa_asset_url( 'img/top-work3.png' ) ); ?>" alt="" width="140" height="140" loading="lazy" decoding="async" />
					</div>
					<p class="works-category-title"><?php esc_html_e( '表記ラベル・ステッカー', 'showa-name' ); ?></p>
				</a>
				<a href="<?php echo esc_url( home_url( '/results/#results4-title' ) ); ?>" class="works-category-card">
					<div class="works-category-icon">
						<img src="<?php echo esc_url( showa_asset_url( 'img/top-work4.png' ) ); ?>" alt="" width="140" height="140" loading="lazy" decoding="async" />
					</div>
					<p class="works-category-title"><?php esc_html_e( 'プレス加工・金属加工', 'showa-name' ); ?></p>
				</a>
			</div>
		</div>
	</div>
</section>
