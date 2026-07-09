<?php
/**
 * フッター（index.html 準拠）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$news_url    = showa_get_news_archive_url();
$contact_url = showa_get_contact_url();
$mailto      = apply_filters( 'showa_footer_mailto', 'mailto:' );
?>
<!-- ================= Footer ================= -->
<footer id="footer" class="site-footer">
	<section class="footer-contact">
		<div class="footer-contact-inner">
			<div class="footer-contact-block footer-contact-tel">
				<h2 class="footer-contact-title">CONTACT</h2>
				<p class="footer-contact-text">
					<?php esc_html_e( 'お問い合わせはこちらからお願いいたします。', 'showa-name' ); ?>
				</p>
				<div class="footer-button-group">
					<div class="mail-button">
						<a href="https://showa-np.co.jp/contact/" class="footer-contact-button">
							<span class="footer-contact-button-icon" aria-hidden="true">✉️</span>
							<span class="footer-contact-button-text"><?php esc_html_e( 'メールはこちら', 'showa-name' ); ?></span>
						</a>
					</div>
					<div class="tel-button">
						<a href="tel:048-988-7611" class="footer-contact-button">
							<span class="footer-contact-button-icon" aria-hidden="true">📞</span>
							<span class="footer-contact-button-text">048-988-7611</span>
						</a>
						<p><?php esc_html_e( '受付時間 9:00～17:00（土日祝休み）', 'showa-name' ); ?></p>
					</div>
				</div>
			</div>
			<div class="footer-contact-block footer-contact-download">
				<h2 class="footer-contact-title">Download</h2>
				<p class="footer-contact-text">
					<?php esc_html_e( 'カタログ・資料はこちらからダウンロードいただけます。', 'showa-name' ); ?>
				</p>
				<a href="#" class="footer-contact-button download-button">
					<span class="footer-contact-button-text"><?php esc_html_e( '資料請求 準備中', 'showa-name' ); ?></span>
				</a>
			</div>
		</div>
	</section>

	<section class="footer-main">
		<div class="footer-main-inner">
			<div class="footer-logo-block">
				<img src="<?php echo esc_url( showa_asset_url( 'img/logo-s.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="footer-logo-image" width="200" height="60" loading="lazy" decoding="async" />
				<div class="footer-company">
					<p class="footer-company-name"><?php bloginfo( 'name' ); ?></p>
					<p class="footer-company-address">
						<?php esc_html_e( '〒343-0838 埼玉県越谷市蒲生3882-1', 'showa-name' ); ?><br />
						TEL：048-988-7611<br>FAX：048-986-6261
					</p>
				</div>
			</div>

			<div class="footer-nav-block">
				<nav class="footer-nav" aria-label="<?php esc_attr_e( 'フッターナビゲーション', 'showa-name' ); ?>">
					<div class="footer-nav-column">
						<p class="footer-nav-heading"><?php esc_html_e( '会社案内', 'showa-name' ); ?></p>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">- <?php esc_html_e( '会社概要', 'showa-name' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/quality/' ) ); ?>">- <?php esc_html_e( '品質について', 'showa-name' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/eco/' ) ); ?>">- <?php esc_html_e( '環境活動', 'showa-name' ); ?></a></li>
						</ul>
					</div>
					<div class="footer-nav-column">
						<p class="footer-nav-heading"><?php esc_html_e( '事業内容', 'showa-name' ); ?></p>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">- <?php esc_html_e( '事業内容', 'showa-name' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/results/' ) ); ?>">- <?php esc_html_e( '取扱製品', 'showa-name' ); ?></a></li>
						</ul>
					</div>
					<div class="footer-nav-column">
						<p class="footer-nav-heading"><a href="<?php echo esc_url( $news_url ); ?>"><?php esc_html_e( 'お知らせ', 'showa-name' ); ?></a></p>
					</div>
					<div class="footer-nav-column">
						<p class="footer-nav-heading"><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>"><?php esc_html_e( '採用情報', 'showa-name' ); ?></a></p>
					</div>
				</nav>
			</div>

			<div class="footer-info-block">
				<div class="footer-social">
					<a href="https://note.com/showa_nameplate" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="note">
						<span class="footer-social-icon"><img src="<?php echo esc_url( showa_asset_url( 'img/note-icon.svg' ) ); ?>" alt="" width="24" height="24"></span>
					</a>
					<a href="https://x.com/showa_nameplate" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="X">
						<span class="footer-social-icon"><img src="<?php echo esc_url( showa_asset_url( 'img/x-icon.svg' ) ); ?>" alt="" width="24" height="24"></span>
					</a>
				</div>

				<div class="footer-cert">
					<img src="<?php echo esc_url( showa_asset_url( 'img/logo-jqa.png' ) ); ?>" alt="<?php esc_attr_e( 'JQA認証', 'showa-name' ); ?>" loading="lazy" decoding="async" />
					<img src="<?php echo esc_url( showa_asset_url( 'img/icon-ea21.svg' ) ); ?>" alt="<?php esc_attr_e( 'EA21', 'showa-name' ); ?>" loading="lazy" decoding="async" />
				</div>
				<div class="footer-cert-partners">
				<img src="<?php echo esc_url( showa_asset_url( 'img/partnership_logo.png' ) ); ?>" alt="<?php esc_attr_e( 'partnership', 'showa-name' ); ?>" loading="lazy" decoding="async" />
			    </div>
			</div>
		</div>
	</section>

	<div class="footer-bottom">
		<p class="footer-copyright">
			&copy; showa nameplate inc.
		</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
