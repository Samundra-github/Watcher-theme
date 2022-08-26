<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div class="col-md-6">
                <h1 class="page-header-title"><?php the_field('page_title') ?></h1>
                <p class="page-header-paragraph"><?php the_field('page_description'); ?></p>
            </div>
            <div class="offset-md-1 col-md-5">
                <img src="<?php the_field('page_image') ?>" alt="Image for the header" class="page-image img-fluid">
            </div>
        </div>
    </div>
</section>