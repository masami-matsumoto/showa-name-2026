<?php
/**
 * Template Name: 事業内容
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

	<div class="marquee-container">
		<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
		</div>
		<div class="marquee-inner" aria-label="<?php esc_attr_e( '関連コンテンツ', 'showa-name' ); ?>">
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work3.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
			<div class="marquee-item"><img src="<?php echo esc_url( showa_asset_url( 'img/work4.jpg' ) ); ?>" alt="" loading="lazy" decoding="async"></div>
		</div>
	</div>

	<div class="page-layout">
		<aside class="page-sidenav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'showa-name' ); ?>">
			<div class="page-sidenav__header"><?php esc_html_e( '事業内容', 'showa-name' ); ?></div>
			<nav class="page-sidenav__nav">
				<a class="page-sidenav__link" href="#works1"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '事業内容', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#works2"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '出来ること', 'showa-name' ); ?></a>
				<a class="page-sidenav__link" href="#works3"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( 'ワークフロー', 'showa-name' ); ?></a>
			</nav>
		</aside>

		<div class="page-content">
			<section class="page-section" id="works1" aria-labelledby="works1-title">
				<h2 class="page-section-title" id="works1-title"><?php esc_html_e( '事業内容', 'showa-name' ); ?></h2>
				<p class="page-lead">
					工業製品に使用されるアルミ・アクリル銘板や表示ラベル、タッチパネル部品を製造しています。アルミからウレタンまで、幅広い素材に対応したプレス加工を実施。シルク印刷・凸版印刷・塗装などの専門技術を組み合わせ、高品質で信頼性の高い製品づくりを行っています。
				</p>
			</section>

			<section class="page-section" id="works2" aria-labelledby="works2-title">
				<h2 class="page-section-title" id="works2-title"><?php esc_html_e( '昭和ネームプレートで出来ること', 'showa-name' ); ?></h2>
				<ul class="works2-inner">
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon1.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>シルク印刷</p></li>
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon2.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>シール印刷</p></li>
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon3.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>オフセット印刷</p></li>
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon4.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>プレス加工</p></li>
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon5.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>アルマイト印刷</p></li>
					<li><img src="<?php echo esc_url( showa_asset_url( 'img/work-icon6.png' ) ); ?>" alt="" width="80" height="80" loading="lazy" decoding="async"><p>エッチング加工</p></li>
				</ul>
			</section>

			<section class="page-section" id="works3" aria-labelledby="works3-title">
				<div class="works3-inner">
					<h2 class="page-section-title" id="works3-title"><?php esc_html_e( 'ワークフロー', 'showa-name' ); ?></h2>
					<div class="workflow">
						<div class="workflow-list">
							<h3 class="workflow-title">お問い合わせ・ご相談</h3>
							<div class="workflow-content">
								<p>用途・数量・仕様・納期などをヒアリングし、製品の目的や使用環境を確認します。</p>
								<p>他社様からのお取引切り替え（転注）をご検討の場合も、現行サンプルやご購入価格を含め、お気軽にご相談ください。</p>
								<p class="workflow-tag">サンプルの確認</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">仕様検討・技術提案</h3>
							<div class="workflow-content">
								<p>素材（アルミ・アクリル・樹脂等）、加工方法（プレス・印刷・塗装など）を検討し、最適な仕様をご提案します。</p>
								<p>仕様検討時には図面や関連資料をもとに、用途・耐久性・コストバランスを考慮した材料選定をご提案します。</p>
								<p class="workflow-tag">図面・資料の確認</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">お見積り・ご発注</h3>
							<div class="workflow-content">
								<p>仕様確定後、お見積りを提示。ご承認をいただき正式に受注となります。</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">仕様検討・技術提案</h3>
							<div class="workflow-content">
								<p>素材（アルミ・アクリル・樹脂等）、加工方法（プレス・印刷・塗装など）を検討し、最適な仕様をご提案します。</p>
								<p>仕様検討時には図面や関連資料をもとに、用途・耐久性・コストバランスを考慮した材料選定をご提案します。</p>
								<p class="workflow-tag">図面・資料の確認</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">データ作成・版下設計（必要に応じて）</h3>
							<div class="workflow-content">
								<p>支給データまたは弊社にてデータ作成を行い、印刷・加工に最適な版下を設計します。</p>
								<p>紙図面や資料からの印刷データ作成にも対応し、印刷・加工に最適化した版下設計を行います。</p>
								<p class="workflow-tag">図面・資料の確認</p>
								<p>Adobe Illustrator形式による入稿データのご支給にも対応可能です。</p>
								<p class="workflow-tag">完全データ支給</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">製造・加工</h3>
							<div class="workflow-content">
								<p>プレス加工、シルク印刷、凸版印刷、塗装など、社内設備を活かした一貫生産を行います。</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">検査・品質確認</h3>
							<div class="workflow-content">
								<p>品質保証部による検査を実施し、ISO9001に基づいた品質管理で製品を確認します。</p>
							</div>
						</div>
						<div class="workflow-list">
							<h3 class="workflow-title">梱包・出荷</h3>
							<div class="workflow-content">
								<p>検品後、用途・輸送条件に配慮した梱包を行い、指定先へ出荷します。</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</main>
<?php
get_footer();
