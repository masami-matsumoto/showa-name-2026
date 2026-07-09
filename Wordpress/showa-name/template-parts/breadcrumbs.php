<?php
/**
 * パンくずリスト
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

if ( is_front_page() ) {
	return;
}

$items = showa_get_breadcrumb_items();
if ( count( $items ) < 2 ) {
	return;
}
?>
<nav class="showa-breadcrumbs" aria-label="<?php esc_attr_e( 'パンくずリスト', 'showa-name' ); ?>">
	<ol class="showa-breadcrumbs__list">
		<?php foreach ( $items as $i => $row ) : ?>
			<li class="showa-breadcrumbs__item">
				<?php if ( $i < count( $items ) - 1 ) : ?>
					<a href="<?php echo esc_url( $row['url'] ); ?>"><?php echo esc_html( $row['name'] ); ?></a>
					<span class="showa-breadcrumbs__sep" aria-hidden="true">/</span>
				<?php else : ?>
					<span aria-current="page"><?php echo esc_html( $row['name'] ); ?></span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
