<?php
/**
 * Template Name: トピックス（post1）
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
					<h2>品質方針とISO認証への取り組みについて</h2>
					<p>
						昭和ネームプレート株式会社では、創業以来、「品質を最優先にしたものづくり」を基本方針とし、お客様に安心してご依頼いただける製品づくりに取り組んでまいりました。当社では品質管理体制の強化と継続的な改善を目的として、品質マネジメントシステムの国際規格であるISO 9001 の認証を、日本品質保証機構（JQA）より取得しております。
					</p>
					<h2>ISO9001とは</h2>
					<p>ISO9001は、製品やサービスの品質を安定して提供するための国際的な品質マネジメント規格です。製品の品質だけでなく、設計・製造・検査・出荷に至るまでのすべての工程を体系的に管理し、継続的な改善を行う仕組みが求められます。</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics2-1.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">
					<h2>当社の品質管理体制</h2>
					<p>昭和ネームプレート株式会社では、以下のような体制により品質の維持・向上を図っています。<br>
						・製造工程ごとのチェック体制の確立<br>・不具合の未然防止と原因分析の徹底<br>・定期的な社内教育による品質意識の向上<br>・品質目標の設定と継続的な改善活動<br>
						これらの取り組みにより、安定した品質と再現性の高い製品供給を実現しています。</p>
					<img src="<?php echo esc_url( showa_asset_url( 'img/topics/topics2-2.jpg' ) ); ?>" alt="" loading="lazy" decoding="async">
					<h2>銘板製造における品質の重要性</h2>
					<p>銘板やネームプレートは、製品の型式・仕様・注意事項などを表示する、重要な情報媒体としての役割を担っています。わずかな印刷のズレや表記ミスであっても、最終製品の信頼性や安全性に影響を与える可能性があるため、私たちは細部にまでこだわった品質管理を徹底しています。</p>
					<h2>今後のTopicsについて</h2>
					<p>本Topicsでは、今後も<br>・品質向上への取り組み<br>・検査・管理体制の紹介<br>・製造現場での改善事例<br>など、当社の品質に関する活動を継続的に発信してまいります。品質への取り組みを可視化することで、お客様により安心してご依頼いただける企業であり続けたいと考えております。</p>
					<p>これからも昭和ネームプレート株式会社は、品質を企業活動の中心に据え、お客様の期待に応える製品づくりを追求してまいります。今後とも、どうぞよろしくお願いいたします。</p>
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
