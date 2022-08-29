    <footer class="watcher-footer-section">
        <div class="container">
            <div class="watcher-footer">
                <div class="row watcher-footer-desktop d-flex justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div class="watcher-footer-logo">
                            <?php if (get_field('footer_logo', 'option')) : ?>
                                <img src="<?php the_field('footer_logo', 'option'); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="watcher-footer-description mt-3">
                            <?php the_field('about_us', 'option'); ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="watcher-help">
                            <?php if (have_rows('help', 'option')) : ?>
                                <?php while (have_rows('help', 'option')) : the_row(); ?>
                                    <?php
                                    $link = get_sub_field('link');
                                    if ($link) :
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row flex-md-row flex-column">
                    <div class="watcher-footer-copyright mt-2 text-center">
                        <p><?php the_field('copyright', 'option'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </body>

    </html>