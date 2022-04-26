<?php
get_header();

$args = array('post_type' => 'districts');

$the_query = new WP_Query($args);

?>
<section class="pa-header py-3">
    <header class="container">
        <div class="row">
            <div class="col py-5">
                <?php if (!is_home() || !is_front_page()) { ?>
                    <span class="pa-tag rounded-1 px-3 py-1 d-table-cell"><?php $PA_Header_Title = new PaHeaderTitle('tag'); ?></span>
                <?php } ?>
                <h1 class="mt-2"><?= single_term_title() ?></h1>
            </div>
        </div>
    </header>
</section>

<div class="pa-content py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <section class="col-12 col-xl-8">
                <div class="pa-blog-itens my-5">
                    <?php

                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                            <div class="pa-blog-item mb-4 mb-md-4 border-0">
                                <a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-body ps-4 pe-0 py-4 border-start border-5 pa-border">
                                                <span class="pa-tag text-uppercase d-none d-xl-table-cell rounded">Distrito</span>
                                                <h3 class="fw-bold h2 mt-xl-2 pa-truncate-4"><?= get_the_title() ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </section>

        </div>
    </div>
</div>

<?php get_footer(); ?>