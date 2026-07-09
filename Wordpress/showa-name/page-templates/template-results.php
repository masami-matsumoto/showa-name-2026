<?php
/**
 * Template Name: 取扱製品・制作実績
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
			$hero_lead = '昭和ネームプレートでは、印刷技術を活かした幅広い製品を手がけており、業界や製品の特性に応じたご提案が可能です。製品ごとの特徴と、実際に使用されている市場や用途事例をご紹介します。';
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

	<div class="page-layout">
		<aside class="page-sidenav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'showa-name' ); ?>">
			<div class="page-sidenav__header">カテゴリー</div>
			<nav class="page-sidenav__nav">
				<a class="page-sidenav__link" href="#results1"><span class="page-sidenav__arrow">➡</span>銘板・ネームプレート</a>
				<a class="page-sidenav__link" href="#results2"><span class="page-sidenav__arrow">➡</span>フロントパネル</a>
				<a class="page-sidenav__link" href="#results3"><span class="page-sidenav__arrow">➡</span>表記ラベル・ステッカー</a>
				<a class="page-sidenav__link" href="#results4"><span class="page-sidenav__arrow">➡</span>プレス加工品・金属加工</a>
			</nav>
		</aside>

		<div class="page-content">
			<section class="page-section" id="results1" aria-labelledby="results1-title">
				<h2 class="page-section-title" id="results1-title">銘板・ネームプレート</h2>
				<p class="page-lead">機械や設備に使用される銘板・ネームプレートを、用途や環境に合わせて素材・印刷方法を選定し製作しています。</p>
				<ul class="results-list">
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work1.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>日常で使う操作表示</h3>
						<p>インターホンの操作ボタンや表示部に使用される印刷に対応。視認性と耐久性を兼ね備えた仕上がりで、長く安心して使える表示を実現します。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work2.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>安全を伝える表示</h3>
						<p>ガス機器などに必要な注意表示や警告ラベルを製作。高い視認性と耐久性で、安全に使用するための重要な情報をしっかり伝えます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work3.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>高耐久な金属銘板</h3>
						<p>アルミ素材を使用した銘板を用途に応じて製作。耐候性・耐久性に優れ、屋内外問わずさまざまな環境で使用されています。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work4.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>操作性を高める表示</h3>
						<p>照明機器などの操作パネルに使用される表示を製作。見やすさと使いやすさを考慮した印刷で、快適な操作性をサポートします。</p>
					</li>
				</ul>
			</section>

			<section class="page-section" id="results2" aria-labelledby="results2-title">
				<h2 class="page-section-title" id="results2-title">フロントパネル</h2>
				<p class="page-lead">機器の操作性と視認性を高めるフロントパネルを、用途や仕様に応じた設計・印刷で製作しています。</p>
				<ul class="results-list">
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work5.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>手元で使う操作パネル</h3>
						<p>各種リモコンや操作機器に使用されるフロントパネルを製作。視認性と操作性を考慮した印刷で、快適な使い心地を実現します。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work6.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>暮らしに馴染む表示</h3>
						<p>給湯器や住宅設備の操作パネルに対応。空間に調和するデザインと見やすい表示で、日常の使いやすさを支えます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work7.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>家電を支える表示</h3>
						<p>洗濯機など家電製品の操作パネルを製作。機能表示をわかりやすく伝え、日々の操作を快適にサポートします。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work8.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>わかりやすい操作表示</h3>
						<p>照明や各種設備の操作パネルに対応。直感的に操作できる表示設計で、使いやすさと視認性を両立します。</p>
					</li>
				</ul>
			</section>

			<section class="page-section" id="results3" aria-labelledby="results3-title">
				<h2 class="page-section-title" id="results3-title">表記ラベル・ステッカー</h2>
				<p class="page-lead">機械や設備に使用される銘板・ネームプレートを、用途や環境に合わせて素材・印刷方法を選定し製作しています。</p>
				<ul class="results-list">
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work9.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>商品の魅力を伝えるラベル</h3>
						<p>化粧品や雑貨などのボトルラベルに対応。デザイン性と耐久性を兼ね備えた印刷で、商品の魅力を引き立てます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work10.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>安全を支える表示ラベル</h3>
						<p>機器や設備に必要な注意表示や警告ラベルを製作。視認性と耐久性に優れ、正確な情報伝達をサポートします。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work11.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>管理を支える表示</h3>
						<p>バーコードや管理用ラベルなど、識別・管理に必要な表示に対応。用途に応じた仕様で効率的な運用を支えます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work12.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>美しさを引き立てる印刷</h3>
						<p>化粧品やパッケージ用ラベルの印刷に対応。質感や仕上がりにこだわり、ブランドイメージを高める製品づくりを行います。</p>
					</li>
				</ul>
			</section>

			<section class="page-section" id="results4" aria-labelledby="results4-title">
				<h2 class="page-section-title" id="results4-title">プレス加工品・金属加工</h2>
				<p class="page-lead">金属のプレス加工や各種加工により、用途や仕様に応じた部品製作に柔軟に対応しています。</p>
				<ul class="results-list">
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work13.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>精度の高い金属加工</h3>
						<p>金属プレートや外装部品の加工に対応。用途や仕様に応じた精密な加工で、製品の品質と仕上がりを支えます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work14.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>美しさを引き出す加工</h3>
						<p>装飾品や記念品などの金属加工にも対応。美しさと質感を大切にした仕上がりで、製品の価値を高めます。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work15.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>現場で活きる表示部品</h3>
						<p>設備や施設に使用される金属プレートや表示部品を製作。耐久性に優れ、長期間安心して使用できる品質を提供します。</p>
					</li>
					<li>
						<figure class="results-img"><img src="<?php echo esc_url( showa_asset_url( 'img/work/work16.png' ) ); ?>" alt="" width="852" height="479" loading="lazy" decoding="async"></figure>
						<h3>多様な加工に対応</h3>
						<p>プレス加工や抜き加工により、多様な形状の金属パーツ製作に対応。用途に応じた柔軟な加工で幅広いニーズに応えます。</p>
					</li>
				</ul>
			</section>
		</div>
	</div>
</main>
<?php
get_footer();
