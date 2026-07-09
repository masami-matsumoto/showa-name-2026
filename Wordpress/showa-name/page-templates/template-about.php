<?php
/**
 * Template Name: 会社案内
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/breadcrumbs' );

		$lead = get_post_meta( get_the_ID(), 'showa_page_hero_lead', true );
		if ( ! $lead && has_excerpt() ) {
			$lead = get_the_excerpt();
		}
		?>
		<section class="page-hero" aria-labelledby="page-hero-title">
			<div class="page-hero__inner">
				<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
				<?php if ( $lead ) : ?>
					<div class="page-hero__divider" aria-hidden="true"></div>
					<div class="page-hero__lead"><?php echo wp_kses_post( wpautop( $lead ) ); ?></div>
				<?php endif; ?>
			</div>
		</section>

		<section class="about-banner" aria-label="<?php esc_attr_e( '会社紹介バナー', 'showa-name' ); ?>">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'full',
					array(
						'alt' => esc_attr( get_the_title() ),
					)
				);
			} else {
				?>
				<img src="<?php echo esc_url( showa_asset_url( 'img/company1.jpg' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async" />
				<?php
			}
			?>
		</section>

		<div class="page-layout">
			<aside class="page-sidenav" aria-label="<?php esc_attr_e( 'ページ内ナビゲーション', 'showa-name' ); ?>">
				<div class="page-sidenav__header"><?php esc_html_e( '会社案内', 'showa-name' ); ?></div>
				<nav class="page-sidenav__nav">
					<a class="page-sidenav__link" href="#greeting"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( 'ごあいさつ', 'showa-name' ); ?></a>
					<a class="page-sidenav__link" href="#strengths"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '弊社の強み', 'showa-name' ); ?></a>
					<a class="page-sidenav__link" href="#company"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '概要・沿革', 'showa-name' ); ?></a>
					<a class="page-sidenav__link" href="#locations"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '所在地', 'showa-name' ); ?></a>
					<a class="page-sidenav__link" href="#thoughts"><span class="page-sidenav__arrow">➡</span><?php esc_html_e( '弊社の想い', 'showa-name' ); ?></a>
				</nav>
			</aside>

			<div class="page-content">
				<section class="about-message" id="greeting" aria-labelledby="greeting-title">
					<h2 class="page-section-title" id="greeting-title">ごあいさつ</h2>
					<div class="about-message__grid">
						<div class="about-message__text">
							<p>
								当社は、1957年(昭和32年)4月に金属プレート加工(エッチング・アルマイト)を主とする会社として開業し、来年創業70周年の節目を向えます 。現在もお客様・協力会社様・社員の皆様に支えて頂き日々感謝しております 。
							</p>
							<p>
								昨今の情勢は戦時下にあり物価高騰で物が値上りしてしまい大変な現状であります 。戦争だけは早く終ってほしいと祈うばかりです 。当社も世の中に少しでも明るいものを届けられるよう良い仕事でこたえていきたいと考えております 。
							</p>
							<p>
								今後も皆様とともに未来へ前進してまいります 。ご愛顧賜りますようよろしくお願い申し上げます 。
							</p>
						</div>

						<div class="about-message__sign">
							<figure class="about-message__portrait">
								<img src="<?php echo esc_url( showa_asset_url( 'img/president.jpg' ) ); ?>" alt="代表取締役社長 瀬田 大吉" loading="lazy" decoding="async" />
							</figure>
							<p class="about-message__name">
								<span class="position">代表取締役社長</span><br />
								<span class="name">瀬田 大吉</span>
							</p>
						</div>
					</div>
				</section>

				<section class="about-concept" id="strengths" aria-labelledby="strengths-title">
					<h2 class="page-section-title" id="strengths-title">昭和ネームプレートの強み</h2>
					<p class="page-lead">
						「あらゆるニーズにお応えし、満足な品質を創造する」多種多様なモノが溢れている現代だからこそ、お客様が最も求めているモノは何か？を私たちは常に考えております。日々進化し続けるモノづくりの世界でお客様がお求めになる「最」にお応えするべく、私たちは最適な作成方法をご提示し、最良な材料選定でより高価値なモノを最高な品質管理の下、最短最少のコストで最大の満足が得られるよう、ニーズに合ったご案内をさせていただく所存でございます。<br /><br />
						「昭和ネームプレートであればできること」「昭和ネームプレートでしかできないこと」お客様にそんな信頼のお声をいただくため、私たちは60年間モノづくりをしております。
					</p>

					<div class="about-strengths">
						<article class="about-strength-card">
							<p class="about-strength-card__no">01</p>
							<div class="about-strength-card__icon">
								<img src="<?php echo esc_url( showa_asset_url( 'img/company-icon1.png' ) ); ?>" alt="" loading="lazy" decoding="async" />
							</div>
							<h3 class="about-strength-card__title">蓄積されたノウハウ</h3>
							<p class="about-strength-card__text">
								特殊印刷業界を様々な技術革新で塗り替えてきた、当社ならではのオリジナル提案を行います。
							</p>
						</article>

						<article class="about-strength-card">
							<p class="about-strength-card__no">02</p>
							<div class="about-strength-card__icon">
								<img src="<?php echo esc_url( showa_asset_url( 'img/company-icon2.png' ) ); ?>" alt="" loading="lazy" decoding="async" />
							</div>
							<h3 class="about-strength-card__title">内製化された体制</h3>
							<p class="about-strength-card__text">
								内製化や情報セキュリティーマニュアルの運用によりセキュリティーを高めています。
							</p>
						</article>

						<article class="about-strength-card">
							<p class="about-strength-card__no">03</p>
							<div class="about-strength-card__icon">
								<img src="<?php echo esc_url( showa_asset_url( 'img/company-icon3.png' ) ); ?>" alt="" loading="lazy" decoding="async" />
							</div>
							<h3 class="about-strength-card__title">専門的な加工技術</h3>
							<p class="about-strength-card__text">
								精度と対応力で応える、プロ仕様の印刷・加工技術。素材の可能性を拡げる、多彩な加工ラインナップ。
							</p>
						</article>

						<article class="about-strength-card">
							<p class="about-strength-card__no">04</p>
							<div class="about-strength-card__icon">
								<img src="<?php echo esc_url( showa_asset_url( 'img/company-icon4.png' ) ); ?>" alt="<?php esc_attr_e( 'partnership', 'showa-name' ); ?>" loading="lazy" decoding="async" />
							</div>
							<h3 class="about-strength-card__title">協力メーカーとの連携</h3>
							<p class="about-strength-card__text">
								インキメーカー・材料メーカーとのタイアップによる開発体制で、新しい商品やニーズにも柔軟に対応します。
							</p>
						</article>
					</div>
				</section>
                <section class="about-concept" id="strengths" aria-labelledby="strengths-title">
					<h2 class="page-section-title" id="strengths-title">情報セキュリティ基本方針</h2>

<div class="page-lead">
	<ol class="security-policy-list">
		<li>
			<strong>情報セキュリティ管理規則の策定及び継続的改善</strong><br>
			当社は、情報セキュリティに対する取り組みを、経営並びに事業における重要課題のひとつと認識し、
			法令及びその他の規範に準拠・適合した情報セキュリティシステム管理規則を策定しております。
			さらに、当社役員を中心とした情報セキュリティシステム管理体制を確立し、
			組織的・人的・物理的及び技術的な情報セキュリティを維持し、継続的に改善してまいります。
		</li>

		<li>
			<strong>情報資産の保護と継続的管理</strong><br>
			当社は、当社の扱う情報資産の機密性、完全性及び可用性に対する脅威から情報資産を適切に保護するため、
			適切な措置を講じます。
		</li>

		<li>
			<strong>法令・規範の遵守</strong><br>
			当社は、情報セキュリティに関する法令及びその他の規範を遵守いたします。
			また、当社の情報セキュリティシステム管理規則を、
			これらの法令及びその他の規範に適合させます。
		</li>

		<li>
			<strong>教育・訓練</strong><br>
			当社は、当社役員及び従業員へ情報セキュリティの意識向上を図るとともに、
			情報セキュリティに関する教育・訓練を行います。
		</li>

		<li>
			<strong>事故発生予防と発生時の対応</strong><br>
			当社は、情報セキュリティ事故の防止に努めるとともに、
			万一事故が発生した場合には、再発防止策を含む適切な対策を速やかに行います。
		</li>
	</ol>
</div>
                </section>

<section class="about-concept" id="partnership" aria-labelledby="partnership-title">
	<h2 class="page-section-title" id="partnership-title">パートナーシップ構築宣言</h2>

	<div class="page-lead">
		<div class="partnership-wrap">
			<div class="partnership-text">
				<h3 class="partnership-subtitle">取引先企業との共存共栄を目指して</h3>

				<p>
					昭和ネームプレート株式会社は、サプライチェーン全体の共存共栄と、
					新たな連携による価値創出を目指し、「パートナーシップ構築宣言」を公表しております。
				</p>

				<p>
					お取引先様との信頼関係を大切にし、公正・適正な取引を推進するとともに、
					持続可能なモノづくりと企業価値向上に努めてまいります。
				</p>
			</div>

			<div class="partnership-logo">
				<img src="<?php echo esc_url( showa_asset_url( 'img/partnership_logo.png' ) ); ?>" alt="パートナーシップ構築宣言ロゴ" loading="lazy" decoding="async" />
			</div>
		</div>
	</div>
</section>


				<section class="about-company" id="company" aria-labelledby="company-title">
					<h2 class="page-section-title" id="company-title">会社概要</h2>

					<div class="about-table" role="table" aria-label="会社概要">
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">会社名</div>
							<div class="about-val" role="cell">昭和ネームプレート株式会社</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">創業</div>
							<div class="about-val" role="cell">1957年4月29日</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">本社</div>
							<div class="about-val" role="cell">東京都荒川区荒川6-52-10</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">埼玉工場</div>
							<div class="about-val" role="cell">埼玉県越谷市蒲生3882-1</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">レイクタウン工場</div>
							<div class="about-val" role="cell">埼玉県越谷市大成町7-449-1</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">代表取締役</div>
							<div class="about-val" role="cell">瀬田　大吉</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">資本金</div>
							<div class="about-val" role="cell">10,000,000円</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">従業員数</div>
							<div class="about-val" role="cell">48名（2023.3）</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">事業内容</div>
							<div class="about-val" role="cell">各種印刷品、プレス加工品の製造・販売</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">取扱い品目</div>
							<div class="about-val" role="cell">
								各種印刷、樹脂・金属加工品、各種絶縁材、フィルム等の抜き(プレス)加工、看板、カッティングシート
							</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">認証規格</div>
							<div class="about-val" role="cell">UL/CSA<br />ISO9001<br />EA21</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">取引銀行</div>
							<div class="about-val" role="cell">三菱東京UFJ銀行<br />城北信用金庫</div>
						</div>
					</div>

					<h2 class="about-section-title about-section-title--spaced" id="history-title">会社沿革</h2>
					<div class="about-table" role="table" aria-label="会社沿革">
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">1957年<br>昭和32年</div>
							<div class="about-val" role="cell">独自のネームプレート制作方法を完成<br>個人経営にて創設</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">1969年<br>昭和44年</div>
							<div class="about-val" role="cell">事業拡大の為、埼玉工場を新設</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">1972年<br>昭和47年</div>
							<div class="about-val" role="cell">昭和ネームプレート株式会社を設立</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">1992年<br>平成4年</div>
							<div class="about-val" role="cell">本社新社屋の完成<br>UL/CSAの認証取得(SN-OP1・SN-OP2・SN-SP1)</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">2002年<br>平成14年</div>
							<div class="about-val" role="cell">ISO9001の認証取得</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">2008年<br>平成20年</div>
							<div class="about-val" role="cell">EA21の認証取得</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">2012年<br>平成24年</div>
							<div class="about-val" role="cell">UL/CSA(SN-SP2)の認証取得</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">2015年<br>平成27年</div>
							<div class="about-val" role="cell">(有)奥村製作所を吸収合併<br>レイクタウン工場の設置</div>
						</div>
						<div class="about-row" role="row">
							<div class="about-key" role="rowheader">2018年<br>平成30年</div>
							<div class="about-val" role="cell">ISO9001運用範囲をレイクタウン工場まで拡大<br>EA21運用範囲をレイクタウン工場まで拡大</div>
						</div>
						<!-- <div class="about-row" role="row">
							<div class="about-key" role="rowheader">取扱い品目</div>
							<div class="about-val" role="cell">
								各種印刷、樹脂・金属加工品、各種絶縁材、フィルム等の抜き(プレス)加工、看板、カッティングシート
							</div>
						</div> -->
						<!-- <div class="about-row" role="row">
							<div class="about-key" role="rowheader">認証規格</div>
							<div class="about-val" role="cell">UL/CSA<br />ISO9001<br />EA21</div>
						</div> -->
						<!-- <div class="about-row" role="row">
							<div class="about-key" role="rowheader">取引銀行</div>
							<div class="about-val" role="cell">三菱東京UFJ銀行<br />城北信用金庫</div>
						</div> -->
					</div>
				</section>

				<section class="about-locations" id="locations" aria-labelledby="locations-title">
					<h2 class="page-section-title" id="locations-title">拠点情報</h2>

					<div class="about-locations__list">
						<article class="about-location">
							<h3 class="about-location__name"><span class="about-location__label">本社</span> <span class="about-location__dept">(経理)</span></h3>
							<p class="about-location__addr">〒116-0002　東京都荒川区荒川6-52-10</p>
						</article>

						<article class="about-location">
							<h3 class="about-location__name">
								<span class="about-location__label">埼玉工場</span>
								<span class="about-location__dept">(営業部・業務部・製造部・品質保証部)</span>
							</h3>
							<p class="about-location__addr">
								〒343-0838　埼玉県越谷市蒲生3882-1<br />
								TEL：048-988-7611(代表)<br />
								FAX：048-986-6261<br />
								お問い合わせは埼玉工場へお願い致します。
							</p>
						</article>

						<article class="about-location">
							<h3 class="about-location__name"><span class="about-location__label">レイクタウン工場</span> <span class="about-location__dept">(製造部)</span></h3>
							<p class="about-location__addr">〒343-0838　埼玉県越谷市大成町7-449-1</p>
						</article>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3233.504835832339!2d139.7868109112019!3d35.86114347241519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60189695ec429281%3A0x3681f56a0a5c1818!2z5pit5ZKM44ON44O844Og44OX44Os44O844OI5qCq5byP5Lya56S-IOWfvOeOieW3peWgtA!5e0!3m2!1sja!2sjp!4v1774588383166!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</section>
			</div>
		</div>
		<?php
		get_template_part( 'template-parts/about', 'thoughts' );
	endwhile;
	?>
</main>
<?php
get_footer();
