<?php
/**
 * Template Name: 品質について
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main" role="main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/breadcrumbs' );
		$hero_lead = (string) get_post_meta( get_the_ID(), 'showa_page_hero_lead', true );
		$hero_lead = trim( $hero_lead );
		if ( $hero_lead === '' ) {
			$hero_lead = "私たち昭和ネームプレート株式会社は、オフセット印刷・シルク印刷・シール印刷・プレス加工及び協力会社様の取扱製品を通じて「ユーザーの要求を満足し、信頼される製品を作ろう！」を理念に常に顧客満足の向上を念頭に、ユーザー様に「顧客満足度No.1」の評価を頂けることを目指します。<br>\nその為に以下の品質方針を定め、それを継続的に改善することを取り組みます。";
		}
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
				<div class="page-hero__divider" aria-hidden="true"></div>
				<div class="page-hero__lead"><?php echo wp_kses_post( wpautop( $hero_lead ) ); ?></div>
			</div>
		</section>
	<?php endwhile; ?>

	<div class="marquee-container">
		<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
		</div>
		<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
		</div>
	</div>

	<div class="page-layout">
		<aside class="page-sidenav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'showa-name' ); ?>">
			<div class="page-sidenav__header"><?php esc_html_e( '品質について', 'showa-name' ); ?></div>
			<nav class="page-sidenav__nav">
				<a class="page-sidenav__link" href="#policy"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '品質方針', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#iso"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '国際規格', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#qi"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '品質向上', 'showa-name' ); ?></a>
			</nav>
		</aside>

		<div class="page-content">
			<section class="page-section" id="policy" aria-labelledby="policy-title">
				<h2 class="page-section-title" id="policy-title">品質方針</h2>
				<ul class="policy-list">
					<li>顧客満足の向上に、全社員が一丸となって取り組みます。</li>
					<li>品質方針を具体的に実行するため、品質目標を設定し、その達成のための活動を行い、検証を行います。</li>
					<li>顧客の要求する法規制要求事項を厳守します。</li>
					<li>全従業員が、教育・訓練を通じ、一人ひとりが力量を備えていることを確実にします。</li>
					<li>品質のマネジメントシステムの有効性を継続的に改善します。</li>
				</ul>
			</section>

			<section class="page-section" id="iso" aria-labelledby="iso-title">
				<h2 class="page-section-title" id="iso-title">国際規格が証明する、確かな品質と信頼</h2>
				<p class="iso-lead">国際規格の下、確かな品質をお届け。</p>
				<p class="page-lead">
					化学技術の進歩と共に世の中に出回る製品はより複雑に、高価値に進化してきました。その歴史からもわかる通り、古いものから新しいものへ移ろいで行く際に求められることは「品質」です。全てのユーザーはより良いものをテーマに高品質を追及していると弊社は考えます。そんな高品質時代の中で国際規格であるISO9001、そしてULの認証を得ることで、弊社は確かな品質をお届けすると共に、確かな信頼のおけるお取引をお約束致します。
				</p>
				<div class="iso-content">
					<h3>認証・取得規格</h3>
					<div class="iso-inner">
						<div class="iso-body">
							<figure><img src="<?php echo esc_url( showa_asset_url( 'img/logo-jqa.png' ) ); ?>" alt="" loading="lazy" decoding="async"></figure>
							<div class="iso-text">
								<h4>国際規格に基づく品質管理<br>ISO:9001</h4>
								<p>ISO9001 認証内容はこちら</p>
							</div>
						</div>
						<div class="iso-body">
							<figure><img src="" alt=""></figure>
							<div class="text">
								<h4>安全性を証明する国際認証<br>UL/CSA</h4>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<section class="page-bottom-section" id="qi" aria-labelledby="qi-title">
		<div class="qi-inner">
			<h2 class="page-section-title" id="qi-title">全社一丸で取り組む品質向上</h2>
			<p class="page-lead">
				UL/CSAを1992年に、ISO9001を2002年に認証取得し会社全体が品質に重きを置き活動してまいりました。<br>
				総勢15名の検査専門部署「品質保証部」を設置し、ISO9001を基盤とした品質マネジメントシステムを導入することでお客様のニーズにお応えできるレベルの品質を保証いたします。
			</p>
			<div class="marquee-container">
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality7.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality8.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality7.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality8.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/quality6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
