<?php get_header(); ?>
<main style="padding:80px 0;">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
        </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>
