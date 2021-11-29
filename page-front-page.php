<?php

/* Template name: Page - Front Pagessss */

get_header();
require(get_stylesheet_directory() . '/template-parts/slider-front-page.php');
?>
<section class="pa-content pb-5">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>
<?php get_footer(); ?>