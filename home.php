<?php get_header(); ?>

<main role="main">
    <section id='pageContent' class="section">
        <div class="container">
            <?php get_template_part('loop-news'); ?>
            <?php get_template_part('pagination'); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>