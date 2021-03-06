<?php
/**
 * @package a11y
 */

$settings = (array) get_option ('a11y-theme-settings');
get_header(); ?>

    <main id="content" class="a11y-site-main small-12 columns">
        <div class="a11y-site-tagline">
            <p>
                <?php
                echo ($settings['site_text_tagline']);
            ?>
            </p>
        </div>
        <section class="row a11y-panel-container">
            <?php

                $sections = array(
                    'panels' => array(
                        'section_class' => 'row a11y-panel-container',
                        'widgets' => array(
                            'panel1' => 'a11y-front-panel1',
                            'panel2' => 'a11y-front-panel2',
                            'panel3' => 'a11y-front-panel3'
                        )
                    )
                );

                add_widgets($sections, 'section');
            ?>

                <a href="<?php echo $panel_link; ?>" class="small-12 medium-4 columns a11y-front-panel">
                <article >

                        <?php
                            $post_content = get_post($key);
                            $thumbnail = get_the_post_thumbnail($key,'',array( 'role' => 'presentation'));
                            $title = $post_content->post_title;
                            $content = $post_content->post_content;
                        ?>

                        <header class="a11y-entry-header">
                            <?php echo $thumbnail ?>
                            <h1><?php echo $title ?></h1>
                        </header>
                        <section>
                            <?php
                                echo apply_filters('the_content',$content);
                            ?>
                        </section>

                </article>
            </a>
        </section>

    </main>

<?php
get_footer();
?>