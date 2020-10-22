<?php 

	/* Template name: Page - Líder - Departamentos */

	get_header();

	if(have_posts())
		the_post();

	$main_lider = get_field('lider_geral');
	setup_postdata($main_lider);
	if (get_field('lider_redes_sociais', $main_lider->ID))
		$lider_social = get_field('lider_redes_sociais', $main_lider->ID);
	$lider_id = array($main_lider->ID);

	require(get_template_directory() . '/components/parent/header.php');

	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'lideres',
		'post_status'	=> 'publish',
		'post__not_in' => $lider_id
	);

	$query = new WP_Query($args);

?>
<section class="pa-content pa-lideres my-5">
	<div class="container">
		<div class="pa-lider-geral row row-cols-auto mb-5">
			<div class="col-12 col-xl-4 text-center mb-4">
				<?php echo get_the_post_thumbnail( $main_lider->ID, 'lider-thumb', array( 'class' => 'pa-lider-thumb rounded-circle mx-auto' ) ); ?>
				<div class="mt-4">
					<ul class="pa-lider-contact list-inline">
					<?php if ($lider_social['lider_facebook']):?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php endif;
						if ($lider_social['lider_twitter']):
					?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php endif;
						if ($lider_social['lider_instagram']):
					?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<?php endif;
						if ($lider_social['lider_email']):
					?>
						<li class="list-inline-item mx-2"><a href="mailto:<?= $lider_social['lider_email']; ?>" target="_blank"><i class="fas fa-envelope"></i></a></li>
					<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col col-xl-8">
				<h1 class="h2 font-weight-bold"><?php echo esc_html($main_lider->post_title); ?></h1>
				<h5 class="mb-4"><?php the_field('lider_cargo', $main_lider->ID); ?></h5>
				<div class="pa-lider-bio">
					<?php the_field('lider_bibliografia', $main_lider->ID); ?>
				</div>
				<?php 
					if (have_rows('lider_equipe', $main_lider->ID)):
						echo "<hr class='my-5'>";
						while(have_rows('lider_equipe', $main_lider->ID)): the_row();
							$img = get_sub_field('lider_equipe_foto', $main_lider->ID);
				?>
				<div class="pa-lider-equipe mb-5 clearfix">
					<img src="<?php echo esc_url($img['sizes']['thumbnail']); ?>" alt="<?php the_sub_field('lider_equipe_nome', $main_lider->ID); ?>" class="pa-lider-thumb rounded-circle float-left mr-3 d-none d-xl-block" width="120" height="120">
					<ul class="ml-3 list-unstyled">
						<li><h4 class="mb-0"><?php the_sub_field('lider_equipe_nome', $main_lider->ID); ?></h4></li>
						<li class="mb-2"><em><?php the_sub_field('lider_equipe_cargo', $main_lider->ID); ?></em></li>
						<?php if(get_sub_field('lider_equipe_email', $main_lider->ID)):?><li><a href="mailto:<?php the_sub_field('lider_equipe_email', $main_lider->ID); ?>"><i class="fas fa-envelope mr-3"></i><?php the_sub_field('lider_equipe_email', $main_lider->ID); ?></a></li><?php endif; ?>
						<?php if(get_sub_field('lider_equipe_telefone', $main_lider->ID)):?><li><a href="tel:<?php the_sub_field('lider_equipe_telefone', $main_lider->ID); ?>"><i class="fas fa-phone mr-3"></i><?php the_sub_field('lider_equipe_telefone', $main_lider->ID); ?></a></li><?php endif; ?>
					</ul>
				</div>
					<?php endwhile; endif; ?>
			</div>
		</div>
		<hr class='my-5'>
		<div class="pa-lideres-depto row d-flex justify-content-center">
			<?php
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