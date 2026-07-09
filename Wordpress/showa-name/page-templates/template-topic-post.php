<?php
/**
 * Template Name: トピックス（post / デフォルト）
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
					<h2>「広報部」を立ち上げ、発信をスタート</h2>
					<p>
						このたび、昭和ネームプレート株式会社では新たに「広報部」を立ち上げ、Topics／ブログの発信をスタートいたしました。日頃よりご愛顧いただいているお客様、そしてこれから私たちを知っていただく皆さまへ向けて、当社の取り組みやものづくりの現場、製品に込めた想いなどをより身近に感じていただけるよう、情報を発信してまいります。
					</p>
					<h2>私たちについて</h2>
					<p>昭和ネームプレート株式会社は、各種印刷・プレス加工を中心とした製品づくりを通じて、お客様のニーズに応えるものづくりを続けてきました。<br>
						品質へのこだわりを大切にしながら、「信頼される製品づくり」を目指し、日々技術とサービスの向上に取り組んでいます。</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics1-1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">
					<h2>Topicsで発信していく内容</h2>
					<p>今後は、以下のような内容を発信していく予定です。<br>
						・製品紹介（銘板・シルク印刷・各種加工など）<br>・製造現場の裏側や技術紹介<br>・導入事例や活用シーン<br>・社内の取り組みやスタッフの声<br>・展示会<br>・お知らせ情報 など<br>
						専門的な内容も、できるだけわかりやすくお届けしていきます。</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics1-2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">
					<h2>最後に</h2>
					<p>ものづくりの現場は、普段なかなか見えない部分も多いですが、そこには品質を支える工夫や技術、そして人の想いがあります。
						このTopicsを通じて、昭和ネームプレートの「価値」や「強み」を少しでも感じていただければ幸いです。</p>

					<p>今後とも、どうぞよろしくお願いいたします。</p>
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
