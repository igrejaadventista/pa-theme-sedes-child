<?php

/* Template name: Page - Líder */

get_header();

if (have_posts())
	the_post();

require(get_template_directory() . '/components/parent/header.php');


?>
<section class="pa-content pa-lideres my-5">
	<div class="container">
		<div class="pa-lideres-destaque row d-flex justify-content-center">
			<?php
			$lideres = get_field('lideres_destaques');
			pa_lideres_destaque($lideres);
			wp_reset_postdata();
			?>
		</div>

		<div class="pa-lideres-geral row d-flex justify-content-center pt-5">
			<?php
			$args = array(
				'numberposts'	=> -1,
				'post_type'		=> 'lideres',
				'post_status'	=> 'publish',
				'post__not_in' => $lideres
			);

			$query = new WP_Query($args);

			while ($query->have_posts()) : $query->the_post();
			?>
				<div class="pa-lider-geral col col-xl-3 mb-5 text-center">
					<a href="<?= get_permalink(); ?>">
						<?= the_post_thumbnail(array(200, 200), array('class' => 'pa-lider-thumb rounded-circle')); ?>
						<p class="mt-4 mb-0 fw-bold"><?= the_title(); ?></p>
						<p class="mb-0 font-italic"><?= the_field('lider_cargo', get_the_ID()); ?></p>
						<p class="pa-link-perfil mb-0 fw-bold invisible"><?php __('View profile', 'iasd'); ?></p>
					</a>
				</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>