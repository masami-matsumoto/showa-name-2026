<?php
/**
 * グローバルナビ：サブメニューに画像を出す（メニュー項目の「説明」に画像URLを入力）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

/**
 * Walker for global nav (desktop)
 */
class Showa_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( in_array( 'nav-link-contact', $classes, true ) ) {
			$classes[] = 'nav-item';
		} elseif ( 0 === (int) $depth ) {
			$classes[] = 'nav-item';
		} else {
			$classes[] = 'sub-menu-item';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id_attr = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id_attr = $id_attr ? ' id="' . esc_attr( $id_attr ) . '"' : '';

		$output .= $indent . '<li' . $id_attr . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output = isset( $args->before ) ? $args->before : '';

		$link_class = ( 0 === (int) $depth ) ? 'nav-link' : '';
		$item_output .= '<a class="' . esc_attr( $link_class ) . '"' . $attributes . '>';

		if ( 1 === (int) $depth ) {
			$desc = isset( $item->description ) ? trim( $item->description ) : '';
			if ( $desc && ( 0 === strpos( $desc, 'http' ) || 0 === strpos( $desc, '/' ) ) ) {
				$item_output .= '<img src="' . esc_url( $desc ) . '" alt="" width="190" height="100">';
			}
			$item_output .= '<span>' . esc_html( $title ) . '</span>';
		} else {
			$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . esc_html( $title ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		}

		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
}

/**
 * Walker for global nav (mobile)
 *
 * 静的HTMLのスマホメニュー構造に合わせる：
 * - 子階層は <div class="nav-link-sub"><a>..</a><a>..</a></div>
 * - 子要素に li/ul を使わない
 */
class Showa_Walker_Nav_Menu_SP extends Walker_Nav_Menu {
	/**
	 * @param string   $output Output.
	 * @param WP_Post  $item   Item.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 * @param int      $id     ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$atts         = array();
		$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
		$atts         = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$href = isset( $atts['href'] ) ? esc_url( $atts['href'] ) : '#';

		if ( 0 === (int) $depth ) {
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$li_cls  = in_array( 'nav-link-contact', $classes, true ) ? 'nav-item nav-link-contact' : 'nav-item';

			$output .= '<li class="' . esc_attr( $li_cls ) . '">';
			$output .= '<a href="' . $href . '" class="nav-link">' . esc_html( $title ) . '</a>';
			return;
		}

		// depth 1+: 子リンクは div.nav-link-sub 内に a を直置きする
		$output .= '<a href="' . $href . '">' . esc_html( $title ) . '</a>';
	}

	/**
	 * @param string   $output Output.
	 * @param WP_Post  $item   Item.
	 * @param int      $depth  Depth.
	 * @param stdClass $args   Args.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$output .= '</li>';
		}
	}

	/**
	 * 子階層開始：div.nav-link-sub
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$output .= '<div class="nav-link-sub">';
		}
	}

	/**
	 * 子階層終了：div.nav-link-sub を閉じる
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth ) {
			$output .= '</div>';
		}
	}
}
