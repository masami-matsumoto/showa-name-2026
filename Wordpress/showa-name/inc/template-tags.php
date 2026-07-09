<?php
/**
 * テーマ共通ヘルパー
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

/**
 * アセットURL（assets 配下）
 *
 * @param string $path 例: 'img/logo.svg'
 */
function showa_asset_url( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * デフォルトOG画像URL
 */
function showa_default_og_image_url() {
	return showa_asset_url( 'img/main1.jpg' );
}

/**
 * 現在の説明文（メタディスクリプション用）
 */
function showa_get_description() {
	if ( is_front_page() ) {
		$d = get_bloginfo( 'description', 'display' );
		return $d ? $d : get_bloginfo( 'name', 'display' );
	}
	if ( is_home() && ! is_front_page() ) {
		$d = get_bloginfo( 'description', 'display' );
		return $d ? $d : __( 'お知らせ一覧', 'showa-name' );
	}
	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post ) {
			$meta_desc = (string) get_post_meta( $post->ID, 'showa_meta_description', true );
			$meta_desc = trim( $meta_desc );
			if ( $meta_desc !== '' ) {
				return wp_strip_all_tags( $meta_desc );
			}
			if ( has_excerpt( $post ) ) {
				return wp_strip_all_tags( get_the_excerpt( $post ) );
			}
			// subページは本文未入力でも成立する運用のため、ヒーローリードを説明文に流用できるようにする。
			if ( $post->post_type === 'page' ) {
				$lead = (string) get_post_meta( $post->ID, 'showa_page_hero_lead', true );
				$lead = trim( wp_strip_all_tags( $lead ) );
				if ( $lead !== '' ) {
					return wp_trim_words( $lead, 40, '…' );
				}
			}
			$content = wp_strip_all_tags( get_post_field( 'post_content', $post ) );
			if ( $content ) {
				return wp_trim_words( $content, 40, '…' );
			}
		}
	}
	$blog = get_bloginfo( 'description', 'display' );
	return $blog ? $blog : get_bloginfo( 'name', 'display' );
}

/**
 * OGP用画像URL
 */
function showa_get_og_image_url() {
	if ( is_singular() && has_post_thumbnail() ) {
		$url = get_the_post_thumbnail_url( null, 'large' );
		if ( $url ) {
			return esc_url( $url );
		}
	}
	return showa_default_og_image_url();
}

/**
 * トピックス用ページテンプレート一覧（将来カスタム投稿へ移行しやすいよう配列化）
 *
 * @return string[]
 */
function showa_get_topic_page_templates() {
	return apply_filters(
		'showa_topic_page_templates',
		array(
			'page-templates/template-topic-post.php',
			'page-templates/template-topic-post1.php',
			'page-templates/template-topic-post2.php',
			'page-templates/template-topic-post3.php',
			'page-templates/template-topic-post4.php',
			'page-templates/template-topic-post5.php',
			'page-templates/template-topic-post6.php',
		)
	);
}

/**
 * お問い合わせページのパーマリンク
 */
function showa_get_contact_url() {
	$page_id = (int) get_theme_mod( 'showa_contact_page_id', 0 );
	if ( $page_id && get_post_status( $page_id ) === 'publish' ) {
		return get_permalink( $page_id );
	}
	$pages = get_pages(
		array(
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'contact-template.php',
			'number'     => 1,
		)
	);
	if ( ! empty( $pages[0] ) ) {
		return get_permalink( $pages[0]->ID );
	}
	return home_url( '/' );
}

/**
 * お知らせ一覧URL（投稿ページ）
 */
function showa_get_news_archive_url() {
	$p = (int) get_option( 'page_for_posts' );
	if ( $p ) {
		return get_permalink( $p );
	}
	// 投稿ページ未設定時のフォールバック（news という固定ページがあればそこへ）
	$page = get_page_by_path( 'news' );
	if ( $page instanceof WP_Post ) {
		return get_permalink( $page->ID );
	}
	return home_url( '/' );
}

/**
 * 現在URL（OGP・パンくず用）
 */
function showa_get_current_url() {
	if ( is_singular() ) {
		return get_permalink();
	}
	if ( is_home() && ! is_front_page() ) {
		$p = (int) get_option( 'page_for_posts' );
		return $p ? get_permalink( $p ) : home_url( '/' );
	}
	if ( is_post_type_archive() ) {
		return get_post_type_archive_link( get_post_type() );
	}
	if ( is_category() || is_tag() || is_tax() ) {
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? home_url( '/' ) : $link;
	}
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_archive() ) {
		return get_pagenum_link( get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1 );
	}
	return home_url( '/' );
}

/**
 * パンくず（JSON-LD用の配列も返せる）
 *
 * @return array<int, array{name:string,url:string}>
 */
function showa_get_breadcrumb_items() {
	$items = array();

	$items[] = array(
		'name' => get_bloginfo( 'name', 'display' ),
		'url'  => home_url( '/' ),
	);

	if ( is_front_page() ) {
		return $items;
	}

	if ( is_singular( 'post' ) ) {
		$items[] = array(
			'name' => __( 'お知らせ', 'showa-name' ),
			'url'  => showa_get_news_archive_url(),
		);
		$items[] = array(
			'name' => get_the_title(),
			'url'  => get_permalink(),
		);
		return $items;
	}

	if ( is_page() ) {
		$ancestors = get_post_ancestors( get_queried_object_id() );
		$ancestors = array_reverse( $ancestors );
		foreach ( $ancestors as $aid ) {
			$items[] = array(
				'name' => get_the_title( $aid ),
				'url'  => get_permalink( $aid ),
			);
		}
		$items[] = array(
			'name' => get_the_title(),
			'url'  => get_permalink(),
		);
		return $items;
	}

	if ( is_home() || is_post_type_archive( 'post' ) ) {
		$items[] = array(
			'name' => __( 'お知らせ', 'showa-name' ),
			'url'  => showa_get_news_archive_url(),
		);
		return $items;
	}

	if ( is_category() || is_tag() || is_date() || is_author() ) {
		$items[] = array(
			'name' => get_the_archive_title(),
			'url'  => showa_get_current_url(),
		);
		return $items;
	}

	$items[] = array(
		'name' => get_the_archive_title(),
		'url'  => showa_get_current_url(),
	);

	return $items;
}
