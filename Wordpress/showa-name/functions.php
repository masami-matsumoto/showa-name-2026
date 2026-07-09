<?php
/**
 * Showa Nameplate テーマ
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

define( 'SHOWA_NAME_VERSION', '1.0.0' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/class-showa-nav-walker.php';
require get_template_directory() . '/inc/map-popup-data.php';

/**
 * セットアップ
 */
function showa_name_setup() {
	load_theme_textdomain( 'showa-name', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'グローバルナビ（PC・スマホ共通）', 'showa-name' ),
		)
	);
}
add_action( 'after_setup_theme', 'showa_name_setup' );

/**
 * 固定ページメタ：トピックス一覧用ラベル・ヒーローリード
 */
function showa_register_page_meta() {
	register_post_meta(
		'page',
		'showa_topic_category',
		array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	register_post_meta(
		'page',
		'showa_page_hero_lead',
		array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	register_post_meta(
		'page',
		'showa_meta_description',
		array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
}
add_action( 'init', 'showa_register_page_meta' );

/**
 * 固定ページ：Topics設定メタボックス
 */
function showa_add_page_metaboxes() {
	add_meta_box(
		'showa_topics_settings',
		__( 'Topics設定', 'showa-name' ),
		'showa_render_topics_metabox',
		'page',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes_page', 'showa_add_page_metaboxes' );

/**
 * @param WP_Post $post Post.
 */
function showa_render_topics_metabox( $post ) {
	wp_nonce_field( 'showa_save_topics_metabox', 'showa_topics_metabox_nonce' );

	$topic_cat = (string) get_post_meta( $post->ID, 'showa_topic_category', true );
	$meta_desc = (string) get_post_meta( $post->ID, 'showa_meta_description', true );
	?>
	<p>
		<label for="showa_topic_category" style="font-weight:600;display:block;margin-bottom:6px;">
			<?php esc_html_e( 'Topicsカテゴリ（赤枠）', 'showa-name' ); ?>
		</label>
		<input type="text" id="showa_topic_category" name="showa_topic_category" value="<?php echo esc_attr( $topic_cat ); ?>" style="width:100%;" placeholder="<?php esc_attr_e( '例：広報部より', 'showa-name' ); ?>">
	</p>
	<p style="margin-top:12px;">
		<label for="showa_meta_description" style="font-weight:600;display:block;margin-bottom:6px;">
			<?php esc_html_e( 'meta description', 'showa-name' ); ?>
		</label>
		<textarea id="showa_meta_description" name="showa_meta_description" rows="3" style="width:100%;" placeholder="<?php esc_attr_e( '検索結果に表示したい説明文（任意）', 'showa-name' ); ?>"><?php echo esc_textarea( $meta_desc ); ?></textarea>
	</p>
	<p style="margin:8px 0 0;color:#666;font-size:12px;">
		<?php esc_html_e( '固定ページ本文は未入力でOKです。ここで入力したカテゴリがトップページのTopicsカードに表示されます。', 'showa-name' ); ?>
	</p>
	<?php
}

/**
 * @param int $post_id Post ID.
 */
function showa_save_topics_metabox( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}
	if ( get_post_type( $post_id ) !== 'page' ) {
		return;
	}
	if ( ! isset( $_POST['showa_topics_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['showa_topics_metabox_nonce'] ) ), 'showa_save_topics_metabox' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['showa_topic_category'] ) ) {
		$val = sanitize_text_field( wp_unslash( $_POST['showa_topic_category'] ) );
		update_post_meta( $post_id, 'showa_topic_category', $val );
	}
	if ( isset( $_POST['showa_meta_description'] ) ) {
		$val = sanitize_text_field( wp_unslash( $_POST['showa_meta_description'] ) );
		update_post_meta( $post_id, 'showa_meta_description', $val );
	}
}
add_action( 'save_post_page', 'showa_save_topics_metabox' );

/**
 * カスタマイザー：お問い合わせページ
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function showa_customize_register( $wp_customize ) {
	$wp_customize->add_setting(
		'showa_contact_page_id',
		array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'showa_contact_page_id',
		array(
			'label'       => __( 'お問い合わせページ', 'showa-name' ),
			'description' => __( 'MW WP Form を設置した固定ページを選択してください。', 'showa-name' ),
			'section'     => 'title_tagline',
			'type'        => 'dropdown-pages',
		)
	);

	$wp_customize->add_setting(
		'showa_contact_form_shortcode',
		array(
			'type'              => 'theme_mod',
			'default'           => '[mwform_formkey key=""]',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'showa_contact_form_shortcode',
		array(
			'label'       => __( 'お問い合わせフォームショートコード（MW WP Form）', 'showa-name' ),
			'description' => __( '例: [mwform_formkey key="123"]', 'showa-name' ),
			'section'     => 'title_tagline',
			'type'        => 'textarea',
		)
	);
}
add_action( 'customize_register', 'showa_customize_register' );

/**
 * 投稿一覧：お知らせアーカイブ 20件
 *
 * @param WP_Query $query Query.
 */
function showa_modify_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	// 一般的なニュース一覧：投稿ページ（is_home）と各種アーカイブは 20件表示。
	if ( $query->is_home() || $query->is_archive() ) {
		$query->set( 'posts_per_page', 20 );
		// 投稿ページ（is_home）は post に固定（念のため）
		if ( $query->is_home() ) {
			$query->set( 'post_type', 'post' );
		}
	}
}
add_action( 'pre_get_posts', 'showa_modify_posts_per_page' );

/**
 * スタイル・スクリプト
 */
function showa_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$ver       = SHOWA_NAME_VERSION;

	wp_enqueue_style( 'showa-style', $theme_uri . '/assets/css/style.css', array(), $ver );
	wp_enqueue_style( 'showa-theme', get_stylesheet_uri(), array( 'showa-style' ), $ver );

	wp_enqueue_script( 'showa-script', $theme_uri . '/assets/js/script.js', array(), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'showa_enqueue_assets' );

/**
 * 条件付きCSS（固定ページテンプレート）
 */
function showa_enqueue_page_template_styles() {
	if ( ! is_page() ) {
		return;
	}
	$map = array(
		'page-templates/template-about.php'     => 'about',
		'page-templates/template-eco.php'       => 'eco',
		'page-templates/template-quality.php'   => 'quality',
		'page-templates/template-works.php'     => 'works',
		'page-templates/template-results.php'   => 'results',
		'page-templates/template-recruit.php'   => 'recruit',
		'contact-template.php'                  => 'contact',
		'page-templates/template-contact-confirm.php' => 'contact',
		'page-templates/template-contact-thanks.php'  => 'contact',
	);
	$tpl = get_page_template_slug();
	if ( ! $tpl ) {
		return;
	}
	if ( isset( $map[ $tpl ] ) ) {
		wp_enqueue_style(
			'showa-page-' . $map[ $tpl ],
			get_template_directory_uri() . '/assets/css/' . $map[ $tpl ] . '.css',
			array( 'showa-style' ),
			SHOWA_NAME_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'showa_enqueue_page_template_styles', 20 );

/**
 * フロントページ：マップ用
 */
function showa_enqueue_front_map() {
	if ( ! is_front_page() ) {
		return;
	}
	wp_enqueue_style(
		'showa-map',
		get_template_directory_uri() . '/assets/css/map.css',
		array( 'showa-style' ),
		SHOWA_NAME_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'showa_enqueue_front_map', 15 );

/**
 * スマホナビのサブメニュー画像を非表示（HTMLはPCと共通）
 */
function showa_nav_sp_inline_css() {
	$css = '.global-nav-sp .sub-menu img{display:none!important;}.global-nav-sp .sub-menu span{display:inline;}';
	$css .= '.showa-breadcrumbs{max-width:1120px;margin:0 auto;padding:12px 24px;font-size:1.4rem;}';
	$css .= '.showa-breadcrumbs__list{display:flex;flex-wrap:wrap;gap:4px 8px;list-style:none;margin:0;padding:0;}';
	$css .= '.showa-breadcrumbs__sep{opacity:.5;}';
	// パンくずはデザイン要件により非表示（必要になればテンプレートで復帰可能）。
	$css .= '.showa-breadcrumbs{display:none!important;}';
	wp_add_inline_style( 'showa-style', $css );
}
add_action( 'wp_enqueue_scripts', 'showa_nav_sp_inline_css', 30 );

/**
 * 404 ページ用の補助スタイル
 */
function showa_404_inline_css() {
	if ( ! is_404() ) {
		return;
	}
	$css  = '.showa-404-actions{list-style:none;margin:0;padding:0;display:flex;flex-wrap:wrap;gap:16px;}';
	$css .= '.showa-404-search{margin-top:48px;max-width:560px;}';
	wp_add_inline_style( 'showa-style', $css );
}
add_action( 'wp_enqueue_scripts', 'showa_404_inline_css', 35 );

/**
 * Canonical（テーマ側で明示）
 */
function showa_rel_canonical() {
	if ( is_404() ) {
		return;
	}
	if ( is_singular() ) {
		$url = wp_get_canonical_url();
		if ( $url ) {
			echo '<link rel="canonical" href="' . esc_url( $url ) . "\" />\n";
		}
	} elseif ( is_front_page() ) {
		echo '<link rel="canonical" href="' . esc_url( home_url( '/' ) ) . "\" />\n";
	}
}
add_action( 'wp_head', 'showa_rel_canonical', 2 );

/**
 * OGP / Twitter / 追加meta
 */
function showa_meta_ogp() {
	if ( is_feed() || is_robots() || is_trackback() ) {
		return;
	}
	if ( is_404() ) {
		echo '<meta name="robots" content="noindex, follow" />' . "\n";
		return;
	}
	$title = wp_get_document_title();
	$desc  = showa_get_description();
	$url   = showa_get_current_url();
	if ( ! is_string( $url ) || $url === '' ) {
		$url = home_url( '/' );
	}
	$img = showa_get_og_image_url();

	echo '<meta name="description" content="' . esc_attr( $desc ) . "\" />\n";
	echo '<meta property="og:locale" content="ja_JP" />' . "\n";
	echo '<meta property="og:type" content="' . ( is_front_page() || is_home() ? 'website' : 'article' ) . "\" />\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . "\" />\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . "\" />\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . "\" />\n";
	echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . "\" />\n";
	echo '<meta property="og:image" content="' . esc_url( $img ) . "\" />\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . "\" />\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . "\" />\n";
	echo '<meta name="twitter:image" content="' . esc_url( $img ) . "\" />\n";
	echo '<meta name="robots" content="index,follow,max-image-preview:large" />' . "\n";
}
add_action( 'wp_head', 'showa_meta_ogp', 5 );

/**
 * JSON-LD Organization / WebSite / BreadcrumbList
 */
function showa_json_ld() {
	if ( is_feed() || is_robots() ) {
		return;
	}
	if ( is_404() ) {
		return;
	}
	$home = home_url( '/' );
	$org  = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => get_bloginfo( 'name', 'display' ),
		'url'      => $home,
		'logo'     => showa_default_og_image_url(),
		'address'  => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '蒲生3882-1',
			'addressLocality' => '越谷市',
			'addressRegion'   => '埼玉県',
			'postalCode'      => '343-0838',
			'addressCountry'  => 'JP',
		),
		'telephone' => '+81-48-988-7611',
	);

	$website = array(
		'@context' => 'https://schema.org',
		'@type'    => 'WebSite',
		'name'     => get_bloginfo( 'name', 'display' ),
		'url'      => $home,
		'publisher' => array(
			'@type' => 'Organization',
			'name'  => get_bloginfo( 'name', 'display' ),
		),
	);

	$graph = array( $org, $website );

	if ( ! is_front_page() ) {
		$crumbs = showa_get_breadcrumb_items();
		$list   = array();
		$pos    = 1;
		foreach ( $crumbs as $c ) {
			$list[] = array(
				'@type'    => 'ListItem',
				'position' => $pos++,
				'name'     => $c['name'],
				'item'     => $c['url'],
			);
		}
		if ( count( $list ) > 1 ) {
			$graph[] = array(
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $list,
			);
		}
	}

	$payload = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . "</script>\n";
}
add_action( 'wp_head', 'showa_json_ld', 6 );

/**
 * フォールバックナビ（メニュー未設定時）
 */
function showa_fallback_nav() {
	$contact = showa_get_contact_url();
	$news    = showa_get_news_archive_url();
	$base    = showa_asset_url( 'img/navi' );
	?>
	<ul class="nav-list">
		<li class="nav-item">
			<a href="#" class="nav-link"><?php esc_html_e( '会社案内', 'showa-name' ); ?></a>
			<ul class="sub-menu">
				<li class="sub-menu-item">
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
						<img src="<?php echo esc_url( $base . '/subnavi1.png' ); ?>" alt="" width="190" height="100">
						<span><?php esc_html_e( '会社概要', 'showa-name' ); ?></span>
					</a>
				</li>
				<li class="sub-menu-item">
					<a href="<?php echo esc_url( home_url( '/quality/' ) ); ?>">
						<img src="<?php echo esc_url( $base . '/subnavi2.png' ); ?>" alt="" width="190" height="100">
						<span><?php esc_html_e( '品質について', 'showa-name' ); ?></span>
					</a>
				</li>
				<li class="sub-menu-item">
					<a href="<?php echo esc_url( home_url( '/eco/' ) ); ?>">
						<img src="<?php echo esc_url( $base . '/subnavi3.png' ); ?>" alt="" width="190" height="100">
						<span><?php esc_html_e( '環境活動', 'showa-name' ); ?></span>
					</a>
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link"><?php esc_html_e( '事業内容', 'showa-name' ); ?></a>
			<ul class="sub-menu">
				<li class="sub-menu-item">
					<a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">
						<img src="<?php echo esc_url( $base . '/subnavi4.png' ); ?>" alt="" width="190" height="100">
						<span><?php esc_html_e( '事業内容', 'showa-name' ); ?></span>
					</a>
				</li>
				<li class="sub-menu-item">
					<a href="<?php echo esc_url( home_url( '/results/' ) ); ?>">
						<img src="<?php echo esc_url( $base . '/subnavi5.png' ); ?>" alt="" width="190" height="100">
						<span><?php esc_html_e( '取扱製品', 'showa-name' ); ?></span>
					</a>
				</li>
			</ul>
		</li>
		<li class="nav-item"><a href="<?php echo esc_url( $news ); ?>" class="nav-link"><?php esc_html_e( 'お知らせ', 'showa-name' ); ?></a></li>
		<li class="nav-item"><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" class="nav-link"><?php esc_html_e( '採用情報', 'showa-name' ); ?></a></li>
	</ul>
	<?php
}

/**
 * フォールバックナビ（スマホ：index.html 構造）
 */
function showa_fallback_nav_sp() {
	$contact = showa_get_contact_url();
	$news    = showa_get_news_archive_url();
	?>
	<ul class="nav-list">
		<li class="nav-item">
			<a href="#" class="nav-link"><?php esc_html_e( '会社案内', 'showa-name' ); ?></a>
			<div class="nav-link-sub">
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( '会社概要', 'showa-name' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/quality/' ) ); ?>"><?php esc_html_e( '品質について', 'showa-name' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/eco/' ) ); ?>"><?php esc_html_e( '環境活動', 'showa-name' ); ?></a>
			</div>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link"><?php esc_html_e( '事業内容', 'showa-name' ); ?></a>
			<div class="nav-link-sub">
				<a href="<?php echo esc_url( home_url( '/works/' ) ); ?>"><?php esc_html_e( '事業内容', 'showa-name' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/results/' ) ); ?>"><?php esc_html_e( '取扱製品', 'showa-name' ); ?></a>
			</div>
		</li>
		<li class="nav-item"><a href="<?php echo esc_url( $news ); ?>" class="nav-link"><?php esc_html_e( 'お知らせ', 'showa-name' ); ?></a></li>
		<li class="nav-item"><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" class="nav-link"><?php esc_html_e( '採用情報', 'showa-name' ); ?></a></li>
		<li class="nav-item nav-link-contact"><a href="<?php echo esc_url( $contact ); ?>" class="nav-link"><?php esc_html_e( 'お問い合わせ', 'showa-name' ); ?></a></li>
	</ul>
	<?php
}

/**
 * メニューが設定されている場合でも、スマホメニュー末尾に「お問い合わせ」を追加
 *
 * @param string   $items Items HTML.
 * @param stdClass $args  Args.
 * @return string
 */
function showa_append_contact_to_mobile_menu( $items, $args ) {
	if ( is_admin() ) {
		return $items;
	}
	if ( ! isset( $args->theme_location ) || $args->theme_location !== 'primary' ) {
		return $items;
	}
	// スマホメニュー（global-nav-sp）は同じ theme_location を使うため、bodyクラスで判別しない。
	// 代わりに、nav-list が縦表示になるブレイクポイントはCSS側なので、常に末尾に追加してもPC側はレイアウトが崩れない。
	if ( strpos( $items, 'nav-link-contact' ) !== false ) {
		return $items;
	}

	$contact_url = showa_get_contact_url();
	$items      .= '<li class="nav-item nav-link-contact"><a href="' . esc_url( $contact_url ) . '" class="nav-link">' . esc_html__( 'お問い合わせ', 'showa-name' ) . '</a></li>';
	return $items;
}
add_filter( 'wp_nav_menu_items', 'showa_append_contact_to_mobile_menu', 10, 2 );

/**
 * body class
 *
 * @param string[] $classes Classes.
 * @return string[]
 */
function showa_body_class( $classes ) {
	$classes[] = 'showa-name-theme';
	return $classes;
}
add_filter( 'body_class', 'showa_body_class' );

function add_ga4_tag() {
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N39GN1W2N0"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-N39GN1W2N0');
</script>
<?php
}
add_action('wp_head', 'add_ga4_tag');