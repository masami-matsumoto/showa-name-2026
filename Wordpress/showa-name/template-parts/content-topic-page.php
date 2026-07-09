<?php
/**
 * トピックス固定ページ（post.html 系レイアウト）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

get_template_part( 'template-parts/breadcrumbs' );
?>
<section class="page-hero" aria-labelledby="page-hero-title">
	<div class="page-hero__inner">
		<h1 class="page-hero__title" id="page-hero-title"><?php the_title(); ?></h1>
	</div>
</section>
<section class="section">
	<div class="section-inner">
		<div class="post-body entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>
