<?php
/**
 * Template Name: トピックス（post3）
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
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="section">
			<div class="section-inner">
				<div class="post-body">
					<h2>1. イベント概要</h2>
					<p>
						2025年12月に東京ビッグサイトで開催された「中小企業 新ものづくり・新サービス展」を見学しました。<br>
						本展示会は、全国の中小企業が開発した新製品・新技術・新サービスを一堂に集め、ビジネスマッチングや販路拡大を目的とした大規模な展示商談会です。<br>
						製造・加工技術からIT・DX、素材、環境、生活分野まで幅広い業種が参加し、日本全国のものづくり企業の最新動向に触れられる場となっています。
					</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics4-1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">

					<h2>2. 多様な企業とそれぞれの強み</h2>
					<p>
						会場では、金属加工、機械装置、ITソリューション、素材開発など、非常に幅広い分野の企業が出展していました。<br>
						それぞれの企業が独自の技術やアイデアを持ち、課題解決に向けた明確な強みを打ち出している点が非常に印象的でした。
					</p>

					<p>
						同じ「ものづくり」という領域であっても、アプローチや技術の方向性は多様であり、各社が市場ニーズに対して独自の価値を生み出していることを強く感じました。
					</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics4-2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">

					<h2>3. 昭和ネームプレートにおける可能性</h2>
					<p>
						今回の展示を通じて、当社のシルク印刷技術や銘板製造技術についても、改めて多くの可能性を感じる機会となりました。<br>
						耐久性・視認性・精度を求められる製品表示や工業用途の分野において、当社の技術は今後さらに活かせる領域があると考えています。
					</p>

					<p>
						また、素材の多様化や機能性印刷の進化など、業界全体の技術トレンドも確認でき、今後の製品開発や提案力強化につながる有意義な視察となりました。
					</p>

					<h2>4. おわりに</h2>
					<p>
						今回の展示会では、中小企業の持つ技術力と発想力の高さを改めて実感しました。<br>
						それぞれの企業が持つ強みが組み合わさることで、新たな価値や産業の可能性が広がっていくことを強く感じます。
					</p>

					<p>
						昭和ネームプレート株式会社としても、日々の技術向上と品質改善を通じて、より付加価値の高い製品づくりに取り組んでまいります。
					</p>

					<div class="post-author">
						<p>2025年4月1日</p>
						<p>昭和ネームプレート株式会社<br>広報部</p>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
