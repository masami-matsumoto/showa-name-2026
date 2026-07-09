<?php
/**
 * 会社案内：下部「想い」ブロック（about.html 準拠）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

$u = showa_asset_url( 'img' );
?>
<div class="section-bg"></div>
<section class="about-thoughts" id="thoughts" aria-labelledby="thoughts-title">
	<div class="about-thoughts__inner">
		<h2 class="page-section-title" id="thoughts-title"><?php esc_html_e( '昭和ネームプレートの想い', 'showa-name' ); ?></h2>
		<p class="about-lead">
			<?php esc_html_e( '「あらゆるニーズにお応えし、満足な品質を創造する」多種多様なモノが溢れている現代だからこそ、お客様が最も求めているモノは何か？を私たちは常に考えております。日々進化し続けるモノづくりの世界でお客様がお求めになる「最」にお応えするべく、私たちは最適な作成方法をご提示し、最良な材料選定でより高価値なモノを最高な品質管理の下、最短最少のコストで最大の満足が得られるよう、ニーズに合ったご案内をさせていただく所存でございます。', 'showa-name' ); ?><br /><br />
			<?php esc_html_e( '「昭和ネームプレートであればできること」「昭和ネームプレートでしかできないこと」お客様にそんな信頼のお声をいただくため、私たちは60年間モノづくりをしております。', 'showa-name' ); ?>
		</p>
		<div class="marquee-container">
			<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about3.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about4.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about6.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about5.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
			</div>
			<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about3.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about4.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about6.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
				<div class="marquee-item">
					<img src="<?php echo esc_url( $u . '/about5.jpg' ); ?>" alt="" loading="lazy" decoding="async" />
				</div>
			</div>
		</div>
	</div>
</section>
