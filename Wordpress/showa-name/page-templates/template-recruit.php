<?php
/**
 * Template Name: 採用情報
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
			$hero_lead = "昭和ネームプレート株式会社で一緒に働きませんか。<br>\n身近な製品を支えるものづくりを、仲間とともに一つひとつ丁寧につくる仕事です。<br>未経験の方も安心して成長できる環境です。";
		}
		get_template_part( 'template-parts/breadcrumbs' );
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
				<div class="page-lead"><?php echo wp_kses_post( wpautop( $hero_lead ) ); ?></div>
			</div>
		</section>
	<?php endwhile; ?>

	<section class="section">
		<div class="section-inner">
			<h2>蒲生工場<span class="recruit-attention">現在募集中です。</span></h2>
			<div class="recruit-container">
				<div class="recruit-regular">
					<h3 class="recruit-title">正社員</h3>
					<p class="recruit-type">【営業職】</p>
					<dl class="recruit-data">
						<dt>主な仕事内容</dt>
						<dd>・既存顧客ルート営業<br>・新規顧客開拓<br>・その他事務処理</dd>
						<dt>給与</dt>
						<dd>【月給】２３万～<br>※上記給与にプラス各種手当の支給あり</dd>
						<dt>勤務時間</dt>
						<dd>実働8時間・休憩1時間<br>※業務によっては多少の残業あり</dd>
						<dt>待遇</dt>
						<dd>社会保険完備<br>交通費：全額支給<br>昇給：年1回<br>賞与：年2回<br>深夜手当<br>試用期間(3ヵ月)</dd>
					</dl>
				</div>
				<div class="recruit-regular">
					<h3 class="recruit-title">正社員</h3>
					<p class="recruit-type">【製造職】</p>
					<dl class="recruit-data">
						<dt>主な仕事内容</dt>
						<dd>・既存顧客ルート営業<br>・新規顧客開拓<br>・その他事務処理</dd>
						<dt>給与</dt>
						<dd>【月給】２１万～<br>※上記給与にプラス各種手当の支給あり</dd>
						<dt>勤務時間</dt>
						<dd>実働8時間・休憩1時間<br>※業務によっては多少の残業あり</dd>
						<dt>待遇</dt>
						<dd>社会保険完備<br>交通費：全額支給<br>昇給：年1回<br>賞与：年2回<br>深夜手当<br>試用期間(3ヵ月)</dd>
					</dl>
				</div>
				<div class="recruit-part-time">
					<h3 class="recruit-title">パートタイム</h3>
					<p class="recruit-type">【製品検査員】</p>
					<dl class="recruit-data">
						<dt>主な仕事内容</dt>
						<dd>・仕分け<br>・シール貼り、倉庫管理<br>・入出荷、検品</dd>
						<dt>給与</dt>
						<dd>【時給】1,150円～</dd>
						<dt>勤務時間</dt>
						<dd>週3日～、1日5時間からお願いします♪</dd>
						<dt>待遇</dt>
						<dd>社会保険完備<br>制服貸与<br>交通費規定内支給<br>自転車・バイク通勤OK<br>試用期間(3ヵ月)※時給変動なし！</dd>
					</dl>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="section-inner">
			<h2>レイクタウン工場</h2>
			<div class="recruit-container">
				<div class="recruit-regular">
					<h3 class="recruit-title">正社員</h3>
					<p class="recruit-type">【製造職】</p>
					<dl class="recruit-data">
						<dt>主な仕事内容</dt>
						<dd>・既存顧客ルート営業<br>・新規顧客開拓<br>・その他事務処理</dd>
						<dt>給与</dt>
						<dd>【月給】２１万～<br>※上記給与にプラス各種手当の支給あり</dd>
						<dt>勤務時間</dt>
						<dd>実働8時間・休憩1時間<br>※業務によっては多少の残業あり</dd>
						<dt>待遇</dt>
						<dd>社会保険完備<br>交通費：全額支給<br>昇給：年1回<br>賞与：年2回<br>深夜手当<br>試用期間(3ヵ月)</dd>
					</dl>
				</div>
				<div class="recruit-part-time">
					<h3 class="recruit-title">パートタイム</h3>
					<p class="recruit-type">現在は募集しておりません。</p>
				</div>
			</div>
		</div>
	</section>

	<p class="recruit-important">※応募状況により募集期間中でも募集を打ち切らせていただく場合がございます。<br>
		大変恐縮でございますが予めお含み置きください。事前にお電話にてお問い合わせいただけますと応募状況のご確認が可能です。<br>
		→お問い合わせ窓口：048-988-7611</p>
</main>
<?php
get_footer();
