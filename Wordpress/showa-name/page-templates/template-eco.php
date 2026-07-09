<?php
/**
 * Template Name: 環境活動
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
		$hero_lead = (string) get_post_meta( get_the_ID(), 'showa_page_hero_lead', true );
		$hero_lead = trim( $hero_lead );
		if ( $hero_lead === '' ) {
			$hero_lead = "私たち昭和ネームプレート株式会社は、オフセット印刷・シルク印刷・シール印刷・プレス加工及び協力会社様の取扱製品を通じて「ユーザーの要求を満足し、信頼される製品を作ろう！」を理念に常に顧客満足の向上を念頭に、ユーザー様に「顧客満足度No.1」の評価を頂けることを目指します。<br>\nその為に以下の品質方針を定め、それを継続的に改善することを取り組みます。";
		}
		get_template_part( 'template-parts/breadcrumbs' );
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
				<div class="page-hero__divider" aria-hidden="true"></div>
				<div class="page-hero__lead"><?php echo wp_kses_post( wpautop( $hero_lead ) ); ?></div>
			</div>
		</section>
	<?php endwhile; ?>

	<div class="page-layout">
		<aside class="page-sidenav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'showa-name' ); ?>">
			<div class="page-sidenav__header"><?php esc_html_e( '環境活動', 'showa-name' ); ?></div>
			<nav class="page-sidenav__nav">
				<a class="page-sidenav__link" href="#policy"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '環境方針', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#eco"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '省エネのポイント', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#beautification"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '美化活動の推進', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#emergency"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '緊急事態への備え', 'showa-name' ); ?></a>
			</nav>
		</aside>

		<div class="page-content">
			<section class="page-section" id="policy" aria-labelledby="policy-title">
				<h2 class="page-section-title" id="policy-title"><?php esc_html_e( '環境方針', 'showa-name' ); ?></h2>
				<p>
					<?php echo wp_kses_post( '昭和ネームプレート株式会社は、事業活動において<br>①地球環境の保全が人類共通の最重要課題であること<br>②地域社会の環境保全が地域の発展及び共存の上で重要であることを認識し、可能な限りの範囲で目標を定め、省資源、省エネルギー、リサイクルを推進し、環境負荷に配慮した活動を実行します。<br>それらをふまえ下記に環境方針を定め継続的に改善します。' ); ?>
				</p>
				<ul class="policy-inner">
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon1.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>廃棄物の削減及び<br>リサイクルの推進</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon2.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>電気・ガソリン・ガス等<br>のエネルギーの削減</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon3.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>水資源の節水</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon4.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>化学物質を正しく<br>使用し管理する</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon5.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>環境関連法規則等の遵守</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon6.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>グリーン購入の実施</p>
					</li>
					<li>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-icon7.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async">
						<p>長期的にLED照明の推進</p>
					</li>
				</ul>
			</section>

			<section class="page-section" id="eco" aria-labelledby="eco-title">
				<h2 class="page-section-title" id="eco-title"><?php esc_html_e( '省エネポイント', 'showa-name' ); ?></h2>
				<p class="eco-lead">全部門で前日の電力ピークと使用量などを確認</p>
				<p class="page-lead">
					２００８年にエコアクション21を取得し環境に配慮した事業を運営する一環として日本テクノ（株）が提供するサービス「SMARTMETER」と「SMARTCLOCK」を２０１３年９月より導入。毎日計測される時間帯ごとの電力使用量をグラフ化し貼りだすことで社員全員が省エネの意識をもった業務を行っております。また、前日計測された電力使用量のピーク値と時間帯を掲示し日々改善を図っており、漠然と省エネを意識するのではなく「見える化」をすることで確かな結果に繋げ、エコな企業として運営をしております。
				</p>
				<div class="eco-content">
					<figure>
						<img src="<?php echo esc_url( showa_asset_url( 'img/eco-power.png' ) ); ?>" alt="電気量削減実績">
					</figure>
					<p>・使用電力の多い機械を中止・代替<br>・デマンド閲覧サービスを徹底活用<br>・新型SMART CLOCKで使用電力量を通知</p>
				</div>
			</section>
		</div>
	</div>

	<section class="page-bottom-section" id="beautification" aria-labelledby="beautification-title">
		<div class="beautification-inner">
			<h2 class="page-section-title" id="beautification-title"><?php esc_html_e( '美化活動の推進', 'showa-name' ); ?></h2>
			<p class="page-lead">
				エコアクション21を認証取得以前から近隣の清掃や草むしりなど美化活動も定期的に行っております。エコアクション21取得以降は清掃内容を計測、記録することで社内外での美化意識の向上を図っております。また、工場の裏手に植樹をし緑化に勤めております。植樹した木々は従業員が交代で世話をし現在も成長を続けております。
			</p>
			<div class="marquee-container">
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco7.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco8.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco7.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/eco8.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
			</div>
		</div>
	</section>

	<section class="page-bottom-section" id="emergency" aria-labelledby="emergency-title">
		<div class="emergency-inner">
			<h2 class="page-section-title" id="emergency-title"><?php esc_html_e( '緊急事態への備え', 'showa-name' ); ?></h2>
			<p class="page-lead">
				弊社はエコアクション21における教育・訓練として緊急事態への対策に重きを置いております。地震、台風、大雪、火災、ここ１０年を振り返るだけでも災害や事故は決して他人事ではなく身近に迫ってきております。弊社では年に１回、緊急事態対策として防災訓練を実施しており、社内火災を想定した避難訓練と消防署員を招いてAEDや消火器、起震車を使用した緊急事態での対応措置の講習会を開いております。
			</p>
			<div class="marquee-container">
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
				<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about6.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
					<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/about5.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
