<?php 

	/* Template name: Page - Líder - Sedes */

	get_header();

	if(have_posts())
		the_post();

	require(get_template_directory() . '/components/parent/header.php');


?>
<section class="pa-content pa-lideres my-5">
	<div class="container">
		<div class="pa-lideres-depto row d-flex justify-content-center">
			<?php
			$lider_id = array();
			$lideres = get_field('lideres_administrativos');
			if( $lideres ): 
				foreach ($lideres as $lider):
			?>
			<div class="pa-lider-depto col col-xl-3 mb-5 text-center">
				<a href="<?php echo get_permalink($lider['lider']->ID); ?>">
				<?php echo get_the_post_thumbnail($lider['lider']->ID, array(200, 200), array( 'class' => 'pa-lider-thumb rounded-circle' ) ); ?>
					<p class="mt-4 mb-0 font-weight-bold"><?php echo $lider['lider']->post_title; ?></p>
					<p class="mb-0 font-italic"><?php the_field('lider_cargo', $lider['lider']->ID); ?></p>
					<p class="pa-link-perfil mb-0 font-weight-bold invisible">Ver perfil</p>
				</a>
			</div>
			<?php 
				endforeach;
			endif;
			// var_dump($lideres['0']);
			wp_reset_postdata(); 
			?>
		</div>
		<div class="pa-lideres-depto row d-flex justify-content-center">
			<?php
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> 'lideres',
					'post_status'	=> 'publish',
					'post__not_in' => $lider_id
				);
			
				$query = new WP_Query($args);
				
				while ($query->have_posts()) : $query->the_post();
			?>
			<div class="pa-lider-depto col col-xl-3 mb-5 text-center">
				<a href="<?php echo get_permalink(); ?>">
					<?php the_post_thumbnail( array(200, 200), array( 'class' => 'pa-lider-thumb rounded-circle' ) ); ?>
					<p class="mt-4 mb-0 font-weight-bold"><?php the_title(); ?></p>
					<p class="mb-0 font-italic"><?php the_field('lider_cargo', get_the_ID()); ?></p>
					<p class="pa-link-perfil mb-0 font-weight-bold invisible">Ver perfil</p>
				</a>
			</div>
			<?php 
				endwhile; 
				wp_reset_postdata(); 
			?>
		</div>
	</div>
</section>

<?php get_footer();?>