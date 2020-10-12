<?php 

get_header(); 

$args = array(  
	'post_type' => 'projetos',
	'post_status' => 'publish',
);

$loop = new WP_Query( $args ); 



?>
	<?php 
		require(get_template_directory() . '/components/parent/header.php'); 	
	?>
	<div class="pa-archive-projects pt-5">
		<div class="container">
			<div class="pa-project-items row row-cols-auto">
				<div class="col-12">
					<h2>Projetos</h2>
				</div>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="pa-project-item col-12 col-xl-6 mb-4">
					<a href="<?php the_permalink(); ?>">
						<figure class="figure m-xl-0">
							<?php echo get_the_post_thumbnail($post_id, 'full', array( 'class' => 'img-fluid rounded' )); ?>
							<figcaption class="figure-caption w-100 rounded-bottom ">
								<h3 class="h4 font-weight-bold pt-3"><?php the_title(); ?></h3>
							</figcaption>
						</figure>
					</a>
				</div>
			<?php endwhile; wp_reset_postdata();  ?>
			</div>
		</div>
	</div>

<?php get_footer();?>
